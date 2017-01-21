<?php

class Test extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$user = $this->userlib->user_login();
		echo $user;
	}
}