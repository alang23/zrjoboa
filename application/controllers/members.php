<?php


class Members extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->tpl('members_tpl');
	}
}