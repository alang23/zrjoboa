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
          <h2>客户基本信息</h2>
          <hr>        
            <div class="row detail-row">
              <div class="span6">
                <label>企业性质：</label><span class="detail-text"></span>   
              </div>
              <div class="span6">
                <label>行业类型：</label><span class="detail-text"></span>
              </div>
              <div class="span6">
                <label>企业规模：</label><span class="detail-text"></span>
              </div>
            </div>    

            <div class="row detail-row">
              <div class="span6">
                <label>地区：</label><span class="detail-text">浙江省金华市</span>
              </div>
              <div class="span6">
                <label>详细地址：</label><span class="detail-text">杭州中法国际</span>
              </div>
            </div> 

            <div class="row detail-row">
              <div class="span6">
                <label>备注:</label><span class="detail-text">浙江省金华市</span>
              </div>
            </div>    
 
        </div>
      </div> 
      <hr/>
      <div class="detail-section">  
        <h3>审核记录</h3>
        <hr>
        <div class="detail-row">
          <table cellspacing="0" class="table table-head-bordered">
            <thead>
            <tr>
              <th>审核类型</th>
              <th>审核意见</th>
              <th>审核时间</th>
              <th>审核人</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>小二回复</td>
              <td>系统审核通过</td>
              <td>2012-01-01 12:01:01</td>
              <td>李斯</td>
            </tr>
            <tr>
              <td>小二回复</td>
              <td>系统审核通过</td>
              <td>2012-01-01 12:01:01</td>
              <td>李斯</td>
            </tr>
            <tr>
              <td>小二回复</td>
              <td>系统审核通过</td>
              <td>2012-01-01 12:01:01</td>
              <td>李斯</td>
            </tr>
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
                      <input name="household" type="text" value="v_value" class="control-text" >
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

<script>
function do_post()
{
  var c_type = $("#c_type").val();
  
}
</script>
    </body>
    </html>         