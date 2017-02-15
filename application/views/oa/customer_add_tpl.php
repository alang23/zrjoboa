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
            <a href="#">客户管理</a> <span class="divider">/</span>
          </li>
          <li class="active">添加客户</li>
        </ul>
    </div>
      <div class="span24">
        <h4>添加客户</h4>
        <hr>
       <form id="J_Form" name="form1" method="post" action="<?=base_url()?>customer/add" class="form-horizontal">
      <div class="control-group">
        <label class="control-label"><s>*</s>客户代表：</label>
        <div class="controls bui-form-group-select">
          <select class="input-small" name="uid">
          <?php
            foreach($account as $ak => $av){
          ?>
            <option value="<?=$av['id']?>-<?=$av['realname']?>"><?=$av['realname']?></option>
          <?php
            }
          ?>
          </select>&nbsp;&nbsp;
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>单位名称：</label>
        <div class="controls">
          <input name="c_name" type="text"  id="c_name" class="input-large" onblur="check_name();">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">联系人：</label>
        <div class="controls">
          <input type="text" class="input-large" name="contacts" id="contacts" onblur="check_contacts();" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">联系电话：</label>
        <div class="controls">
          <input type="text" class="input-large" id="tel" name="tel" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">单位地址：</label>
        <div class="controls">
          <input type="text" class="input-large" name="address" id="address" >
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">备注：</label>
        <div class="controls  control-row-auto">
          <textarea name="remarks" id="remarks" class="control-row4 input-large"></textarea>
        </div>
      </div>
      <div class="row actions-bar">       
          <div class="form-actions span13 offset3">
            <button type="button" onclick="add_post();" class="button button-primary">保存</button>
            <button type="reset" class="button">重置</button>
          </div>
      </div>       
    </form>
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    

<script>
//检查密码
function check_name()
{

  var c_name = '';
  c_name = $("#c_name").val();
  if(c_name == ''){
    $("#c_name-err").remove();
      $("#c_name").after('<span class="x-field-error" id="c_name-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">单位名称不能为空</label></span>');
      return false;
  }else{
      $("#c_name-err").remove();
      return true;
  }
}

function check_contacts()
{

  var contacts = '';
  contacts = $("#contacts").val();
  if(contacts == ''){
    $("#contacts-err").remove();
      $("#contacts").after('<span class="x-field-error" id="contacts-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写联系人</label></span>');
      return false;
  }else{
      $("#contacts-err").remove();
      return true;
  }
}

function add_post()
{
  if(check_name() && check_contacts()){
      document.form1.submit();
  }
}


</script>
<!-- script end -->
  </div>
</body>
</html>