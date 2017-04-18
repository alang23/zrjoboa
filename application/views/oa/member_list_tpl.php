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
        <form class="form-panel" method="get" action="<?=base_url()?>member/index">
          <div class="panel-title">
            <span>
              <label>姓名：</label><input type="text" name="realname" value="<?=$realname?>" class="input-large control-text bui-form-field" /> 
              <label>联系方式：</label><input type="text" name="phone" value="<?=$phone?>" class="input-large control-text bui-form-field" /> 
              <label>求职意向：</label><input type="text" name="intention" value="<?=$intention?>" class="input-large control-text bui-form-field" /> 
              <label>人才类型：</label>
              <select name="person_type">
              <option value="-" <?php if($person_type == '-'){ ?> selected <?php } ?> >=全部=</option>

              <option value="0" <?php if($person_type == '0'){ ?> selected <?php } ?> >普通人才</option>
              <option value="1" <?php if($person_type == '1'){ ?> selected <?php } ?> >高级人才</option>

              </select> 
              <label>客户代表：</label>
              <select name="uid">
                <option value="-">=全部=</option>
                <?php
                    foreach($account as $ak => $av){
                ?>
                <option value="<?=$av['id']?>" <?php if($uid == $av['id']){ ?> selected <?php } ?>><?=$av['realname']?></option>
                <?php
                  }
                ?>
              </select> 
              <button id="btnSearch" type="submit" class="button button-primary">搜索</button>
            
           </span>
          </div>
          <ul class="panel-content">


          </ul>
        </form>
        <p> 
        <div class="tips tips-small tips-info tips-no-icon">
          <div class="tips-content">
            数据统计:   <?=$count?>
          </div>
        </div>
      </p>
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
              <th>出生日期</th>
              <th>电话</th>
              <th>现居住地</th>
              <th>籍贯</th>
              <th>求职意向</th>
              <th>人才类型</th>
               <th>录入人</th>
              <th>添加时间</th>
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
              <td><?=$v['birthday']?></td>
              <td><?=$v['phone']?></td>
              <td><?=$v['province_name']?>-<?=$v['city_name']?></td>
              <td><?=$v['household']?></td>
              <td><?=$v['intention']?></td>
              <td><?=person_type($v['person_type'])?></td>
              <td><?php if(empty($v['u_name'])){ echo '系统'; }else{ echo $v['u_name'];}?></td>
               <td><?=date("Y-m-d H:i:s",$v['addtime'])?></td>
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