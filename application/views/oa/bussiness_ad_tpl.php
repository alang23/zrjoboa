    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>简单表单页</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
   
    <link href="<?=base_url()?>static/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>static/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>static/layer/layer.js"></script>
  <script>
function flush(msg,url){
  layer.confirm(msg, {
    btn: ['确定','取消'] //按钮
  }, function(){
      //window.location=url;
      window.location=url;
      //alert(url);
  }, function(){
          //window.location=url;

  });
}
  </script>
    </head>
    <body>
  <div class="container">
    
<!-- 简单搜索页 ================================================== -->
    <div class="row">
      <div class="doc-content">
        <ul class="breadcrumb">
          <li>
            <a href="#">首页</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">业务管理</a> <span class="divider">/</span>
          </li>
          <li class="active">广告视图</li>
        </ul>
        <form class="form-panel" method="get" action="<?=base_url()?>bussiness/ad">
          <div class="panel-title">
            <span>
              <label>参展日期：</label><input type="text" class="calendar" name="start_time" value="<?=$start_time?>"/> <label>至</label> <input type="text" class="calendar" name="end_time" value="<?=$end_time?>" />
            </span>
            <span>
              <label>客户代表：</label>
                <select name="uid">

                  <option value="0">客户代表</option>
                <?php
                    foreach($account as $ak => $av){
                ?>
                <option value="<?=$av['id']?>" <?php if($uid == $av['id']){ ?> selected <?php } ?>><?=$av['realname']?></option>
                <?php
                  }
                ?>
                </select>
              </span>

            <span>
              <label>是否会员：</label>
                <select name="is_member">
                  <option>是否会员</option>
                </select>
              </span>

            <span>
              <label>出票：</label>
                <select name="s_ticket">
                  <option value="-">出票情况</option>
                  <option value="0">未出票</option>
                  <option value="1">已出票</option>
                </select>
              </span>

            <span>
              <label>到期：</label>
                <select name="">
                  <option>是否到期</option>
                </select>
              </span>
          </div>
          <ul class="panel-content">
            <li>
            <span>
              <label>公司名称：</label>
              <input name="c_name" type="text" value="<?=$c_name?>" />

              </span>

            </li>
            
            <li>
            
              <button type="submit" class="button button-primary">查询>></button>
            </li>
          </ul>
        </form>
       <p> 
        <div class="tips tips-small tips-info tips-no-icon">
          <div class="tips-content">
            业务统计:   应收金额: <?=$y_amount?>      实收金额:  <?=$s_amount?>
            <br/>
            <font color="red">财务数据:   应收金额: <?=$y_amount?>      实收金额:  <?=$s_amount?>   </font> 
          </div>
        </div>
      </p>
        <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr><th colspan="20">
        
            </th>
            </tr>

            <tr>
              <th>ID</th>
              <th>企业名称</th>
              <th>客户代表</th>
              <th>参展日期</th>
              <th>广告类型</th>
              <th>应收</th>
              <th>实收</th>
              <th>出票</th>
              <th>缴费</th>
              <th>是否作废</th>
              <th>扣税</th>
              <th>资料上传</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list as $k => $v){
            ?>
            <tr>
              <td ><?=$v['id']?></td>
              <td><a href="<?=base_url()?>bussiness/ad_detail?id=<?=$v['id']?>"><?=$v['c_name']?></a> </td>
              <td><?=$v['realname']?></td>
              <td><?=date("Y-m-d",$v['show_time'])?></td>
              <td><?=$v['ad_type_name']?></td>
              <td><?=$v['y_amount']?></td>
              <td><?=$v['s_amount']?></td>
              <td>出票</td>
              <td><?=payment_status($v['payment'])?></td>
              <td><?=bussiness_status($v['status'])?></td>
              <td><?=get_invoice($v['invoice'])?></td>
              <td><?=is_upload($v['is_upload'])?></td>
              <td>
              <a href="<?=base_url()?>bussiness/edit_ad?id=<?=$v['id']?>"><button class="button button-small button-warning">编辑</button></a> 
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>bussiness/del_ad?id=<?=$v['id']?>')"><button class="button button-small button-danger">删除</button></a> 
              <button onclick="whowfrm('<?=base_url()?>uploadfile/index?id=<?=$v['id']?>&bussiness_id=<?=$v['bussiness_id']?>&type_id=2');" class="button button-small button-success">上传管理</button>
              <?php
                  if(!empty($v['is_finish'])){
              ?>
              <button onclick="window.location='<?=base_url()?>bussiness/scene_detail?id=<?=$v['id']?>'" class="button button-small button-success">海报预览</button>
              <?php
                }
              ?>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <div>

          <div class="pagination pull-right">
            <ul>

              <?=$page?>
            </ul>
          </div>
        </div>
      </div>
    </div> 
<!-- script end -->
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

        function whowfrm(url)
        {
          window.open (url,'newwindow','height=600,width=800,top=0,left=0,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')
        }
    </script>
<!-- script end -->
    </body>
    </html>       