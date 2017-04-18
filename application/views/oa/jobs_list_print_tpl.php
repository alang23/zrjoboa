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
        <table cellspacing="0">
          <thead>
            <tr>
	            <th colspan="15">
	                <ul class="bui-bar bui-grid-button-bar" role="toolbar" id="bar7" aria-disabled="false" aria-pressed="false">
	                <li class="bui-bar-item-button bui-bar-item bui-inline-block" aria-disabled="false" id="bar-item-button1" aria-pressed="false">
	                <button type="button" class="button button-small" onclick="window.location='<?=base_url()?>jobs/do_prints?jobs_name=<?=$jobs_name?>'">
	                <i class="icon-plus"></i>确认打印</button>
	                </li></a>
	                </ul>
	            </th>
            </tr>

          </thead>
          <tbody>
           <tr>
            	<td colspan="4"><hr/></td>
            </tr>
          <?php
          	foreach($list as $k => $v){
          ?>
          	<tr>
              <td>职位:</td>
              <td ><?=$v['jobs_name']?></td>
             </tr>
            <tr>
              <td>企业名称:</td>
              <td ><?=$v['company_name']?></td>
            </tr>
            <tr>
              <td>联系人:</td>
              <td ><?=$v['contacts']?></td>
            </tr>
            <tr>
              <td>联系电话:</td>
              <td ><?=$v['tel']?></td>
            </tr>


            <tr>
            	<td colspan="4"><hr/></td>
            </tr>
          <?php
          		}
          ?>

          </tbody>
        </table>

    </body>
    </html>       