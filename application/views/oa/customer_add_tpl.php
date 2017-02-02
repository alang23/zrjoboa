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
          <form id="J_Form" id="form1" method="post" action="<?=base_url()?>customer/add" class="form-horizontal">
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
          <input name="c_name" type="text"  id="c_name" class="input-large" data-rules="{required : true}">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">联系人：</label>
        <div class="controls">
          <input type="text" class="input-large" name="contacts" id="contacts" >
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
            <button type="submit" class="button button-primary">保存</button>
            <button type="reset" class="button">重置</button>
          </div>
      </div>       
    </form>
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    

<script>
//验证用户名
function check_username()
{
  var username = $("#username").val();
  if(username == ''){
    $("#username").after('<span class="x-field-error"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">输入值长度不小于5！</label></span>');
  }
    var aj = $.ajax( {
              url:'<?=base_url()?>account/check_username',
              data:{
                  
                  username : username,
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                
                if(data.code != 0){
                  $("#username").after('<span class="x-field-error"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">用户名不可用,已经存在</label></span>');
                }else{
                  $(".x-field-error").remove();
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
}


</script>
<!-- script end -->
  </div>
</body>
</html>