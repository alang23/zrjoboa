    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>详情页</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
     <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
      <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
    <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>static/layer/layer.js">
    </script>
     
    </head>
    <body>
    <div class="container">
    <ul class="breadcrumb">
            <li>
              <a href="#">CRM</a> <span class="divider">/</span>
            </li>
            <li>
              <a href="#">客户管理管理</a> <span class="divider">/</span>
            </li>
            <li class="active">回访信息</li>
    </ul>

    <div class="detail-section">  
    <!-- 详情页 ================================================== -->
      <div class="row">
        <div class="span24">
          <!-- 包含grid的详情页 ================================================== -->
          <h2><?=$customer['c_name']?></h2>
          <hr>        
            <div class="row detail-row">
              <div class="span6">
                <label>企业性质：</label><span class="detail-text"><?=$customer['nature_cn']?></span>   
              </div>
              <div class="span6">
                <label>行业类型：</label><span class="detail-text"><?=$customer['industry_cn']?></span>
              </div>
              <div class="span6">
                <label>企业规模：</label><span class="detail-text"><?=$customer['scale_cn']?></span>
              </div>
            </div>    

            <div class="row detail-row">
              <div class="span6">
                <label>地区：</label><span class="detail-text"><?=$customer['province_cn']?>-<?=$customer['city_cn']?></span>
              </div>
              <div class="span6">
                <label>详细地址：</label><span class="detail-text"><?=$customer['address']?></span>
              </div>
            </div> 

            <div class="row detail-row">
              <div class="span6">
                <label>备注:</label><span class="detail-text"><?=$customer['remarks']?></span>
              </div>
            </div>    
 
        </div>
      </div> 
      <hr/>
      <div class="detail-section">  
        <h4>联系人<button class="button button-small button-success" id="btnShow">添加联系人</button></h4>


        <hr>
        <div class="detail-row">
          <table cellspacing="0" class="table table-head-bordered">
            <thead>
            <tr>
              <th>姓名</th>
              <th>职务</th>
              <th>性别</th>
              <th>工作电话</th>
              <th>电话</th>
              <th>邮箱</th>
              <th>生日</th>
              <th>备注</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody id="tbody">
          <?php
            foreach($contacts as $ck => $cv){

          ?>
            <tr id="contact_<?=$cv['id']?>">
              <td><?=$cv['realname']?></td>
              <td><?=$cv['job']?></td>
              <td><?=$cv['sex']?></td>
              <td><?=$cv['tel']?></td>
              <td><?=$cv['phone']?></td>
              <td><?=$cv['email']?></td>
              <td><?=$cv['birthday']?></td>
              <td><?=$cv['remarks']?></td>
              <td>
                <div id="showbtn">
                <button class="button button-small button-warning" onclick="huifang('<?=$cv['realname']?>','<?=$cv['phone']?>');" id="btnShow2" value="<?=$cv['id']?>">回访</button>
            <a href="javascript:void(0);" rel="<?=$cv['id']?>"><button class="button button-small button-warning" id="btnShow2" value="<?=$cv['id']?>">编辑</button></a> 
              <a href="javascript:void(0);" onclick="del_contact('<?=$cv['id']?>');"><button class="button button-small button-danger">删除</button></a>
              </div>
              </td>
            </tr>
            <?php
              }
            ?>
            </tbody>
          </table>            
        </div>
      </div>    


      <div class="panel">
          <div class="panel-header">
            <h3>回访记录</h3>
          </div>
          <div class="panel-body">
            
            <form id="J_Form" class="form-horizontal" method="post" action="<?=base_url()?>member/add_info">
              <h3>基本信息</h3>
              <div class="row">
                <div class="control-group span20">
                <label class="control-label">客户类型：</label>
                <div class="controls">
                  <label class="radio" for="d"><input name="c_type" type="radio" value="1">新客户</label>
                  <label class="radio" for="d"><input name="c_type" type="radio" value="2">重点客户</label>
                  <label class="radio" for="d"><input name="c_type" type="radio" value="3" checked="true">潜在客户</label>
                  <label class="radio" for=""><input name="c_type" type="radio" value="4">成交客户</label>
                  <label class="radio" for=""><input name="c_type" type="radio" value="5">无意向客户</label>
                  <label class="radio" for=""><input name="c_type" type="radio" value="6">黑名单客户</label>

                </div>
              </div>
              <div class="row">
                <div class="control-group span10">
                  <label class="control-label"><s>*</s>跟进进度：</label>
                <div class="controls">
                  <label class="radio" for="d"><input name="result" type="radio" value="1">成交</label>
                  <label class="radio" for="d"><input name="result" type="radio" value="2" checked="true">待定</label>
                  <label class="radio" for="d"><input name="result" type="radio" value="3" >无效</label>

                </div>
                </div>
                <div class="control-group span10">
                  <label class="control-label">回访方式：</label>
                  <div class="controls bui-form-field-plain" >
                    <select name="v_type" id="v_type">
                      
                      <option value="1" selected="true">电话</option>
                      <option value="2">上门</option>
                      <option value="3">邮件</option>
                      <option value="4">QQ</option>
                      <option value="5">短信</option>
                      <option value="6">微信</option>
                      <option value="7">其他</option>

                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="control-group span10">
                  <label class="control-label">联系人：</label>
                  <div class="controls">
                      <input name="contacts" type="text" id="contacts" value="" class="control-text" />
                  </div>
                </div>
                <div class="control-group12 span10">
                  <label class="control-label">号码：</label>
                  <div class="controls">
                      <input name="v_value" type="text" value="" class="control-text" id="v_value">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="control-group span10">
                  <label class="control-label">回访时间：</label>
                  <div class="controls">
                  <input type="text" class="calendar" name="v_time" id="v_time" value="<?=date("Y-m-d")?>">

                  </div>
                </div>
                <div class="control-group12 span10">
                  <label class="control-label">下次回访时间：</label>
                  <div class="controls">
                  <input type="text" class="calendar" name="n_v_time" id="n_v_time" value="<?=date("Y-m-d")?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="control-group">
                  <label class="control-label">备注：</label>
                  <div class="controls  control-row-auto">
                    <textarea name="content" id="content" class="control-row4 input-large"></textarea>
                  </div>
                </div>
              </div>

              <hr/>
              
              <div class="row">
                <div class="form-actions offset3">
                <input type="hidden" name="id" id="id" value="<?=$customer['id']?>" />
                  <button type="button" class="button button-primary" onclick="add_visit_log();">保存</button>
                  <button type="reset" class="button" onclick="history.back();">返回</button>
                </div>
              </div>
         
            </form>

          </div>
<hr/>
          <div class="detail-section">  
            
            <div class="detail-row">
              <table cellspacing="0" class="table table-head-bordered">
                <thead>
                <tr>
                  <th>回访时间</th>
                  <th>客户类型</th>
                  <th>回访方式</th>
                  <th>联系人</th>
                  <th>跟进结果</th>
                  <th>下次回访时间</th>
                  <th>摘要</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach($v_log as $logk => $logv){
                ?>
                <tr>
                  <td><?=date("Y-m-d H:i",$logv['v_time'])?></td>
                  <td><?=c_type($logv['c_type'])?></td>
                  <td><?=v_type($logv['v_type'])?></td>
                  <td><?=$logv['contacts']?></td>
                  <td><?=v_result($logv['result'])?></td>
                  <td><?=date("Y-m-d H:i",$logv['n_v_time'])?></td>
                  <td><?=$logv['content']?></td>
                </tr>
                <?php
                  }
                ?>
                </tbody>
              </table>            
            </div>
          </div>


        </div>

      </div>   
    <!-- script end -->
  </div>


      <!-- 表单页 添加联系人================================================== --> 
    <!-- 此节点内部的内容会在弹出框内显示,默认隐藏此节点-->
    <div id="contacts-content" class="hidden" style="display: none">
      <form id="form" class="form-horizontal">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>姓名：</label>
            <div class="controls">
              <input type="text" class="input-normal control-text" name="realname" id="realname">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">性别：</label>
            <div class="controls">
               
                  <label class="radio" for="d"><input name="sex" type="radio" value="男" checked="true">男</label>
                  <label class="radio" for="d"><input name="sex" type="radio" value="女" >女</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">生日：</label>
            <div class="controls">
              <input class="calendar" type="text" name="birthday" id="birthday">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="control-group span15">
            <label class="control-label"><s>*</s>工作电话：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="tel" id="tel">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="control-group span15">
            <label class="control-label"><s>*</s>手机：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="phone" id="phone">
            </div>
          </div>
        </div>
          <div class="row">
          <div class="control-group span15">
            <label class="control-label"><s>*</s>职位：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="job" id="job">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">email：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="email" id="email">
            </div>
          </div>
        </div>
                <div class="row">
          <div class="control-group span15">
            <label class="control-label">QQ：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="qq" id="qq">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="control-group span15">
            <label class="control-label">微信：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="webchat" id="webchat">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">备注：</label>
            <div class="controls control-row4">
              <input type="hidden" name="company_id" id="company_id" value="<?=$customer['id']?>" />
              <textarea class="input-large" type="text" name="remarks" id="remarks"></textarea>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div id="contacts-content2" class="hidden" style="display: none">
      <form id="form" class="form-horizontal">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label">姓名：</label>
            <div class="controls">
              <input type="text" class="input-normal control-text" name="realname" id="realname2">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">性别：</label>
            <div class="controls">
               
                  <label class="radio" for="d"><input name="sex2" type="radio" value="男" checked="true">男</label>
                  <label class="radio" for="d"><input name="sex2" type="radio" value="女" >女</label>
            </div>
          </div>
        </div>
      <div class="row">
          <div class="control-group span15">
            <label class="control-label">生日：</label>
            <div class="controls">
              <input class="calendar" type="text" name="birthday2" id="birthday2">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="control-group span15">
            <label class="control-label">工作电话：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="tel" id="tel2">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="control-group span15">
            <label class="control-label">手机：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="phone" id="phone2">
            </div>
          </div>
        </div>
          <div class="row">
          <div class="control-group span15">
            <label class="control-label">职位：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="job" id="job2">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">email：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="email" id="email2">
            </div>
          </div>
        </div>
                <div class="row">
          <div class="control-group span15">
            <label class="control-label">QQ：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="qq" id="qq2">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="control-group span15">
            <label class="control-label">微信：</label>
            <div class="controls">
              <input class="input-normal control-text" type="text" name="webchat" id="webchat2">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">备注：</label>
            <div class="controls control-row4">
              <input type="hidden" name="id2" id="id2" value="" />
              <textarea class="input-large" type="text" name="remarks" id="remarks2"></textarea>
            </div>
          </div>
        </div>
      </form>
    </div>

<script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>
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
        BUI.use(['bui/overlay','bui/form'],function(Overlay,Form){
    
      var form = new Form.HForm({
        srcNode : '#form'
      }).render();
 
      var dialog = new Overlay.Dialog({
            title:'添加联系人',
            width:500,
            height:320,
            //配置DOM容器的编号
            contentId:'contacts-content',
            success:function () {

              add_contacts();
              this.close();
            }
          });
       // dialog.show();
        $('#btnShow').on('click',function () {
          dialog.show();
        });

        var dialog2 = new Overlay.Dialog({
            title:'编辑联系人',
            width:500,
            height:320,
            //配置DOM容器的编号
            contentId:'contacts-content2',
            success:function () {            
              update_contacts('update');
              this.close();
            }
          });
       // dialog.show();
       
        $('#showbtn a').on('click',function () {
          //alert($(this).attr('rel'));
          var id = $(this).attr('rel');
          var aj = $.ajax( {
              url:'<?=base_url()?>crm/listvisit/update_contacts',
              data:{
                  
                  id : id,
                  act : 'edit'
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.code);
                if(data.code == '0'){

                    $("#realname2").val(data.data.realname);
                    $("#tel2").val(data.data.tel);
                    $("#phone2").val(data.data.phone);
                    $("#email2").val(data.data.email);
                    $("#qq2").val(data.data.qq);
                    $("#webchat2").val(data.data.webchat);
                    $("#remarks2").val(data.data.remarks);
                    $("#job2").val(data.data.job); 
                    $("#id2").val(data.data.id);
                    $("#birthday2").val(data.data.birthday);
                     dialog2.show();                
                }else{
                  alert(data.msg);
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
         
        });
        


        
      });

    </script>
<!-- script end -->
<script>

function pop()
{
    //页面层
  layer.open({
    type: 1,
    title : '添加联系人',
    skin: 'layui-layer-rim', //加上边框
    area: ['520px', '640px'], //宽高
    content: $("#pop").html()
  });
}

function add_contacts()
{
  var realname = $("#realname").val();
  var tel = $("#tel").val();
  var phone = $("#phone").val();
  var email = $("#email").val();
  var qq = $("#qq").val();
  var webchat = $("#webchat").val();
  var remarks = $("#remarks").val();
  var job = $("#job").val();
  var company_id = $("#company_id").val();
  var sex = $("input[name='sex']:checked").val();
  var birthday = $("#birthday").val();

  var aj = $.ajax( {
              url:'<?=base_url()?>crm/listvisit/add_contacts',
              data:{
                  
                  realname : realname,
                  tel : tel,
                  phone : phone,
                  email : email,
                  qq : qq,
                  webchat : webchat,
                  remarks : remarks,
                  job : job,
                  company_id : company_id,
                  remarks : remarks,
                  sex : sex,
                  birthday : birthday
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                
                if(data.code == '0'){
                 
                  $("#tbody").append("<tr id=\"contact_"+data.data+"\"><td>"+realname+"</td><td>"+job+"</td><td>"+sex+"</td><td>"+tel+"</td><td>"+tel+"</td><td>"+email+"</td><td>"+birthday+"</td><td>"+remarks+"</td><td><button class=\"button button-small button-warning\" onclick=\"huifang('"+realname+"','"+phone+"');\" id=\"btnShow2\" value=\"8\">回访</button> <a href=''><button class=\"button button-small button-warning\">编辑</button></a>  <a href=\"javascript:void();\" onclick=\"del_contact('"+data.data+"')\"><button class=\"button button-small button-danger\">删除</button></a></td></tr>");
                   $("#realname").val('');
                   $("#tel").val('');
                   $("#phone").val('');
                   $("#email").val('');
                   $("#qq").val('');
                   $("#webchat").val('');
                   $("#remarks").val('');
                   $("#job").val('');
                   $("#birthday").val('');
                }else{
                  alert(data.msg);
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });

}

function edit_contacts(id,act)
{
  var aj = $.ajax( {
              url:'<?=base_url()?>crm/listvisit/update_contacts',
              data:{
                  
                  id : id,
                  act : act
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
               
                if(data.code == '0'){
                    alert(data.birthday);
                    $("#realname2").val(data.realname);
                    $("#tel2").val(data.tel);
                    $("#phone2").val(data.phone);
                    $("#email2").val(data.email);
                    $("#qq2").val(data.qq);
                    $("#webchat2").val(data.webchat);
                    $("#remarks2").val(data.remarks);
                    $("#job2").val(data.job);
                    $("#birthday2").val(data.birthday); 

                }else{
                  alert(data.msg);
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
}

//更新联系人
function update_contacts(act)
{
  var realname = $("#realname2").val();
  var tel = $("#tel2").val();
  var phone = $("#phone2").val();
  var email = $("#email2").val();
  var qq = $("#qq2").val();
  var webchat = $("#webchat2").val();
  var remarks = $("#remarks2").val();
  var job = $("#job2").val();
  var company_id = $("#company_id").val();
  var sex = $("input[name='sex2']:checked").val();
  var id = $("#id2").val();
  var birthday = $("#birthday2").val();

  var aj = $.ajax( {
              url:'<?=base_url()?>crm/listvisit/update_contacts',
              data:{
                  
                  realname : realname,
                  tel : tel,
                  phone : phone,
                  email : email,
                  qq : qq,
                  webchat : webchat,
                  remarks : remarks,
                  job : job,
                  company_id : company_id,
                  remarks : remarks,
                  sex : sex,
                  act : act,
                  id : id,
                  birthday : birthday
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                
                if(data.code == '0'){
                 layer.msg('修改成功');
                 location.reload();
                }else{
                  
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });

}



//添加回访记录
function add_visit_log()
{
  var c_type = $("input[name='c_type']:checked").val();
  var v_type = $("#v_type").val();
  var v_value = $("#v_value").val();
  var result = $("input[name='result']:checked").val();
  var v_time = $("#v_time").val();
  var n_v_time = $("#n_v_time").val();
  var content = $("#content").val();
  var contacts = $("#contacts").val();
  var company_id = $("#id").val();

  if(contacts == ''){

    $("#contacts-err").remove();
        $("#contacts").after('<span class="x-field-error" id="contacts-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写联系人</label></span>');
        return false;

  }else{

      $("#contacts-err").remove();

  }

  if(v_value == ''){
    
    $("#v_value-err").remove();
        $("#v_value").after('<span class="x-field-error" id="v_value-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写联系方式</label></span>');
        return false;
  }else{
      $("#v_value-err").remove();
  }

    if(content == ''){
    
    $("#content-err").remove();
        $("#content").after('<span class="x-field-error" id="content-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写回访内容</label></span>');
        return false;
  }else{
      $("#content-err").remove();
  }

  
  var aj = $.ajax( {
              url:'<?=base_url()?>crm/listvisit/add_visit',
              data:{
                  
                  c_type : c_type,
                  v_type : v_type,
                  v_value : v_value,
                  result : result,               
                  v_time : v_time,
                  n_v_time : n_v_time,
                  contacts : contacts,
                  content : content,
                  company_id : company_id
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.code);
                if(data.code == '0'){
                  
                  location.reload();
                }else{
                  alert(data.msg);
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
}

function del_contact(id){
  layer.confirm('确定删除联系人吗?', {
    btn: ['确定','取消'] //按钮
  }, function(){
     _del_contact(id);
  }, function(){
          //window.location=url;

  });
}


function _del_contact(id)
{
  var aj = $.ajax( {
              url:'<?=base_url()?>crm/listvisit/del_contact',
              data:{
                  
                 id : id
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
               
                if(data.code == '0'){
                  
                  $("#contact_"+id).remove();

                }else{
                  alert(data.msg);
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
}

function huifang(contacts,phone)
{
  $("#contacts").val(contacts);
  $("#v_value").val(phone);
}

function do_post()
{
  var c_type = $("#c_type").val();
  
}
</script>
    </body>
    </html>         