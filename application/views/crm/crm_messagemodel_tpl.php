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
      <div class="detail-section">  
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
              <th>#</th>
            </tr>
            </thead>
            <tbody id="tbody">
        
            <tr >
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <div id="showbtn">
            <a href="javascript:void(0);" rel=""><button class="button button-small button-warning" id="btnShow2" value="">编辑</button></a> 
              <a href="javascript:void(0);" ><button class="button button-small button-danger">删除</button></a>
              </div>
              </td>
            </tr>
           
            </tbody>
          </table>            
        </div>
      </div>    


      </div>   
    <!-- script end -->
  </div>



    </body>
    </html>         