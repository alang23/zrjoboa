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
              <th>备注</th>
            </tr>
            </thead>
            <tbody>
          <?php
            foreach($contacts as $ck => $cv){

          ?>
            <tr>
              <td><?=$cv['realname']?></td>
              <td><?=$cv['job']?></td>
              <td><?=$cv['sex']?></td>
              <td><?=$cv['tel']?></td>
              <td><?=$cv['phone']?></td>
              <td><?=$cv['email']?></td>
              <td><?=$cv['remarks']?></td>
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
            <h3>面板标题</h3>
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
                  <label class="radio" for="d"><input name="result" type="radio" value="1-成交">成交</label>
                  <label class="radio" for="d"><input name="result" type="radio" value="2-待定" checked="true">待定</label>
                  <label class="radio" for="d"><input name="result" type="radio" value="3-无效" >无效</label>

                </div>
                </div>
                <div class="control-group span10">
                  <label class="control-label">回访方式：</label>
                  <div class="controls bui-form-field-plain" >
                    <select name="v_type">
                      
                      <option value="1-电话" selected="true">电话</option>
                      <option value="2-上门">上门</option>
                      <option value="3-邮件">邮件</option>
                      <option value="4-QQ">QQ</option>
                      <option value="5-短信">短信</option>
                      <option value="6-微信">微信</option>
                      <option value="7-其他">其他</option>

                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="control-group span10">
                  <label class="control-label">联系人：</label>
                  <div class="controls">
                      <input name="household" type="text" name="contacts" value="" class="control-text" />
                  </div>
                </div>
                <div class="control-group12 span10">
                  <label class="control-label">号码：</label>
                  <div class="controls">
                      <input name="household" type="text" value="" class="control-text" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="control-group span10">
                  <label class="control-label">回访时间：</label>
                  <div class="controls">
                  <input type="text" class="calendar" name="v_time" id="show_time" value="<?=date("Y-m-d")?>">

                  </div>
                </div>
                <div class="control-group12 span10">
                  <label class="control-label">下次回访时间：</label>
                  <div class="controls">
                  <input type="text" class="calendar" name="n_v_time" id="show_time" value="<?=date("Y-m-d")?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="control-group">
                  <label class="control-label">备注：</label>
                  <div class="controls  control-row-auto">
                    <textarea name="remarks" id="remarks" class="control-row4 input-large"></textarea>
                  </div>
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

          </div>
<hr/>
          <div class="detail-section">  
            
            <div class="detail-row">
              <table cellspacing="0" class="table table-head-bordered">
                <thead>
                <tr>
                  <th>回访时间</th>
                  <th>回访方式</th>
                  <th>联系人</th>
                  <th>跟进结果</th>
                  <th>下次回访时间</th>
                  <th>摘要</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>2012-01-01 12:01:01</td>
                  <td>电话</td>
                  <td>李斯</td>
                  <td>成交</td>
                  <td>2012-01-01</td>
                  <td>法师打发斯蒂芬按发送到发送到阿萨德法师打发斯蒂芬阿萨德法师打发斯蒂芬</td>
                </tr>
                </tbody>
              </table>            
            </div>
          </div>


        </div>

      </div>   
    <!-- script end -->
  </div>


      <!-- 表单页 ================================================== --> 
    <!-- 此节点内部的内容会在弹出框内显示,默认隐藏此节点-->
    <div id="content" class="hidden">
      <form id="form" class="form-horizontal">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label">姓名：</label>
            <div class="controls">
              <input type="text" class="input-normal control-text" name="realname" id="realname">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">性别：</label>
            <div class="controls">
             
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">工作电话：</label>
            <div class="controls">
              <input class="input-small control-text" type="text" name="tel" id="tel">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="control-group span15">
            <label class="control-label">手机：</label>
            <div class="controls">
              <input class="input-small control-text" type="text" name="phone" id="phone">
            </div>
          </div>
        </div>
          <div class="row">
          <div class="control-group span15">
            <label class="control-label">职位：</label>
            <div class="controls">
              <input class="input-small control-text" type="text" name="job" id="job">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">职位：</label>
            <div class="controls">
              <input class="input-small control-text" type="text" name="job" id="job">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">备注：</label>
            <div class="controls control-row4">
              <textarea class="input-large" type="text" name="remarks" id="remarks"></textarea>
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
            title:'配置DOM',
            width:500,
            height:320,
            //配置DOM容器的编号
            contentId:'content',
            success:function () {
              //alert('确认');
              var realname = $("#realname").val();
              alert(realname);
              this.close();
            }
          });
       // dialog.show();
        $('#btnShow').on('click',function () {
          dialog.show();
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
  var name = $("#realname").val();
  var tel = $("#tel").val();
  var phone = $("#phone").val();
  var email = $("#email").val();
  var qq = $("#qq").val();
  var webchat = $("#webchat").val();
  var remarks = $("#remarks").val();
  var job = $("#job").val();
  var company_id = $("#company_id").val();
  var sex = $("#sex").val();
  alert(realname);
  return ;
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
                  company_id : company_id
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                alert(data.msg);
                if(data.code != 0){
                  
                }else{
                 
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });

}


function do_post()
{
  var c_type = $("#c_type").val();
  
}
</script>
    </body>
    </html>         