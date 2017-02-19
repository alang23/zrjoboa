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

//客户审核状态

if(! function_exists('customer_status')){

    function customer_status($status)
    {

        $result = '';

        switch($status)
        {
            case 0:
                $result = '<span class="label label-warning">未审核</span>';
                break;
            case 1:
                $result = '<span class="label label-success">审核通过</span>';
                break;
            case 2:
                $result = '<span class="label label-important">审核不通过</span>';
                break;
            default:
               $result = '未知状态';
               break;
        }

        return $result;
    }
}

//业务审核状态
if(!function_exists('bussiness_status')){

    function bussiness_status($status)
    {
        $result = '';
        switch($status){
            case 0:
                $result = '<span class="label label-warning">未审核</span>';
                break;
            case 1:
                $result = '<span class="label label-success">审核通过</span>';
                break;
            case 2:
                $result = '<span class="label label-important">审核不通过</span>';
                break;
            case 3:
                $result = '<span class="label label-inverse">作废</span>';
                break;

            default:
               $result = '<span class="label label-inverse">未知</span>';
               break;
        }

        return $result;
    }
}

//缴费情况
if(!function_exists('payment_status')){

    function payment_status($status)
    {
        $result = '';

        switch($status)
        {
            case 0:
                $result = '<font color="red">未缴费</font>';
                break;
            case 1:
                $result = '<font color="green">已缴费</font>';
                break;
            default:
               $result = '未知状态';
               break;
        }

        return $result;
    }
}

if(!function_exists('do_ticket')){

    function do_ticket($status)
    {
        $result = '';

        switch($status)
        {
            case 0:
                $result = '<font color="red">未出票</font>';
                break;
            case 1:
                $result = '<font color="green">已出票</font>';
                break;
            default:
               $result = '未知状态';
               break;
        }

        return $result;
    }
}


if(!function_exists('get_invoice')){

    function get_invoice($status)
    {
        $result = '';
        switch($status){
            case 0:
                $result = '<span class="label label-success">不扣税</span>';
                break;
            case 1:
                $result = '<span class="label label-important">扣税</span>';
                break;
            default:
               $result = '<span class="label label-inverse">未知</span>';
               break;
        }

        return $result;
    }

}

if(!function_exists('is_member')){

    function is_member($status)
    {
        $result = '';
        switch($status){
            case 0:
                $result = '<font color="red">非会员</font>';
                break;
            case 1:
                $result = '<font color="green">会员</font>';
                break;
            default:
                $result = '未知';
                break;
        }

        return $result;
    }
}

if(!function_exists('customer_type')){

    function customer_type($c_type)
    {
        $result = '';
        switch($c_type){
            case 1:
                $result = '<font color="red">新客户</font>';
                break;
            case 2:
                $result = '<font color="green">重点客户</font>';
                break;
            case 3:
                $result = '<font color="green">潜在客户</font>';
                break;
            case 4:
                $result = '<font color="green">成交客户</font>';
                break;
            case 5:
                $result = '<font color="green">无意向客户</font>';
                break;
            case 6:
                $result = '<font color="green">黑名单客户</font>';
                break;
            default:
                $result = '未分类';
                break;
        }

        return $result;
    }
}

if(!function_exists('is_upload')){

    function is_upload($status)
    {
        $result = '';
        switch($status){
            case 0:
                $result = '<font color="red">未上传</font>';
                break;
            case 1:
                $result = '<font color="green">已经上传</font>';
                break;
            default:
                $result = '未知';
                break;
        }

        return $result;
    }
}

//性别
if( !function_exists('get_gender') ){

    function get_gender($v)
    {
        $result = '未知';
        switch($v){
            case 1:
                $result = '男';
                break;
            case 2:
                $result = '女';
                break;
            default:
                $result = '未知';
                break;
        }

        return $result;
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