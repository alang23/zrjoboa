<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单页</title>
<!-- 此文件为了显示Demo样式，项目中不需要引入 -->
 
  <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
  <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
 
</head>
<body>
  <div class="container">
    
    <!-- 表单页 ================================================== --> 
    <div class="row">
    <div class="doc-content">
      <ul class="breadcrumb">
          <li>
            <a href="#">首页</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">账号管理</a> <span class="divider">/</span>
          </li>
          <li class="active">添加企业</li>
        </ul>
    </div>
      <div class="span24">
     
        <form id="J_Form" name="form1" class="form-horizontal" method="post" action="<?=base_url()?>company/add">
          <h3>企业信息：</h3>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>企业名称：</label>
              <div class="controls"><input class="input-large control-text" type="text" name="name" id="name" onblur="check_company_name();" > 
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>地址：</label>
              <div class="controls"><input class="input-large control-text" type="text" name="address" id="address" onblur="check_address();"></div>

            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>联系人：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="contacts" id="contacts" onblur="check_contacts();"></div>
            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>联系电话：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="phone" id="phone" onblur="check_phone();"></div>
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>Email：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="email"></div>
            </div>
 
 
 
            <div class="control-group">
              <label class="control-label">备注：</label>
              <div class="controls control-row4">
                <textarea type="text" class="input-large" data-valid="{}" name="remark"></textarea>
              </div>
            </div>
            <hr>
            <div class="form-actions span5 offset3">
              <button id="btnSearch" type="button" onclick="add_post();" class="button button-primary">提交</button>
            </div>
        </form> 
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    

<!-- script end -->
  </div>
<script>

function check_company_name()
{

  var name = '';
  name = $("#name").val();
  if(name == ''){
    $("#name-err").remove();
      $("#name").after('<span class="x-field-error" id="name-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写企业名称</label></span>');
      return false;
  }else{
      $("#name-err").remove();
      return true;
  }
}

function check_address()
{

  var pawd = '';
  pawd = $("#address").val();
  if(pawd == ''){
    $("#address-err").remove();
      $("#address").after('<span class="x-field-error" id="address-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写公司地址</label></span>');
      return false;
  }else{
      $("#address-err").remove();
      return true;
  }
}

function check_phone()
{
  var phone = '';
  phone = $("#phone").val();
  if(phone == ''){
      $("#phone-contacts").remove();
      $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写联系电话</label></span>');
      return false;
  }else{

      $("#phone-err").remove();
      return true;

  }
}

function check_contacts()
{

  var contacts = '';
  contacts = $("#contacts").val();
  if(contacts == ''){
      $("#address-contacts").remove();
      $("#contacts").after('<span class="x-field-error" id="contacts-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写联系人姓名</label></span>');
      return false;
  }else{
      $("#contacts-err").remove();
      return true;
  }
}

function add_post()
{
  if(check_company_name() && check_address() && check_contacts() && check_phone()){
    document.form1.submit();
  }
}


</script>
</body>
</html>