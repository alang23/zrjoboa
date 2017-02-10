<?php

require_once 'phpemailer/class.phpmailer.php';

class Myemail extends PHPMailer{

	public function __construct(){

		parent::__construct();
	}

	public function sendemail()
	{
		$this->IsSMTP();                  // send via SMTP    
        $this->SMTPDebug  = 1;                     // 启用SMTP调试功能
        $this->Host = "smtp.163.com";   // SMTP servers  
        $this->smtp_port = 25;   
        $this->SMTPAuth = true;    // turn on SMTP authentication   
        $this->SMTPSecure = "ssl";                 // 安全协议        
        $this->Username = "lanlibin23@163.com";     // SMTP username  注意：普通邮件认证不需要加 @域名    
        $this->Password = "geili2012"; // SMTP password    
        $this->From = "lanlibin23@163.com";      // 发件人邮箱  
        $this->FromName =  "【Personal】 ";  // 发件人  
        $body = 'test00000000000';

        $this->CharSet = "UTF-8";   // 这里指定字符集！    
        $this->Encoding = "base64";    
        $this->AddAddress('349490156@qq.com',"test");  // 收件人邮箱和姓名      
        $this->IsHTML(true);  // send as HTML    
        // 邮件主题   

        $this->Subject = '访客邮件'; 
        // 邮件内容    
        $this->Body = $body;  

        if(!$this->Send()) {
               echo "Mailer Error: " . $this->ErrorInfo;
            return 0;
        } else {
                //echo "Message sent!恭喜，邮件发送成功！";
            return 1;
        }

	}




}