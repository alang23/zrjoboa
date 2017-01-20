<?php


class Account extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_mdl','account');
		$this->load->model('company_mdl','company');

	}


	public function index()
	{

		$company_id = isset($_GET['company_id']) ? $_GET['company_id'] : 0;
		$data['company_id'] = $company_id;

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
        if(!empty($company_id)){
        	$where['where']['a.company_id'] = $company_id;
        	$countwhere['company_id'] = $company_id;

        }       
        $countwhere['isdel'] = '0';
        $count = $this->account->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/account/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where'] = array('a.isdel'=>'0');

		$list = $this->account->get_list_join_company($where);
		
		$data['list'] = $list;
		$this->tpl('oa/account_tpl',$data);

	}

	public function add()
	{
		if(!empty($_POST)){

			$username = $this->input->post('username');
			$pawd = $this->input->post('pawd');
			$realname = $this->input->post('realname');
			$gender = $this->input->post('gender');
			$phone = $this->input->post('phone');
			$works = $this->input->post('works');
			$email = $this->input->post('email');
			$company_id = $this->input->post('company_id');
			$role = $this->input->post('role');
			$remark = $this->input->post('remark');

			if(!empty($username) && !empty($pawd) && !empty($realname) && !empty($phone)){

				$add['username'] = $username;
				$add['pawd'] = $pawd;
				$add['realname'] = $realname;
				$add['gender'] = $gender;
				$add['email'] = $email;
				$add['remark'] = $remark;
				$add['phone'] = $phone;
				$add['company_id'] = $company_id;
				$add['addtime'] = time();
				
				if($this->account->add($add)){
					exit('ok');
				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{

			$company_id = isset($_GET['company_id']) ? $_GET['company_id'] : 0;
			$data['company_id'] = $company_id;

			$company = array();
			$where['where'] = array('isdel'=>'0');
			$company = $this->company->getList($where);
			$data['company'] = $company;

			$this->tpl('oa/account_add_tpl',$data);
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


}




