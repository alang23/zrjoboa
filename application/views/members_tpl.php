<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="http://www.51cnb.xin/static/home/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="http://www.51cnb.xin/static/home/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="http://www.51cnb.xin/static/home/Css/style.css" />
    <script type="text/javascript" src="http://www.51cnb.xin/static/home/Js/jquery.js"></script>
    <script type="text/javascript" src="http://www.51cnb.xin/static/home/Js/bootstrap.js"></script>
    <script type="text/javascript" src="http://www.51cnb.xin/static/home/Js/ckform.js"></script>
    <script type="text/javascript" src="http://www.51cnb.xin/static/home/Js/common.js"></script>
  <script src="http://www.51cnb.xin/static/home/Js/artDialog/artDialog.js?skin=green"></script>    

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<script>
function flush(msg,url){
  art.dialog(
    msg, 
    function () {
      
      window.location = url;
    },
    function(){
      
    }
  );
}



</script>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <a href="http://www.51cnb.xin/zhongxin.php/home/products/add">
        <button type="button" class="btn btn-default navbar-btn" >添加</button>
        </a>      </ul>
      <form class="navbar-form navbar-left" role="search" action="#">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="button" class="btn btn-default">Submit</button>
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th>ID</th>    
         <th >标题
         <select name="month" onchange="changem(this.value);">
            <option value="12"  selected  >12月</option>
            <option value="01"  >1月</option>
            <option value="02"  >2月</option>
          </select>
         </th>
         <th >缩略图</th>
         <th >所需印花数</th>
         <th >数量</th>
         <th >剩余</th>
         <th >排序</th>
        <th>管理操作</th>
    </tr>
    </thead>

      <tr>
        <td valign="middle">14</td>     
         <td valign="middle">RIMOWA拉杆箱(<a href="http://www.51cnb.xin/zhongxin.php/home/pic/index?pid=14">图片</a>)</td>
          <td valign="middle"><img src="http://www.51cnb.xin/uploads/products/20161125191356.jpg" width="80px" height="80px"/></td>
           <td valign="middle">30</td>
          <td valign="middle">30</td>
           <td valign="middle">0</td>
       <td valign="middle">0</td>  
        <td>
          
    <a href="http://www.51cnb.xin/zhongxin.php/home/products/update?id=14">编辑</a> | 
    <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','http://www.51cnb.xin/zhongxin.php/home/products/del?id=14')">删除</a> 
    
    </td>
    </tr>

      <tr>
        <td valign="middle">13</td>     
         <td valign="middle">象印电饭煲（进口）(<a href="http://www.51cnb.xin/zhongxin.php/home/pic/index?pid=13">图片</a>)</td>
          <td valign="middle"><img src="http://www.51cnb.xin/uploads/products/20161125191316.jpg" width="80px" height="80px"/></td>
           <td valign="middle">16</td>
          <td valign="middle">1000</td>
           <td valign="middle">0</td>
       <td valign="middle">1</td>  
        <td>
          
    <a href="http://www.51cnb.xin/zhongxin.php/home/products/update?id=13">编辑</a> | 
    <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','http://www.51cnb.xin/zhongxin.php/home/products/del?id=13')">删除</a> 
    
    </td>
    </tr>

      <tr>
        <td valign="middle">12</td>     
         <td valign="middle">飞利浦电动牙刷(<a href="http://www.51cnb.xin/zhongxin.php/home/pic/index?pid=12">图片</a>)</td>
          <td valign="middle"><img src="http://www.51cnb.xin/uploads/products/20161125191225.jpg" width="80px" height="80px"/></td>
           <td valign="middle">12</td>
          <td valign="middle">3000</td>
           <td valign="middle">0</td>
       <td valign="middle">2</td>  
        <td>
          
    <a href="http://www.51cnb.xin/zhongxin.php/home/products/update?id=12">编辑</a> | 
    <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','http://www.51cnb.xin/zhongxin.php/home/products/del?id=12')">删除</a> 
    
    </td>
    </tr>

      <tr>
        <td valign="middle">11</td>     
         <td valign="middle">小米充电宝(<a href="http://www.51cnb.xin/zhongxin.php/home/pic/index?pid=11">图片</a>)</td>
          <td valign="middle"><img src="http://www.51cnb.xin/uploads/products/20161125191117.jpg" width="80px" height="80px"/></td>
           <td valign="middle">10</td>
          <td valign="middle">10000</td>
           <td valign="middle">0</td>
       <td valign="middle">3</td>  
        <td>
          
    <a href="http://www.51cnb.xin/zhongxin.php/home/products/update?id=11">编辑</a> | 
    <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','http://www.51cnb.xin/zhongxin.php/home/products/del?id=11')">删除</a> 
    
    </td>
    </tr>

      <tr>
        <td valign="middle">10</td>     
         <td valign="middle">爱奇艺会员黄金月卡(<a href="http://www.51cnb.xin/zhongxin.php/home/pic/index?pid=10">图片</a>)</td>
          <td valign="middle"><img src="http://www.51cnb.xin/uploads/products/20161125191039.jpg" width="80px" height="80px"/></td>
           <td valign="middle">8</td>
          <td valign="middle">7000</td>
           <td valign="middle">0</td>
       <td valign="middle">4</td>  
        <td>
          
    <a href="http://www.51cnb.xin/zhongxin.php/home/products/update?id=10">编辑</a> | 
    <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','http://www.51cnb.xin/zhongxin.php/home/products/del?id=10')">删除</a> 
    
    </td>
    </tr>

      <tr>
        <td valign="middle">9</td>     
         <td valign="middle">500MB流量包(<a href="http://www.51cnb.xin/zhongxin.php/home/pic/index?pid=9">图片</a>)</td>
          <td valign="middle"><img src="http://www.51cnb.xin/uploads/products/20161125190954.jpg" width="80px" height="80px"/></td>
           <td valign="middle">8</td>
          <td valign="middle">3000</td>
           <td valign="middle">0</td>
       <td valign="middle">5</td>  
        <td>
          
    <a href="http://www.51cnb.xin/zhongxin.php/home/products/update?id=9">编辑</a> | 
    <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','http://www.51cnb.xin/zhongxin.php/home/products/del?id=9')">删除</a> 
    
    </td>
    </tr>

      <tr>
        <td valign="middle">8</td>     
         <td valign="middle">100/70MB流量包(<a href="http://www.51cnb.xin/zhongxin.php/home/pic/index?pid=8">图片</a>)</td>
          <td valign="middle"><img src="http://www.51cnb.xin/uploads/products/20161125190911.jpg" width="80px" height="80px"/></td>
           <td valign="middle">6</td>
          <td valign="middle">20000</td>
           <td valign="middle">8474</td>
       <td valign="middle">6</td>  
        <td>
          
    <a href="http://www.51cnb.xin/zhongxin.php/home/products/update?id=8">编辑</a> | 
    <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','http://www.51cnb.xin/zhongxin.php/home/products/del?id=8')">删除</a> 
    
    </td>
    </tr>

    <tr>
        <td colspan="8">
        <!--<li  class="active"><a>1</a></li><li><a href="http://www.51cnb.xin/index.php/home/products/index&amp;page=2">2</a></li><li><a href="http://www.51cnb.xin/index.php/home/products/index&amp;page=2">下页</a></li> -->
          <nav>       
            <ul class="pagination">
               <li  class="active"><a>1</a></li><li><a href="http://www.51cnb.xin/index.php/home/products/index&amp;page=2">2</a></li><li><a href="http://www.51cnb.xin/index.php/home/products/index&amp;page=2">下页</a></li>            </ul>
          </nav>
        </td>
    </tr>
</table>
<script>
function changem(m)
{
  window.location.href = 'http://www.51cnb.xin/zhongxin.php/home/products/index?month='+m;
}
</script>
</body>
</html>
