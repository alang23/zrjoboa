<?php


class Customer extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_mdl','customer');
		$this->load->model('account_mdl','account');
	}


	public function index()
	{

		$userinfo = $this->userinfo;

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $c_name = isset($_GET['c_name']) ? $_GET['c_name'] : '';
        $uid = isset($_GET['uid']) ? $_GET['uid'] : '';
        $contacts = isset($_GET['contacts']) ? $_GET['contacts'] : '';
        $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
        $data['c_name'] = $c_name;
        $data['uid'] = $uid;
        $data['contacts'] = $contacts;
        $data['phone'] = $phone;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->customer->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/customer/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where'] = array('isdel'=>'0');
        if($userinfo['company_id'] != '0'){
        	$where['where']['company_id'] = $userinfo['company_id'];
        }

        if(!empty($c_name)){
        	$where['like'] = array('key'=>'c_name','value'=>$c_name);
        }
        if(!empty($uid)){
        	$where['where']['uid'] = $uid;
        }
        if(!empty($contacts)){
        	$where['where']['contacts'] = $contacts;
        }

        if(!empty($phone)){
        	$where['where']['phone'] = $phone;
        }
        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->customer->getList($where);	
		$data['list'] = $list;

		//客户代表
		$account = array();
		$c_where['where'] = array('isdel'=>'0');
		if(!empty($userinfo['company_id'] != '0')){
			$c_where['where']['company_id'] = $userinfo['company_id'];
		}
		$account = $this->get_account($c_where);
		$data['account'] = $account;


		$this->tpl('oa/customer_tpl',$data);

	}

	public function add()
	{

		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			$uid = $this->input->post('uid');
			$c_name = $this->input->post('c_name');
			$contacts = $this->input->post('contacts');
			$tel = $this->input->post('tel');
			$address = $this->input->post('address');
			$remarks = $this->input->post('remarks');
			
			if(!empty($uid) && !empty($c_name)){
				$_info = explode('-', $uid);
				$add['uid'] = $_info[0];
				$add['realname'] = $_info[1];
				$add['c_name'] = $c_name;
				$add['contacts'] = $contacts;
				$add['tel'] = $tel;
				$add['address'] = $address;
				$add['remarks'] = $remarks;
				$add['addtime'] = time();
				$add['company_id'] = $userinfo['company_id'];
				
				if($this->customer->add($add)){
					exit('ok');
				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{

			//客户代表
			$account = array();
			$where['where']['isdel'] = '0';
			if(!empty($userinfo['company_id'] != '0')){
				$where['where']['company_id'] = $userinfo['company_id'];
			}
			$account = $this->get_account($where);
			$data['account'] = $account;

			$this->tpl('oa/customer_add_tpl',$data);
		}
		
	}

	public function edit()
	{
		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			$uid = $this->input->post('uid');
			$c_name = $this->input->post('c_name');
			$contacts = $this->input->post('contacts');
			$tel = $this->input->post('tel');
			$address = $this->input->post('address');
			$remarks = $this->input->post('remarks');
			$id = $this->input->post('id');

			if(!empty($uid) && !empty($c_name) && !empty($id)){

				$_info = explode('-', $uid);
				$update_data['uid'] = $_info[0];
				$update_data['realname'] = $_info[1];
				$update_data['c_name'] = $c_name;
				$update_data['contacts'] = $contacts;
				$update_data['tel'] = $tel;
				$update_data['address'] = $address;
				$update_data['remarks'] = $remarks;

				$update_config = array('id'=>$id);
				if($this->customer->update($update_config,$update_data)){
					exit('ok');
				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{

			$id = $this->input->get('id');

			$where['where'] = array('id'=>$id);
			$info = $this->customer->get_one_by_where($where);
			$data['info'] = $info;

						//客户代表
			$account = array();
			$c_where['where']['isdel'] = '0';
			if(!empty($userinfo['company_id'] != '0')){
				$c_where['where']['company_id'] = $userinfo['company_id'];
			}
			$account = $this->get_account($c_where);
			$data['account'] = $account;

			$this->tpl('oa/customer_edit_tpl',$data);
		}
	}

	public function detail()
	{
		$id = $this->input->get('id');

		$info = array();
		$where['where'] = array('c.id'=>$id);
		$info = $this->customer->get_one_by_join($where);
		$data['info'] = $info;
		
		$this->tpl('oa/customer_detail_tpl',$data);
	}

	public function del()
	{
		$id = $this->input->get('id');
		$del_config = array('id'=>$id);
		$del_data['isdel'] = 1;
		if($this->company->update($del_config,$del_data)){
			echo 'ok';
		}else{
			echo 'err';
		}
	}

	private function get_account($where = array())
	{
			//客户代表
		$account = array();
		$account = $this->account->getList($where);

		return $account;
	}


}




