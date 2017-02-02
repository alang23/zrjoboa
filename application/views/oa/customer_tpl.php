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
            <a href="#">业务管理</a> <span class="divider">/</span>
          </li>
          <li>
            <a class="active">商家列表</a>
          </li>
        </ul>
        <form class="form-panel" action="post">
          <div class="panel-title">
            <span>
              <label>报名日期：</label><input type="text" class="calendar" /> <label>至</label> <input type="text" class="calendar" />
            </span>
            <span>
              <label>上阶段审核日期：</label><input type="text" class="calendar" /> <label>至</label> <input type="text" class="calendar" />
            </span>
          </div>
          <ul class="panel-content">
            <li>
              <select name="">
                <option>省份</option>
              </select>
              <select name="">
                <option>城市</option>
              </select>
              <select name="">
                <option>商品类型</option>
              </select>
              <select name="">
                <option>平台类型</option>
              </select>
              <select name="">
                <option>是否在商品池</option>
              </select>
              <select name="">
                <option>是否看样子</option>
              </select>
              <select name="">
                <option>是否已审核</option>
              </select>
            </li>
            
            <li>
            
              <button type="submit" class="button button-primary">查询>></button>
            </li>
          </ul>
        </form>
        <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr>
            <th colspan="15">
                <ul class="bui-bar bui-grid-button-bar" role="toolbar" id="bar7" aria-disabled="false" aria-pressed="false">
                <a href="<?=base_url()?>customer/add">
                <li class="bui-bar-item-button bui-bar-item bui-inline-block" aria-disabled="false" id="bar-item-button1" aria-pressed="false">
                <button type="button" class="button button-small">
                <i class="icon-plus"></i>添加客户</button>
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
              <th>状态</th>

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
              <td><?=$v['c_name']?> <a href="<?=base_url()?>customer/detail?id=<?=$v['id']?>">查看</a></td>
              <td><?=$v['address']?></td>
              <td><?=$v['contacts']?></td>
              <td><?=$v['tel']?></td>
              <td><?=customer_status($v['status'])?></td>

              <td>
              <a href="<?=base_url()?>company/edit?id=<?=$v['id']?>">编辑</a> |
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>company/del?id=<?=$v['id']?>')">删除</a> |
              <a href="<?=base_url()?>bussiness/index?type=ex&bussiness_id=<?=$v['id']?>">办理业务</a>

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