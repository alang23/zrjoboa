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
            <a href="#">首页</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">求职者管理</a> <span class="divider">/</span>
          </li>
          <li class="active">添加求职者</li>
        </ul>
    </div>
    <form id="J_Form" name="form1" class="form-horizontal" method="post" action="<?=base_url()?>member/add_info">
      <h3>基本信息</h3>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
            <input name="realname" type="text" value="" class="control-text" >
          </div>
        </div>
        <div class="control-group span14">
          <label class="control-label"><s>*</s>手机：</label>
          <div class="controls bui-form-field-plain" >
              <input name="phone" type="text" id="phone" value="" class="control-text" onblur="check_phone();" >
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label">目前所在地：</label>
          <div class="controls">
            <select class="input-small" name="province" id="province" onchange="get_city(this.value);">
              <option value="0:无">=省=</option>
              <?php
                foreach($province as $k => $v){
              ?>
              <option value="<?=$v['id']?>:<?=$v['categoryname']?>"><?=$v['categoryname']?></option>
              <?php
                }
              ?>
            </select>
          
            <select class="input-small" name="city" id="city">
              <option value="0:无">=市=</option>
              
            </select>
          </div>
        </div>
        <div class="control-group span10">
          <label class="control-label"><s>*</s>籍贯：</label>
          <div class="controls bui-form-field-plain" >
              <input name="household" type="text" value="" class="control-text" >
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label">性别：</label>
          <div class="controls">
            <select name="sex">
              <option value="1">男</option>
              <option value="2">女</option>
            </select>
          </div>
        </div>
        <div class="control-group12 span10">
          <label class="control-label">出生年份：</label>
          <div class="controls">
            <input name="birthday" type="text" id="birthday"  />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label">学历：</label>
          <div class="controls">
            <select name="education">
                <option value="0:无">==无==</option>
                <?php
                 foreach($education as $ek =>$ev){
                ?>
                   <option value="<?=$ev['c_id']?>:<?=$ev['c_name']?>" <?php if($ev['c_id']=='66'){ ?> selected <?php } ?>><?=$ev['c_name']?></option>
                <?php
                  }
                ?>
            </select>
          </div>
        </div>
        <div class="control-group12 span10">
          <label class="control-label">薪资要求：</label>
          <div class="controls">
            <select name="wage">
                <option value="0:无">==无==</option>
                <?php
                 foreach($wage as $wk =>$wv){
                ?>
                   <option value="<?=$wv['c_id']?>:<?=$wv['c_name']?>" <?php if($wv['c_id']=='59'){ ?> selected <?php } ?>><?=$wv['c_name']?></option>
                <?php
                  }
                ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span10">
          <label class="control-label"><s>*</s>工作经验：</label>
          <div class="controls">
            <select name="experience">
                <option value="0:无">==无==</option>
                <?php
                 foreach($experience as $eek =>$eev){
                ?>
                   <option value="<?=$eev['c_id']?>:<?=$eev['c_name']?>" <?php if($eev['c_id']=='77'){ ?> selected <?php } ?>><?=$eev['c_name']?></option>
                <?php
                  }
                ?>
            </select>
          </div>
        </div>
        <div class="control-group span10">
          <label class="control-label"><s>*</s>求职意向：</label>
          <div class="controls">
            <input name="intention" type="text" >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="control-group span10">
          <label class="control-label">身份证：</label>
          <div class="controls">
            <input name="id_card" type="text" >
          </div>
        </div>
        <div class="control-group span10">
          <label class="control-label">人才类型：</label>
          <div class="controls">
             <input id="person_type" type="radio" name="person_type" value="0" checked="checked" /><label for="person_type_1">普通人才</label></td><td><input id="person_type" type="radio" name="person_type" value="1" /><label for="txtw_sex_1">高级人才</label>
          </div>
        </div>
      </div>
      <hr/>
      
      <div class="row">
        <div class="form-actions offset3">
          <button type="button" class="button button-primary" onclick="do_post();">保存</button>
          <button type="reset" class="button" onclick="history.back();">返回</button>
        </div>
      </div>
 
    </form>
    
 
<script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>  
     <script type="text/javascript">
     /*
        BUI.use('bui/calendar',function(Calendar){
          var datepicker = new Calendar.DatePicker({
            trigger:'.calendar',
            dateMask : 'yyyy',
            autoRender : true
          });
        });
        */
    </script>
<!-- script start --> 
<script type="text/javascript">
function get_city(id)
{

    
    var aj = $.ajax( {
              url:'<?=base_url()?>member/get_city_select',
              data:{
                  
                  id : id,
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
               
               if(data.code == 0){

                    $("#city").html(data.data);

               }else{
                
                  alert('error');

               }

              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
} 
 

function check_phone()
{

  var phone = '';
  phone = $("#phone").val();

  if(phone == ''){
    $("#phone-err").remove();
      $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">手机号不能为空</label></span>');
      return false;
  }else{

        var aj = $.ajax( {
              url:'<?=base_url()?>member/check_phone',
              data:{                 
                  phone : phone                 
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.code);
                if(data.code != 0){
                  $("#phone-err").remove();
                  $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">'+data.msg+'</label></span>');
                  return false;
                }else{
                  $("#phone-err").remove();
                  return true;
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
      $("#phone-err").remove();
      return true;
  }
}

function do_post()
{

  var phone = '';
  phone = $("#phone").val();

  if(phone == ''){
    $("#phone-err").remove();
      $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">手机号不能为空</label></span>');
      return false;
  }else{

        var aj = $.ajax( {
              url:'<?=base_url()?>member/check_phone',
              data:{                 
                  phone : phone                 
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.code);
                if(data.code != 0){
                  $("#phone-err").remove();
                  $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">'+data.msg+'</label></span>');
                  return false;
                }else{
                  $("#phone-err").remove();
                  //return true;
                  document.form1.submit();
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
      $("#phone-err").remove();
      return true;
  }
}
      
</script>
<!-- script end -->
  </div>
</body>

    </body>
    </html>

