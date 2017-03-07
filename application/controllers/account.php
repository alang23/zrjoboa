<?php


class Account extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_mdl','account');
		$this->load->model('company_mdl','company');
		$this->load->model('role_mdl','role');

	}


	public function index()
	{

		//权限
		$check_role = $this->userlib->check_role('access_list');

		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;

		$company_id = isset($_GET['company_id']) ? $_GET['company_id'] : 0;
		$data['company_id'] = $company_id;
		$kw = isset($_GET['kw']) ? $_GET['kw'] : '';
		$data['kw'] = $kw;

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
      
        
        $where['sql'] = " where (1=1 AND a.isdel='0')";     
        if(!empty($company_id)){

        	$where['sql'] .= ' AND a.company_id = '.$company_id;      	
        }   
        if(!empty($kw)){
        	$where['sql'] .= " and a.username LIKE '%".$kw."%' OR a.realname LIKE '%".$kw."%' OR a.phone LIKE '%".$kw."%' ";
        }

        if($userinfo['role_tag'] == 'root'){
        	if($userinfo['company_id'] != '0'){
        		$where['sql'] .= " and a.company_id = ".$userinfo['company_id'];
        	}
        }
        $count = $this->account->get_count_ar($where);
        $data['count'] = $count;    

        $pageconfig['base_url'] = base_url('/account/index?kw='.$kw);
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
		$list = $this->account->get_list_by_ar($where);
		
		$data['list'] = $list;
		$this->tpl('oa/account_tpl',$data);

	}

	public function detail()
	{
		$id = $this->input->get('id');
		$config['where'] = array('a.id'=>$id);
		$info = array();
		$info = $this->account->get_one_by_join($config);
		$data['info'] = $info;

		$this->tpl('oa/account_detail',$data);
	}

	public function add()
	{
		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;

		if(!empty($_POST)){

			$username = $this->input->post('username');
			$pawd = $this->input->post('pawd');
			$realname = $this->input->post('realname');
			$gender = $this->input->post('gender');
			$phone = $this->input->post('phone');
			$works = $this->input->post('works');
			$email = $this->input->post('email');
			//$company_id = $this->input->post('company_id');
			$role = $this->input->post('role');
			$remark = $this->input->post('remark');
			$role = $this->input->post('role');

			if($userinfo['role_tag'] == 'root' && $userinfo['company_id'] != '0'){
				$company_id = $userinfo['company_id'];
			}else{
				$company_id = $this->input->post('company_id');
			}


			if(!empty($username) && !empty($pawd) && !empty($realname) && !empty($phone) && !empty($role)){

				//判断用户名是否重复
				$check_config['where'] = array('username'=>$username);
				$check_inifo = $this->account->get_one_by_where($check_config);
				if(!empty($check_inifo)){
					exit('username is haved');
				}

				$add['username'] = $username;
				$add['pawd'] = user_pawd($pawd);
				$add['realname'] = $realname;
				$add['gender'] = $gender;
				$add['email'] = $email;
				$add['remark'] = $remark;
				$add['phone'] = $phone;
				$add['works'] = $works;
				$add['company_id'] = $company_id;
				$add['role'] = $role;
				$add['addtime'] = time();
				
				if($this->account->add($add)){
					$msg['title'] = '添加成功';
					$msg['msg'] = '<a href="'.base_url().'account/index">返回列表</a> | <a href="'.base_url().'account/add">继续添加</a>';
					$this->tpl('msg/msg_success',$msg);
				}else{
					$msg['title'] = '添加失败';
					$msg['msg'] = '<a href="'.base_url().'account/index">返回列表</a> | <a href="'.base_url().'account/add">继续添加</a>';
					$this->tpl('msg/msg_errors',$msg);
				}
			}else{
					$msg['title'] = '添加失败,缺少参数';
					$msg['msg'] = '<a href="'.base_url().'account/index">返回列表</a> | <a href="'.base_url().'account/add">继续添加</a>';
					$this->tpl('msg/msg_errors',$msg);
			}

		}else{

			$roles = $this->userlib->check_role('access_add');
			
			$data['roles'] = $roles;
			$company_id = isset($_GET['company_id']) ? $_GET['company_id'] : 0;
			$data['company_id'] = $company_id;

			if($userinfo['company_id'] == '0'){

				$company = array();
				$where['where'] = array('isdel'=>'0');
				$company = $this->company->getList($where);
				$data['company'] = $company;

			}else{

				$company_info = array();
				$company_where['where'] = array('id'=>$userinfo['company_id']);
				$company_info = $this->company->get_one_by_where($company_where);
				$data['company_info'] = $company_info;
			}

			$_role = array();
			$_role = $this->get_role();
			$data['_role'] = $_role;

			$this->tpl('oa/account_add_tpl',$data);
		}
		
	}

	public function edit()
	{


		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;

		if(!empty($_POST)){

			$pawd = $this->input->post('pawd');
			$realname = $this->input->post('realname');
			$gender = $this->input->post('gender');
			$phone = $this->input->post('phone');
			$works = $this->input->post('works');
			$email = $this->input->post('email');
			$role = $this->input->post('role');
			$remark = $this->input->post('remark');
			$id = $this->input->post('id');
			$role = $this->input->post('role');

			if($userinfo['role_tag'] == 'root' && $userinfo['company_id'] != '0'){
				$company_id = $userinfo['company_id'];
			}else{
				$company_id = $this->input->post('company_id');
			}

			if(!empty($realname) && !empty($works) && !empty($phone) && !empty($id)){

				$update_data['realname'] = $realname;
				$update_data['gender'] = $gender;
				$update_data['works'] = $works;
				$update_data['phone'] = $phone;
				$update_data['email'] = $email;
				$update_data['remark'] = $remark;
				$update_data['role'] = $role;
				$update_data['company_id'] = $company_id;

				if(!empty($pawd)){

					$update_data['pawd'] = user_pawd($pawd);
				}

				$update_config = array('id'=>$id);
				if($this->account->update($update_config,$update_data)){
					$msg['title'] = '修改成功';
					$msg['msg'] = '<a href="'.base_url().'account/index">返回列表</a> ';
					$this->tpl('msg/msg_success',$msg);
				}else{
					$msg['title'] = '修改失败，没有任何修改内容';
					$msg['msg'] = '<a href="'.base_url().'account/index">返回列表</a> ';
					$this->tpl('msg/msg_errors',$msg);
				}
			}else{
					$msg['title'] = '修改失败,缺少参数';
					$msg['msg'] = '<a href="'.base_url().'account/index">返回列表</a> ';
					$this->tpl('msg/msg_errors',$msg);
			}

		}else{

			$roles = $this->userlib->check_role('access_edit');
			$data['roles'] = $roles;

			$id = $this->input->get('id');
			$where['where'] = array('id'=>$id);
			$info = $this->account->get_one_by_where($where);
			$data['info'] = $info;

			$company = array();
			$where['where'] = array('isdel'=>'0');
			$company = $this->company->getList($where);
			$data['company'] = $company;

			//权限列表
			$_role = array();
			$_role = $this->get_role();
			$data['_role'] = $_role;

			if($userinfo['company_id'] == '0'){

				$company = array();
				$where['where'] = array('isdel'=>'0');
				$company = $this->company->getList($where);
				$data['company'] = $company;
				
			}else{

				$company_info = array();
				$company_where['where'] = array('id'=>$userinfo['company_id']);
				$company_info = $this->company->get_one_by_where($company_where);
				$data['company_info'] = $company_info;

			}

			$this->tpl('oa/account_edit_tpl',$data);
		}
	}

	public function del()
	{
		$id = $this->input->get('id');
		$del_config = array('id'=>$id);
		$del_data['isdel'] = 1;
		if($this->account->update($del_config,$del_data)){
			redirect('msgtips/success');
		}else{
			echo 'err';
		}
	}

	//ajax验证用户名
	public function check_username()
	{

		$username = $this->input->post('username');
		if(empty($username)){
			$msg = array(
				'code'=>2,
				'msg'=>'用户名不能为空'
				);
			responseData($msg);
		}

		$check_config['where'] = array('username'=>$username);
		$userinfo = array();
		$userinfo = $this->account->get_one_by_where($check_config);
		if(!empty($userinfo)){
			$msg = array(
				'code'=>1,
				'msg'=>'用户名已存在'
				);
		}else{
			$msg = array(
				'code'=>0,
				'msg'=>'用户名已存在'
				);
		}

		responseData($msg);
		exit;

	}

	//权限列表
	public function get_role()
	{
		$_role = array();
		$where['where'] = array('enabled'=>'0');
		$_role = $this->role->getList($where);

		return $_role;
	}


}




