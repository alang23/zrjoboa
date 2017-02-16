    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>简单表单页</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
     
      <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
      <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
     
    </head>
    <body>
  <div class="container">
     
    <!-- 简单详情页 ================================================== -->
        <div class="doc-content">
          <ul class="breadcrumb">
            <li>
              <a href="#">首页</a> <span class="divider">/</span>
            </li>
            <li>
              <a href="#">商家管理</a> <span class="divider">/</span>
            </li>
            <li class="active">价格规则列表</li>
          </ul>

          <div class="detail-section">  

          <h3>客户详情</h3>
          <hr>
          <form action="" class="form-horizontal form-horizontal-simple">
            <div class="control-group">
              <label class="control-label">企业名称：</label>
              <div class="controls">
              <span class="control-text"><?=$info['c_name']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">客户代表：</label>
              <div class="controls">
              <span class="control-text"><?=$info['realname']?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">企业性质：</label>
              <div class="controls">
              <span class="control-text"><?=$info['nature_cn']?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">所属行业：</label>
              <div class="controls">
              <span class="control-text"><?=$info['industry_cn']?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">企业规模：</label>
              <div class="controls">
              <span class="control-text"><?=$info['scale_cn']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">联系人：</label>
              <div class="controls">
              <span class="control-text"><?=$info['contacts']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">联系电话：</label>
              <div class="controls">
              <span class="control-text"><?=$info['tel']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">添加时间</label>
              <div class="controls">
              <span class="control-text"><?=date("Y-m-d",$info['addtime'])?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">备注：</label>
              <div class="controls">
              <span class="control-text"><?=$info['remarks']?></span>
              </div>
            </div>



            <div class="actions-bar">
              <div class="row form-actions ">
                <div class="span10 offset3 ">
                   <a href="<?=base_url()?>customer/edit?id=<?=$info['id']?>"><button class="button button-large button-warning">编辑</button></a>
                    <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>customer/del?id=<?=$info['id']?>')"><button class="button button-large button-danger">删除</button></a>
                </div>
              </div>
            </div>
          </form>
        </div>
          
    <!-- script end -->
      </div>
    </body>
    </html>         