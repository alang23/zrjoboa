<?php


class Defaults extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->tpl('defaults');
	}
}