<?php
/**
AppID
wxf2ed0e8f0b59e358
AppSecret
4eab76783a0945cfa2aedab3b71f41a9
*/

class Weixin extends CI_Controller
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Wxsdk','wxsdk');
		$this->load->model('Wx_search_mdl','wx_search');
	}

	public function index()
	{
		
		$msg = file_get_contents('php://input');

		$xml_tree = new DOMDocument();
		$xml_tree->loadXML($msg);
		
		$array_e = $xml_tree->getElementsByTagName('FromUserName');
		$array_s = $xml_tree->getElementsByTagName('Content');
		$array_t = $xml_tree->getElementsByTagName('MsgType');
		$array_id = $xml_tree->getElementsByTagName('MsgId');
		$array_tu = $xml_tree->getElementsByTagName('ToUserName');

		$fromusername = $array_e->item(0)->nodeValue;
		$tousername = $array_tu->item(0)->nodeValue;
		$content = $array_s->item(0)->nodeValue;
		$msgtype = $array_t->item(0)->nodeValue;
		$msgid = $array_id->item(0)->nodeValue;

		$add['fromusername'] = $fromusername;
		$add['content'] = $content;
		$add['msgtype'] = $msgtype;
		$add['msgid'] = $msgid;
		$add['addtime'] = time();
		$this->wx_search->add($add);

		$k_str = "职位:木工\n";
		$k_str .= "公司:深圳科技有限公司\n";
		$k_str .= "地区:广东/深圳\n";
		$k_str .= "电话:13800138000\n";

		$s_msg = '<xml>
		<ToUserName><![CDATA['.$fromusername.']]></ToUserName>
		<FromUserName><![CDATA['.$tousername.']]></FromUserName>
		<CreateTime>12345678</CreateTime>
		<MsgType><![CDATA[text]]></MsgType>
		<Content><![CDATA['.$k_str.']]></Content>
		</xml>';
		echo $s_msg;

		/*
		$fp = fopen('token.txt','a+');
		fwrite($fp,$content);
		fclose($fp);
		*/
		

	}
}