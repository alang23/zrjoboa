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
            <a href="#">求职者管理</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">求职者列表</a> 
          </li>
         
        </ul>
        <form class="form-panel" method="get" action="<?=base_url()?>account/index">
          <div class="panel-title">
            <span>
              <label>搜索：</label><input type="text" name="kw" value="" class="input-large control-text bui-form-field" /> 

              <button id="btnSearch" type="submit" class="button button-primary">搜索</button>
            
           </span>
          </div>
          <ul class="panel-content">


          </ul>
        </form>
        <table cellspacing="0" class="table table-bordered">
          <thead>
            <th colspan="15">
                <ul class="bui-bar bui-grid-button-bar" role="toolbar" id="bar7" aria-disabled="false" aria-pressed="false">
                <a href="<?=base_url()?>member/add_info">
                <li class="bui-bar-item-button bui-bar-item bui-inline-block" aria-disabled="false" id="bar-item-button1" aria-pressed="false">
                <button type="button" class="button button-small">
                <i class="icon-plus"></i>添加求职者</button>
                </li></a>
                </ul>
            </th>
            </tr>
            <tr>
              <th width="30">ID</th>            
              <th>姓名</th>
              <th>性别</th>
              <th>年龄</th>
              <th>电话</th>
              <th>现居住地</th>
              <th>籍贯</th>
              <th>求职意向</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list as $k => $v){
            ?>
            <tr>
             
              <td ><?=$v['id']?></td>
              <td><a href=""><?=$v['realname']?></a></td>
              <td><?=get_gender($v['sex'])?></td>
              <td><?=$v['age']?></td>
              <td><?=$v['phone']?></td>
              <td><?=$v['province_name']?>-<?=$v['city_name']?></td>
              <td><?=$v['household']?></td>
              <td><?=$v['intention']?></td>
              <td>
              <a href="<?=base_url()?>member/edit?id=<?=$v['id']?>">编辑</a> |
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>member/del?id=<?=$v['id']?>')">删除</a>

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
            <!--
              <li class="disabled"><a href="#">« 上一页</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">下一页 »</a></li>
              -->
              <?=$page?>
            </ul>
          </div>
        </div>
      </div>
    </div> 
<!-- script end -->
  </div>

    </body>
    </html>       