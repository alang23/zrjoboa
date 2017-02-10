<?php

class Test extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->library('myemail');
	}


	public function index()
	{
		//$user = $this->userlib->user_login();
		//echo $user;
		$result = $this->myemail->sendemail();
		echo $result;
	}
}