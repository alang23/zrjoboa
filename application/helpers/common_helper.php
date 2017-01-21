<?php

/**
*@desc 密码生成
*
**/
if ( ! function_exists('user_pawd'))
{
	function user_pawd($pawd,$key='')
	{
		return md5($pawd);
	}

}


if ( ! function_exists('responseData'))
{
	function responseData($data,$type='json')
	{
		echo json_encode($data);
		exit;
	}

}

if ( ! function_exists('get_ip'))
{
    function get_ip()
    {
        $CI =& get_instance();
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
         }else {
            $ip=$_SERVER['REMOTE_ADDR'];
         }
        return $ip;
    }
}