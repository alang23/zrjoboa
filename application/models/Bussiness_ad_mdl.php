<?php


class Bussiness_ad_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_bussiness_ad';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}