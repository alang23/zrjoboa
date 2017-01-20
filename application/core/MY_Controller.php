<?php
/**
*@desc 系统基类
*@author alang
*
**/


class Zrjoboa extends CI_Controller
{
	



	public function __construct()
	{
		parent::__construct();
	}


	//判断登录
	public function check_login()
	{
		
	}


	public function tpl($tpl,$data=array())
	{
		$this->load->view($tpl,$data);
	}

	private function get_auth()
	{
		//$token = $this->
	}
}

