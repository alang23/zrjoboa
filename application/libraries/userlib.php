<?php



class Userlib
{


	public static $_ci;

	public function __construct()
	{
		self::$_ci = & get_instance();//php 5.3中self改为static
	}



	//用户登陆
	public function user_login($data=array())
	{

		$cookie_key = self::$_ci->config->item('admin_session');
		self::$_ci->session->set_userdata($cookie_key,json_encode($data));

		return 1;


	}

	//验证用户登陆
	public function check_user_login()
	{

		$cookie_key = self::$_ci->config->item('admin_session');
		$token = self::$_ci->session->userdata($cookie_key);

		$userinfo = array();
		if(!empty($token)){
			$userinfo = json_decode($token,true);
		}
		
		return $userinfo;

	}

	//退出登陆
	public function user_logout()
	{

		$cookie_key = self::$_ci->config->item('admin_session');
		self::$_ci->session->set_userdata($cookie_key,'');
		self::$_ci->session->unset_userdata($cookie_key);

		return 1;
	}

	//权限检查
	public function check_role($role_tag)
	{

		$token = $this->check_user_login();
		$_role = array();

		$_role_where['where'] = array('id'=>$token['role']);
		self::$_ci->load->model('role_mdl','role');
		$_role = self::$_ci->role->getList($_role_where);

		if(empty($_role)){
			$data['msg'] = '无权限';
			redirect('msgtips/check_role',$data);

		}

		$_role_arr = array();
		foreach($_role as $_k => $_v){
			$_role_arr[] = $_v['role_tag'];
		}

		if(!in_array($role_tag, $_role_arr)){
			$data['msg'] = '无权限';
			redirect('msgtips/check_role',$data);
		}

		return $_role_arr;


	}

}