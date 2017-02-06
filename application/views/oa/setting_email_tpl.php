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
          <div class="span24">
            <h2></h2>
            <hr>
            <form id="J_Form" class="form-horizontal" method="post" action="#">
              <h3>邮箱设置：</h3>
     
                <div class="control-group">
                  <label class="control-label">SMTP服务器地址：</label>
                  <div class="controls">
                    <input type="text" name="" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">SMTP服务账号：</label>
                  <div class="controls">
                    <input type="text" name="" value="">                   
                  </div>
                </div>
     
                <div class="control-group">
                  <label class="control-label">SMTP服务密码：</label>
                  <div class="controls">
                    <input type="text" name="" value="">                   
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">发信人邮件地址：</label>
                  <div class="controls">
                    <input type="text" name="" value="">                   
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">SMTP 端口：</label>    
                  <div class="controls">
                    <input type="text" name="" value="25">                   
                  </div>

                </div>     
                <hr>
                <div class="form-actions span5 offset3">
                  <button id="btnSearch" type="submit" class="button button-primary">提交</button>
                </div>
            </form> 
          </div>
        </div>      <!-- script end -->
      </div>
    </body>
    </html>    