<?php

include_once "wxsdk/wxBizMsgCrypt.php";

class Wxsdk extends WXBizMsgCrypt
{

	public static $_ci;

	public function __construct()
	{
		self::$_ci = & get_instance();//php 5.3中self改为static
	}


}