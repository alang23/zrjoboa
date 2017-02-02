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
            <a href="#">账号管理</a> <span class="divider">/</span>
          </li>
          <li class="active">企业列表</li>
        </ul>
        <form class="form-panel" method="get" action="<?=base_url()?>company/index">
          <div class="panel-title">
            <span>
              <label>公司名称：</label><input type="text" name="name" value="<?=$name?>" class="input-large control-text bui-form-field" /> 
              <label>联系人：</label><input type="text" name="contacts" value="<?=$contacts?>" class="input-large control-text bui-form-field" /> 
              <label>电话：</label><input type="text" name="phone" value="<?=$phone?>" class="input-large control-text bui-form-field" /> 

              <button id="btnSearch" type="submit" class="button button-primary">搜索</button>
            
           </span>
          </div>
          <ul class="panel-content">


          </ul>
        </form>

        <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr>
            <th colspan="15">
                <ul class="bui-bar bui-grid-button-bar" role="toolbar" id="bar7" aria-disabled="false" aria-pressed="false">
                <a href="<?=base_url()?>company/add">
                <li class="bui-bar-item-button bui-bar-item bui-inline-block" aria-disabled="false" id="bar-item-button1" aria-pressed="false">
                <button type="button" class="button button-small">
                <i class="icon-plus"></i>添加企业</button>
                </li></a>
                </ul>
            </th>
            </tr>

            <tr>
              <th width="15"></th>
              <th>ID</th>
              <th>企业名称</th>
              <th>地址</th>
              <th>联系人</th>
              <th>联系电话</th>

              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list as $k => $v){
            ?>
            <tr>
              <td><input type="checkbox"></td>
              <td ><?=$v['id']?></td>
              <td><?=$v['name']?></td>
              <td><?=$v['address']?></td>
              <td><?=$v['contacts']?></td>
              <td><?=$v['phone']?></td>
              <td>
              <a href="<?=base_url()?>company/edit?id=<?=$v['id']?>">编辑</a> |
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>company/del?id=<?=$v['id']?>')">删除</a> |
              <a href="<?=base_url()?>account/index?company_id=<?=$v['id']?>">账号列表</a>

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
    </body>
    </html>       