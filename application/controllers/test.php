<?php

class Test extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->library('myemail');
		$this->load->library('Categorylib','categorylib');
		$this->load->library('Smsapi','smsapi');
	}


	public function index()
	{
		//$user = $this->userlib->user_login();
		//echo $user;
		//$result = $this->myemail->sendemail();
		//echo $result;

		if(){
			
		}


	}
}