<?php


class Categorylib
{
	

	public static $_ci;

	public function __construct()
	{
		self::$_ci = & get_instance();//php 5.3中self改为static
	}

	//去参数
	public function get_category($key)
	{
		self::$_ci->load->model('Category_mdl','category');
		$where['where'] = array('c_alias'=>$key);
		$list = array();
		$list = self::$_ci->category->getList($where);

		return $list;

	}

	
}