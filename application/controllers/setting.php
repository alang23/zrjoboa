<?php


class Setting extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
	}

	//邮箱设置
	public function email()
	{
		$this->tpl('oa/setting_email_tpl');
	}
}