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
            <a href="#">业务管理</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">业务办理</a> <span class="divider">/</span>
          </li>
          <li class="active">添加广告业务</li>
        </ul>
    </div>
      <div class="span24">
      <a href="<?=base_url()?>bussiness/index?type=ex"><button class="button">现场业务</button></a>
      <button class="button  button-success">广告业务</button>
        <hr>
      <form id="J_Form" method="post" action="<?=base_url()?>bussiness/add_ad" class="form-horizontal" enctype="multipart/form-data">
      
      <div class="control-group">
        <label class="control-label">企业：</label>
        <div class="controls  control-row-auto">
                <select name="bussiness_id" class="input-normal"> 
                <?php
                  foreach($bussiness as $bk => $bv){
                ?>
                  <option value="<?=$bv['id']?>" <?php if($bussiness_id == $bv['id']){?> selected <?php } ?> ><?=$bv['c_name']?></option>
                <?php
                  }
                ?>
                </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">业务日期：</label>
        <div class="controls">
          <input type="text" class="calendar" name="bussiness_time" value="">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>广告类型：</label>
        <div class="controls">
                <select name="ad_type" class="input-normal"> 
                <?php
                  foreach($ad_type as $atk => $atv){
                ?>
                  <option value="<?=$atv['id']?>"  ><?=$atv['ad_name']?></option>
                <?php
                  }
                ?>
                </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">已缴费：</label>
        <div class="controls">
              <input name="payment" type="checkbox" value="1" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否扣税：</label>
        <div class="controls">
              <input name="invoice" type="checkbox" value="1" />
        </div>
      </div>

            <div class="control-group">
              <label class="control-label">付款方式：</label>    
              <div class="controls control-row-auto">
                <label class="radio">
                  <input type="radio" name="pay_type" value="now" checked="1">现金
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="pay_type" value="2">转账  
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="3">刷卡
                </label>
                      
              </div>
            </div>

            <div class="control-group">
        <label class="control-label">应收金额：</label>
        <div class="controls  control-row-auto">
          <input name="y_amount" type="text"  id="y_amount" class="input-large" >
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">实收金额：</label>
        <div class="controls  control-row-auto">
            <input name="s_amount" type="text"  id="s_amount" class="input-large" >

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">张贴时间：</label>
        <div class="controls">
          <input type="text" class="calendar" name="show_time" value="">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">结束时间：</label>
        <div class="controls">
          <input type="text" class="calendar" name="end_time" value="">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">收费项目：</label>
        <div class="controls  control-row-auto">
                <select name="pay_project" class="input-normal"> 
                <?php
                  foreach($charge_type as $ckt => $ckv){
                ?>
                  <option value="<?=$ckv['id']?>"><?=$ckv['name']?></option>
                <?php
                  }
                ?>
                </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">联系人：</label>
        <div class="controls  control-row-auto">
            <input name="contacts" type="text"  id="contacts" class="input-large" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">联系电话：</label>
        <div class="controls  control-row-auto">
          <input name="phone" type="text"  id="phone" class="input-large">

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">文件：</label>
        <div class="controls  control-row-auto">
          <input name="userfile" type="file"  id="phone" class="input-large">

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
<!-- script start --> 
    <script type="text/javascript">
      BUI.use('bui/form',function(Form){
      
      
      new Form.Form({
        srcNode : '#J_Form'
      }).render();
      
  });  
      
</script>

<!-- script start --> 
    <script type="text/javascript">
        BUI.use('bui/uploader',function (Uploader) {
        
      //添加自定义主题
      Uploader.Theme.addTheme('imageView', {
        elCls: 'imageViewTheme',
        //可以设定该主题统一的上传路径
        url: '../../../test/upload/upload.php',
        queue:{
          //结果的模板，可以根据不同状态进进行设置
          resultTpl: {
            'default': '<div class="default">{name}</div>',
            'success': '<div class="success"><img src="../../../test/upload/{url}" /></div>',
            'error': '<div class="error"><span class="uploader-error">{msg}</span></div>',
            'progress': '<div class="progress"><div class="bar" style="width:{loadedPercent}%"></div></div>'
          }
        }
      });
 
      var uploader = new Uploader.Uploader({
        //指定使用主题
        theme: 'imageView',
        render: '#J_Uploader',
        //不设时使用主题配置的上传路径
        url: '../../../test/upload/upload.php'
      }).render();
    });
    </script>
<!-- script end -->

<!-- script end -->
  </div>
</body>
</html>