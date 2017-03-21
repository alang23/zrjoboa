    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>简单表单页</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
     
      <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
      <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
     
    </head>
    <body>
    <div class="container">
    <div class="doc-content">
      <ul class="breadcrumb">
          <li>
            <a href="#">办公应用</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">会议管理</a> <span class="divider">/</span>
          </li>
          <li class="active">添加会议</li>
        </ul>
    </div>
    <form id="J_Form"  name="form1" class="form-horizontal" method="post" action="<?=base_url()?>meetting/add">
      <h3>会议信息</h3>
      <div class="row">
        <div class="control-group span15">
          <label class="control-label">会议主题：</label>
          <div class="controls">
            <input name="title" type="text" value="" class="input-large" >
          </div>
        </div>

      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label">会议主持者：</label>
          <div class="controls bui-form-field-plain" >
              <input name="presenter" type="text" value="" class="control-text" >
          </div>
        </div>

                <div class="control-group12 span10">
          <label class="control-label">会议时间：</label>
          <div class="controls">
            <input name="day" class="calendar calendar-time" type="text" >
          </div>
        </div>
      </div>
      <div class="row">
 

        <div class="control-group12 span15">
          <label class="control-label">参会者：</label>
          <div class="controls">
            <input name="members" type="text" class="input-large">
          </div>
        </div>


      </div>

      <div class="row">
        <div class="control-group span10">
          <label class="control-label">地点：</label>
          <div class="controls">
            <input name="address" type="text" >
          </div>
        </div>
        <div class="control-group span10">
          <label class="control-label">会议级别：</label>
          <div class="controls">
            <select name="m_type">
              <option value="0">普通</option>
              <option value="1">重要</option>
              <option value="2">紧急</option>
              <option value="3">例会</option>
            </select>
          </div>
        </div>
      </div>

      <hr/>
      <div class="control-group">
          <label class="control-label">备注：</label>
          <div class="controls control-row4">
              <textarea type="text" class="input-large" data-valid="{}" name="content"></textarea>
          </div>
      </div>
      <hr/>
      <div class="row">
        <div class="form-actions offset3">
          <button type="submit" class="button button-primary">保存</button>
          <button type="reset" class="button" onclick="history.back();">返回</button>
        </div>
      </div>
 
    </form>
    
 
<script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>  
     <script type="text/javascript">
        BUI.use('bui/calendar',function(Calendar){
          var datepicker = new Calendar.DatePicker({
            trigger:'.calendar',
            showTime:true,
            autoRender : true
          });
        });
    </script>
<!-- script start --> 
<script type="text/javascript">
function do_post()
{
  document.form1.submit();
}
 
      
</script>
<!-- script end -->
  </div>
</body>

    </body>
    </html>

