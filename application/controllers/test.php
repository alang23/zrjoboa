<?php

class Test extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->library('myemail');
		$this->load->library('Categorylib','categorylib');
		$this->load->library('Smsapi','smsapi');
		$this->load->model('Customer_mdl','customer');
		$this->load->model('Contacts_mdl','contacts');
	}


	public function index()
	{

		$list = $this->customer->getList();
		$num = 0;
		foreach($list as $k => $v){
			$add['realname'] = $v['contacts'];
			$add['tel'] = $v['tel'];
			$add['phone'] = $v['phone'];
			$add['fax'] = $v['fax'];
			$add['qq'] = $v['qq'];
			$add['webchat'] = $v['webchat'];
			$add['company_id'] = $v['id'];
			$add['addtime'] = time();
			//$arr[] = $add;
			if($this->contacts->add($add)){
				$num++;
			}
		}

		echo $num;

		


	}
}