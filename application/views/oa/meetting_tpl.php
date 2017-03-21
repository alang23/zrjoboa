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
        <form class="form-panel" method="get" action="<?=base_url()?>meetting/index">
          <div class="panel-title">
            <span>
              <label>会议主题：</label><input type="text" name="c_name" value="" class="input-large control-text bui-form-field" /> 
              <label>主持者：</label>

              
              <label>参会人员：</label><input type="text" name="contacts" value="" class="input-large control-text bui-form-field" /> 
              <label>电话：</label><input type="text" name="phone" value="" class="input-large control-text bui-form-field" /> 
              <button id="btnSearch" type="submit" class="button button-primary">搜索</button>
              <label><a href="<?=base_url()?>meetting/index">全部</a></label>

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
                <a href="<?=base_url()?>meetting/add">
                <li class="bui-bar-item-button bui-bar-item bui-inline-block" aria-disabled="false" id="bar-item-button1" aria-pressed="false">
                <button type="button" class="button button-small">
                <i class="icon-plus"></i>添加会议记录</button>
                </li></a>
                </ul>
            </th>
            </tr>

            <tr>
              <th width="15"></th>
              <th>级别</th>
              <th>会议主题</th>
              <th>时间</th>
              <th>主持者</th>
              <th>参加人员</th>
              <th>地点</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list as $k => $v){
            ?>
            <tr>
              <td><input type="checkbox"></td>
              <td ><?=meetting_level($v['m_type'])?></td>
              <td><?=$v['title']?> <a href="javascript:void(0);" onclick="show_div('<?=$v['id']?>','<?=$v['title']?>');"><span class="label label-warning">查看会议内容</span></a></td>
              <td><?=date("Y-m-d H:i:s",$v['day'])?></td>
              
              <td><?=$v['presenter']?></td>
              <td><?=$v['members']?></td>
              <td><?=$v['address']?></td>
              <td>
             <a href="<?=base_url()?>meetting/edit?id=<?=$v['id']?>">编辑</a> |
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>meetting/del?id=<?=$v['id']?>')">删除</a>
            
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
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
    <script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    
    <script>
    function show_div(id,title)
    {
        layer.open({
              type: 2,
              title: title,
              shadeClose: true,
              shade: false,
              maxmin: true, //开启最大化最小化按钮
                  area: ['893px', '600px'],
                  content: '<?=base_url()?>meetting/detail?id='+id
        });

    }
    </script>
    </html>       