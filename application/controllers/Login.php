<?php



class Login extends Zrjoboa
{
	


	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->load->view('login');
	}
}