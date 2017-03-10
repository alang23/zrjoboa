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
          <li class="active">编辑广告业务</li>
        </ul>
    </div>
      <div class="span24">

        <hr>
      <form id="J_Form" name="form1" method="post" action="<?=base_url()?>bussiness/edit_ad" class="form-horizontal" enctype="multipart/form-data">
      
      <div class="control-group">
        <label class="control-label">企业：</label>
        <div class="controls  control-row-auto">
              <?=$info['c_name']?>

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">业务日期：</label>
        <div class="controls">
          <input type="text" class="calendar" name="bussiness_time" value="<?=date("Y-m-d",$info['show_time'])?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>广告类型：</label>
        <div class="controls">
          <input name="ad_type" type="text"  id="ad_type" class="input-small" value="<?=$info['ad_type_name']?>" >

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">已缴费：</label>
        <div class="controls">
              <input name="payment" type="checkbox" value="1" <?php if($info['payment']=='1'){ ?> checked="checked" <?php } ?>/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否扣税：</label>
        <div class="controls">
              <input name="invoice" type="checkbox" value="1" <?php if($info['invoice']=='1'){ ?> checked="checked" <?php } ?>/>
        </div>
      </div>



            <div class="control-group">
              <label class="control-label">付款方式：</label>    
              <div class="controls control-row-auto">
                <label class="radio">
                  <input type="radio" name="pay_type" value="1" checked="1" <?php if($info['pay_type'] == '1'){ ?> checked <?php } ?>>现金
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="pay_type" value="2" <?php if($info['pay_type'] == '2'){ ?> checked <?php } ?>>转账  
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="4" <?php if($info['pay_type'] == '4'){ ?> checked <?php } ?>>微信
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="3" <?php if($info['pay_type'] == '3'){ ?> checked <?php } ?>>刷卡
                </label>
                      
              </div>
            </div>

            <div class="control-group">
        <label class="control-label">应收金额：</label>
        <div class="controls  control-row-auto">
          <input name="y_amount" type="text"  id="y_amount" class="input-large" value="<?=$info['y_amount']?>" >
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">实收金额：</label>
        <div class="controls  control-row-auto">
            <input name="s_amount" type="text"  id="s_amount" class="input-large" value="<?=$info['s_amount']?>" >

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">张贴时间：</label>
        <div class="controls">
          <input type="text" class="calendar" name="show_time" id="show_time" value="<?=date("Y-m-d",$info['show_time'])?>" onblur="check_shouwtime();">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">结束时间：</label>
        <div class="controls">
          <input type="text" class="calendar" name="end_time" id="end_time" value="<?=date("Y-m-d",$info['end_time'])?>" onblur="check_endtime();">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">收费项目：</label>
        <div class="controls  control-row-auto">
            广告制作
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">联系人：</label>
        <div class="controls  control-row-auto">
            <input name="contacts" type="text"  id="contacts" class="input-large" value="<?=$info['contacts']?>" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">联系电话：</label>
        <div class="controls  control-row-auto">
          <input name="phone" type="text"  id="phone" class="input-large" value="<?=$info['phone']?>">

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
            <button type="button" onclick="do_post();" class="button button-primary">保存</button>
            <button type="reset" class="button">重置</button>
          </div>
      </div>  
      <input type="hidden" name="id" value="<?=$info['id']?>" />     
    </form>
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    
<!-- script start --> 
    <script type="text/javascript">
        BUI.use('bui/calendar',function(Calendar){
          var datepicker = new Calendar.DatePicker({
            trigger:'.calendar',
            autoRender : true
          });
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
<script>

function check_shouwtime()
{

  var show_time = '';
  show_time = $("#show_time").val();
  if(show_time == ''){
      $("#show_time-err").remove();
      $("#show_time").after('<span class="x-field-error" id="show_time-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写张贴时间</label></span>');
      return false;
  }else{
      $("#show_time-err").remove();
      return true;
  }
}

function check_endtime()
{

  var end_time = '';
  end_time = $("#end_time").val();
  if(end_time == ''){
      $("#end_time-err").remove();
      $("#end_time").after('<span class="x-field-error" id="end_time-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写结束时间</label></span>');
      return false;
  }else{
      $("#end_time-err").remove();
      return true;
  }
}

function do_post()
{
  if(check_shouwtime() && check_endtime()){
    document.form1.submit();
  }
}
</script>
<!-- script end -->
  </div>
</body>
</html>