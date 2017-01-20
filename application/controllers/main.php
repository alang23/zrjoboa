<?php


class Main extends Zrjoboa
{
	


	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->tpl('main_tpl');
	}
}