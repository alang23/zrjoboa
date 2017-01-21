<?php



class Login extends CI_Controller
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_mdl','account');
		$this->load->model('login_log_mdl','login_log');

	}


	public function index()
	{

		$this->load->view('login');

	}


	public function user_login()
	{

		$username = $this->input->post('username');
		$pawd = $this->input->post('pawd');

		if(empty($username) || empty($pawd)){
			$msg = array(
				'code'=>1,
				'msg'=>$username
			);
			responseData($msg);
		}

			//验证用户
		$config['where'] = array('username'=>$username);
		$account_info = $this->account->get_one_by_where($config);
		if(empty($account_info)){
			$msg = array(
				'code'=>2,
				'msg'=>'用户不存在'
				);
			responseData($msg);
		}

		//验证密码
		$_pawd = user_pawd($pawd);
		if($_pawd != $account_info['pawd']){
			$msg = array(
				'code'=>3,
				'msg'=>'密码错误'
				);
			responseData($msg);
		}

			//修改登录信息
		unset($account_info['pawd']);
		$user = $this->userlib->user_login($account_info);

		//记录登陆
		$log_data['uid'] = $account_info['id'];
		$log_data['addtime'] = time();
		$log_data['ip'] = get_ip();
		$this->login_log->add($log_data);
		
		$msg = array(
			'code'=>0,
			'msg'=>'登陆成功'
			);
		responseData($msg);

	}

	public function logout()
	{
		$this->userlib->user_logout();
		redirect('/login');
	}




}


