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
            <a href="#">商家管理</a> <span class="divider">/</span>
          </li>
          <li class="active">价格规则列表</li>
        </ul>
    </div>
      <div class="span24">
        <h3>添加账号</h3>
        <hr>
        <form id="J_Form" class="form-horizontal" method="post" action="<?=base_url()?>account/add">
   
 
            <div class="control-group">
              <label class="control-label"><s>*</s>登陆账号：</label>
              <div class="controls"><input class="input-large control-text" type="text" name="username"></div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>密码：</label>
              <div class="controls"><input class="input-large control-text" type="text" name="pawd"></div>

            </div>
             <div class="control-group">
              <label class="control-label">公司：</label>
              <div class="controls">
                <select name="company_id" class="input-normal"> 
                  <?php
                    foreach($company as $ck => $cv){
                  ?>
                  <option value="<?=$cv['id']?>"><?=$cv['name']?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>姓名：</label>
              <div class="controls">
              <input class="input-normal control-text" type="text" name="realname">
<span class="x-field-error"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">输入值长度不小于5！</label></span>
              </div>
            </div>
 
            <div class="control-group">
            <label class="control-label"><s>*</s>姓名：</label>
              <label class="control-label radio">
                <input type="radio" name="gender" value="1"> 男
                <input type="radio" name="gender" value="2"> 女
              </label>
             
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>职位：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="works"></div>
            </div>
 
             <div class="control-group">
              <label class="control-label"><s>*</s>电话：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="phone"></div>
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
              <button id="btnSearch" type="submit" class="button button-primary">提交</button>
            </div>
        </form> 
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    
<script type="text/javascript">
      BUI.use('bui/form',function  (Form) {
        new Form.Form({
          srcNode : '#J_Form'
        }).render();
      });
    </script>
<!-- script end -->
  </div>
</body>
</html>