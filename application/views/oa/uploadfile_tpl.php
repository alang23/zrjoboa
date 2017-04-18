    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>文件</title>
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
            <a href="#">文件上传</a> <span class="divider">/</span>
          </li>
          <li>
            <a class="active">列表</a>
          </li>
        </ul>

        <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr>
            <th colspan="15">
                源文件
            </th>
            </tr>

            <tr>
              <th>ID</th>
              <th>文件</th>
              <th>提交时间</th>
              <th>查看</th>
              <th>类型</th>

              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list as $k => $v){
            ?>
            <tr>
              <td ><?=$v['id']?></td>
              <td><?=$v['file']?></td>
  
              <td><?=date("Y-m-d H:i:s")?></td>
              <td>
              <?php
                if($type_id == '1'){
              ?>
              <a href="javascript::" onclick="whowfrm('<?=base_url()?>uploads/ex/<?=$v['file']?>')">查看</a>
              <?php
                }else{
              ?>
              <a href="javascript::" onclick="whowfrm('<?=base_url()?>uploads/ad/<?=$v['file']?>')">查看</a>

              <?php
                }
              ?>
              </td>
              <td></td>
              <td>
              <a href="javascript:void(0);" onclick="del('<?=$v['id']?>')"><button class="button button-small button-danger">删除</button></a>

              </td>
            </tr>
            <?php
              }
            ?>
          <form id="J_Form" name="form1" method="post" action="<?=base_url()?>uploadfile/do_upload" class="form-horizontal" enctype="multipart/form-data">

            <tr>
              <td>文件上传:</td>
              <td colspan="7"><input type="file" name="userfile"><input type="submit" value="上传"></td>
             
              <input type="hidden" name="bussiness_id" value="<?=$bussiness_id?>" />
              <input type="hidden" name="bid" value="<?=$id?>" />
              <input type="hidden" name="type_id" value="<?=$type_id?>" />
              <input type="hidden" name="role" value="<?=$role?>" />

            </tr>
            </form>
          </tbody>
        </table>
        <p/>
                <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr>
            <th colspan="15">
                制作结果
            </th>
            </tr>

            <tr>
              <th>ID</th>
              <th>文件</th>
              <th>提交时间</th>
              <th>查看</th>
              <th>类型</th>

              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list2 as $k2 => $v2){
            ?>
            <tr>
              <td ><?=$v2['id']?></td>
              <td><?=$v2['file']?></td>
  
              <td><?=date("Y-m-d H:i:s")?></td>
              <td>
              <?php
                  if($type_id == '1'){
              ?>
              <a href="javascript::" onclick="whowfrm('<?=base_url()?>uploads/ex/<?=$v2['file']?>')">查看</a>
              <?php
                }else{
              ?>
              <a href="javascript::" onclick="whowfrm('<?=base_url()?>uploads/ad/<?=$v2['file']?>')">查看</a>
              <?php
                }
              ?>
              </td>
              <td></td>
              <td>
              <a href="javascript:void(0);" onclick="del_result('<?=$v2['id']?>')"><button class="button button-small button-danger">删除</button></a>

              </td>
            </tr>
            <?php
              }
            ?>
          <form id="J_Form" name="form2" method="post" action="<?=base_url()?>uploadfile/do_upload_result" class="form-horizontal" enctype="multipart/form-data">

            <tr>
              <td>文件上传:</td>
              <td colspan="7"><input type="file" name="userfile"><input type="submit" value="上传"></td>
             
              <input type="hidden" name="bussiness_id" value="<?=$bussiness_id?>" />
              <input type="hidden" name="bid" value="<?=$id?>" />
              <input type="hidden" name="type_id" value="<?=$type_id?>" />

            </tr>
            </form>
          </tbody>
        </table>
        <div>

          <div class="pagination pull-right">
            <ul>

              
            </ul>
          </div>
        </div>
      </div>
    </div> 



  <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script>

  function del(id)
  {
    layer.confirm('删除后不能回复，确定删除吗?', {
      btn: ['确定','取消'] //按钮
    }, function(){

        var aj = $.ajax( {
                  url:'<?=base_url()?>uploadfile/del',
                  data:{
                      
                      id : id,
                                     
                  },
                  contentType:"application/x-www-form-urlencoded; charset=utf-8",
                  type:'post',
                  cache:false,
                  dataType:'json',
                  success:function(data){
                  //alert(data.msg);
                   if(data.code == 0){
                     location.reload();
                   }else{
                      alert(data.msg);

                   }

                  },
                  error : function() {
                      alert("请求失败，请重试");
                  }
              });

        //alert(url);
    }, function(){
            //window.location=url;

    });

  }

  function del_result(id)
  {
    layer.confirm('删除后不能回复，确定删除吗?', {
      btn: ['确定','取消'] //按钮
    }, function(){

        var aj = $.ajax( {
                  url:'<?=base_url()?>uploadfile/del_result',
                  data:{
                      
                      id : id,
                                     
                  },
                  contentType:"application/x-www-form-urlencoded; charset=utf-8",
                  type:'post',
                  cache:false,
                  dataType:'json',
                  success:function(data){
                  //alert(data.msg);
                   if(data.code == 0){
                     location.reload();
                   }else{
                      alert(data.msg);

                   }

                  },
                  error : function() {
                      alert("请求失败，请重试");
                  }
              });

        //alert(url);
    }, function(){
            //window.location=url;

    });

  }
          function whowfrm(url)
        {
          window.open (url,'newwindow','height=600,width=800,top=0,left=0,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')
        }
</script>
<!-- script end -->
  </div>
    </body>
    </html>       