<?php

class Test extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->library('myemail');
		$this->load->library('Categorylib','categorylib');
	}


	public function index()
	{
		//$user = $this->userlib->user_login();
		//echo $user;
		//$result = $this->myemail->sendemail();
		//echo $result;

		$list = array();
		$list = $this->categorylib->get_category('WRZC_company_type');

		print_r($list);
	}
}