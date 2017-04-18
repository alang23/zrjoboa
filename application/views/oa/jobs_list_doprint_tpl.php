    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>打印职位</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
   
    <link href="<?=base_url()?>static/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>static/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>static/layer/layer.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      doPrint1();
     
    });

    var printPage = function () {
      //$("#billa").jqprint();
      // window.print();
    }

    var doPrint1 = function () {
      jsPrintSetup.setPrinter("EPSON LQ-630K ESC/P2");

      jsPrintSetup.setOption('marginTop', 0);
      jsPrintSetup.setOption('marginBottom', 0);
      jsPrintSetup.setOption('marginLeft', 0);
      jsPrintSetup.setOption('marginRight', 0);
      // set page header
      jsPrintSetup.setOption('headerStrLeft', '');
      jsPrintSetup.setOption('headerStrCenter', '');
      jsPrintSetup.setOption('headerStrRight', '');
      // set empty page footer
      jsPrintSetup.setOption('footerStrLeft', '');
      jsPrintSetup.setOption('footerStrCenter', '');
      jsPrintSetup.setOption('footerStrRight', '');

      jsPrintSetup.setSilentPrint(1);
      jsPrintSetup.print();
    }

    $(document).keydown(function (e) {
      // ESCAPE key pressed
      if (e.keyCode == 27) {
        window.close();
      }
    });
  </script>
    </head>
    <body>
        <table cellspacing="0">
          <thead>
            <tr>
	            <th colspan="4">
	          
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
            <tr>
              
              <td colspan="4">以上信息由众人人力提供,http://www.jjrzzr.com</td>
            </tr>
          </tbody>
        </table>

    </body>
    </html>       