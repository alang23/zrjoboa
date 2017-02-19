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
            <a class="active">客户列表</a>
          </li>
        </ul>
        <form class="form-panel" method="get" action="<?=base_url()?>customer/index">
          <div class="panel-title">
            <span>
              <label>公司名称：</label><input type="text" name="c_name" value="<?=$c_name?>" class="input-large control-text bui-form-field" /> 
              <label>客户代表：</label>
                <select name="uid">
                    <option value="">客户代表</option>

                <?php
                    foreach($account as $_ak => $_av){
                ?>
                    <option value="<?=$_av['id']?>" <?php if($_av['id'] == $uid){ ?> selected <?php } ?>><?=$_av['realname']?></option>

                <?php
                  }
                ?>

                </select>
              
              <label>联系人：</label><input type="text" name="contacts" value="<?=$contacts?>" class="input-large control-text bui-form-field" /> 
              <label>电话：</label><input type="text" name="phone" value="<?=$phone?>" class="input-large control-text bui-form-field" /> 
              <button id="btnSearch" type="submit" class="button button-primary">搜索</button>
              <label><a href="<?=base_url()?>customer/index">全部</a></label>

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
              <th>客户代表</th>
              <th>企业联系人</th>
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
              <td><?=$v['c_name']?> <a href="<?=base_url()?>customer/detail?id=<?=$v['id']?>"><span class="label label-info">查看</span></a></td>
              <td><?=$v['realname']?></td>
              <td><?=$v['contacts']?></td>
              <td><?=$v['tel']?></td>

              <td>
              <a href="<?=base_url()?>bussiness/index?type=ex&bussiness_id=<?=$v['id']?>"><button class="button button-small button-success">办理业务</button></a>
              <a href="<?=base_url()?>jobs/add?id=<?=$v['id']?>"><button class="button button-small button-info" >职位管理</button></a>
            
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