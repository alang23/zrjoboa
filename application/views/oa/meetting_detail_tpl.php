    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>简单表单页</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
     
      <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
      <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
    <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>

    </head>
    <body>
  <div class="container">
     
    <!-- 简单详情页 ================================================== -->
        <div class="doc-content">


          <div class="detail-section">  

          <h3>会议内容 </h3>
          <hr>
          <form class="form-horizontal form-horizontal-simple">

            <div class="control-group">
             
              <div class="controls">
              <span class="control-text"><?=$info['content']?></span>
              </div>
            </div>

 
          </form>
        </div>
          
    <!-- script end -->
      </div>
    </body>
    </html>         