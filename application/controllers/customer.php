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

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

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
		$list = $this->customer->getList($where);
		
		$data['list'] = $list;
		$this->tpl('oa/customer_tpl',$data);

	}

	public function add()
	{
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
			$account = $this->get_account();
			$data['account'] = $account;

			$this->tpl('oa/customer_add_tpl',$data);
		}
		
	}

	public function edit()
	{
		if(!empty($_POST)){

			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$contacts = $this->input->post('contacts');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$remark = $this->input->post('remark');
			$id = $this->input->post('id');

			if(!empty($name) && !empty($address) && !empty($contacts) && !empty($phone) && !empty($id)){

				$update_data['name'] = $name;
				$update_data['address'] = $address;
				$update_data['contacts'] = $contacts;
				$update_data['phone'] = $phone;
				$update_data['email'] = $email;
				$update_data['remark'] = $remark;

				$update_config = array('id'=>$id);
				if($this->company->update($update_config,$update_data)){
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
			$info = $this->company->get_one_by_where($where);
			$data['info'] = $info;

			$this->tpl('oa/company_edit_tpl',$data);
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

	private function get_account()
	{
			//客户代表
		$account = array();
		$where['where'] = array('isdel'=>'0');
		$account = $this->account->getList($where);

		return $account;
	}


}




