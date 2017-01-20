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
        <h2>添加企业</h2>
        <hr>
        <form id="J_Form" class="form-horizontal" method="post" action="<?=base_url()?>company/add">
          <h3>企业信息：</h3>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>企业名称：</label>
              <div class="controls"><input class="input-large control-text" type="text" name="name" data-rules="{required:true}" data-messages="{required:'供应商编码不能为空'}"> </div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>地址：</label>
              <div class="controls"><input class="input-large control-text" type="text" name="address"></div>

            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>联系人：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="contacts"></div>
            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>联系电话：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="phone"></div>
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>Email：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="email"></div>
            </div>
 
 
 
            <div class="control-group">
              <label class="control-label">仓原备注：</label>
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