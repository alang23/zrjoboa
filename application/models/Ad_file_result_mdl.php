<?php
/**
*@海报预览
*
**/

class Ad_file_result_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_ad_file_result';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}