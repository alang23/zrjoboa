<!DOCTYPE HTML>
<html>
 <head>
  <title> BUI 管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="<?=base_url()?>static/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>static/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="<?=base_url()?>static/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
        <a href="http://www.builive.com" title="文档库地址" target="_blank"><!-- 仅仅为了提供文档的快速入口，项目中请删除链接 -->
          <span class="lp-title-port">众人人力</span><span class="dl-title-text"></span>
        </a>
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?=$userinfo['realname']?>(<?=$userinfo['works']?>)</span><a href="<?=base_url()?>login/logout" title="退出系统" class="dl-log-quit">[退出]</a><a href="http://http://www.builive.com/" title="文档库" class="dl-log-quit">文档库</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">办公应用</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-order">CRM</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-inventory">系统设置</div></li>
        <!--<li class="nav-item"><div class="nav-item-inner nav-supplier">详情页</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-marketing">图表</div></li>-->
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>static/assets/js/bui.js"></script>
  <script type="text/javascript" src="<?=base_url()?>static/assets/js/config.js"></script>

  <script>
    BUI.use('common/main',function(){
      var config = [{
          id:'menu', 
          homePage : 'members',
          menu:[{
              text:'业务管理',
              items:[
                {id:'main',text:'客户列表',href:'<?=base_url()?>customer',closeable : false},
                {id:'members',text:'添加客户',href:'<?=base_url()?>customer/add'},
                {id:'add_bussiness',text:'办理业务',href:'<?=base_url()?>bussiness/index'},
                {id:'second-menu',text:'现场视图',href:'<?=base_url()?>bussiness/scene'},
                {id:'dyna-menu',text:'广告视图',href:'<?=base_url()?>bussiness/ad'}
              ]
            },{
              text:'财务管理',
              items:[
                {id:'operation',text:'现场视图',href:'<?=base_url()?>finance/scene'},
                {id:'quick',text:'广告视图',href:'<?=base_url()?>finance/ad'}  
              ]
            },{
              text:'会员录入',
              items:[
                {id:'resource',text:'会员列表',href:'main/resource.html'},
                {id:'loader',text:'现场招聘',href:'main/loader.html'}  
              ]
            }]
          },{
            id:'form',
            menu:[{
                text:'表单页面',
                items:[
                  {id:'code',text:'表单代码',href:'form/code.html'},
                  {id:'example',text:'表单示例',href:'form/example.html'},
                  {id:'introduce',text:'表单简介',href:'form/introduce.html'},
                  {id:'valid',text:'表单基本验证',href:'form/basicValid.html'},
                  {id:'advalid',text:'表单复杂验证',href:'form/advalid.html'},
                  {id:'remote',text:'远程调用',href:'form/remote.html'},
                  {id:'group',text:'表单分组',href:'form/group.html'},
                  {id:'depends',text:'表单联动',href:'form/depends.html'}
                ]
              },{
                text:'成功失败页面',
                items:[
                  {id:'success',text:'成功页面',href:'form/success.html'},
                  {id:'fail',text:'失败页面',href:'form/fail.html'}
                
                ]
              },{
                text:'可编辑表格',
                items:[
                  {id:'grid',text:'可编辑表格',href:'form/grid.html'},
                  {id:'form-grid',text:'表单中的可编辑表格',href:'form/form-grid.html'},
                  {id:'dialog-grid',text:'使用弹出框',href:'form/dialog-grid.html'},
                  {id:'form-dialog-grid',text:'表单中使用弹出框',href:'form/form-dialog-grid.html'}
                ]
              }]
          },{
            id:'search',
            homePage : 'company',
            menu:[{
                text:'账号管理',
                items:[
                  {id:'company',text:'企业列表',href:'<?=base_url()?>company'},
                  {id:'example',text:'账号列表',href:'<?=base_url()?>account'},
                  {id:'example-dialog',text:'搜索页面编辑示例',href:'search/example-dialog.html'},
                  {id:'introduce',text:'搜索页面简介',href:'search/introduce.html'}, 
                  {id:'config',text:'搜索配置',href:'search/config.html'}
                ]
              },{
                text : '系统设置',
                items : [
                  {id : 'setting_ad',text : '广告位管理',href : '<?=base_url()?>ad_type/index'},
                  {id : 'setting_noid',text : '展位管理',href : '<?=base_url()?>exhibition/index'},
                  {id : 'setting_email',text : '邮件设置',href : '<?=base_url()?>setting/email'},
                  {id : 'setting_print',text : '打印机设置',href : '<?=base_url()?>setting/prints'}
                ]
              }]
          },{
            id:'detail',
            menu:[{
                text:'详情页面',
                items:[
                  {id:'code',text:'详情页面代码',href:'detail/code.html'},
                  {id:'example',text:'详情页面示例',href:'detail/example.html'},
                  {id:'introduce',text:'详情页面简介',href:'detail/introduce.html'}
                ]
              }]
          },{
            id : 'chart',
            menu : [{
              text : '图表',
              items:[
                  {id:'code',text:'引入代码',href:'chart/code.html'},
                  {id:'line',text:'折线图',href:'chart/line.html'},
                  {id:'area',text:'区域图',href:'chart/area.html'},
                  {id:'column',text:'柱状图',href:'chart/column.html'},
                  {id:'pie',text:'饼图',href:'chart/pie.html'}, 
                  {id:'radar',text:'雷达图',href:'chart/radar.html'}
              ]
            }]
          }];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>
