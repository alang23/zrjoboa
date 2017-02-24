<?php


class Message extends Zrjoboa
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Messagemodel_mdl','messagemodel');
	}

	public function index()
	{

	}

	//短信模板
	public function msmmodel()
	{
		$this->tpl('crm/crm_messagemodel_tpl');
	}
}