<?php


class Category_jobs_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_category_jobs';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}