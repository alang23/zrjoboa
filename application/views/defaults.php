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
          homePage : 'main',
          //collapsed:true, //默认左侧菜单收缩
          menu:[{
              text:'业务管理',
              items:[
               {id:'main',text:'我的桌面',href:'<?=base_url()?>main',closeable : false},
                {id:'customer',text:'客户列表',href:'<?=base_url()?>customer'},
                {id:'customer_add',text:'添加客户',href:'<?=base_url()?>customer/add'},
                {id:'add_bussiness',text:'办理业务',href:'<?=base_url()?>bussiness/index'},
                {id:'second-menu',text:'现场视图',href:'<?=base_url()?>bussiness/scene'},
                {id:'dyna-menu',text:'广告视图',href:'<?=base_url()?>bussiness/ad'},
                {id:'dyna-menu-onther',text:'其它业务视图',href:'<?=base_url()?>bussiness/onther'},

                {id:'meal-view',text:'餐票视图',href:'<?=base_url()?>mealview/index'},
               {id:'dyna-jobs',text:'职位列表',href:'<?=base_url()?>jobs/index'}
              ]
            },{
              text:'财务管理',
              items:[
                {id:'operation',text:'现场视图',href:'<?=base_url()?>finance/scene'},
                {id:'quick',text:'广告视图',href:'<?=base_url()?>finance/ad'}  
              ]
            },{
              text:'广告管理',
              items:[
                {id:'quick',text:'现场制作视图',href:'<?=base_url()?>advert/scene'},
                {id:'operation',text:'广告制作视图',href:'<?=base_url()?>advert/ad'}
              ]
            }
            ,{
              text:'求职者管理',
              items:[
                {id:'member',text:'求职者列表',href:'member/index'},
                {id:'website_member',text:'网站求职者',href:'member/website'},
                {id:'add_member',text:'求职者登记',href:'member/add_info'},
                {id:'add_member_idcard',text:'求职者登记id',href:'member/add_idcard'},
                {id:'print_jobs',text:'求职打印',href:'<?=base_url()?>advert/scene'}  
 
              ]
            },{
              text:'会议管理',
              items:[
                {id:'meetting',text:'会议列表',href:'meetting/index'},
                {id:'meetting_add',text:'添加会议',href:'meetting/index'}  
              ]
            }]
          },
          {
            id:'form',
            menu:[{
                text:'客户关系管理',
                items:[
                  {id:'code',text:'回访客户列表',href:'<?=base_url()?>crm/listvisit'},
                  {id:'visity_day',text:'今日回访客户',href:'<?=base_url()?>crm/listvisit/theday'}
                  /*
                  {id:'example',text:'表单示例',href:'form/example.html'},
                  {id:'introduce',text:'表单简介',href:'form/introduce.html'},
                  {id:'valid',text:'表单基本验证',href:'form/basicValid.html'},
                  {id:'advalid',text:'表单复杂验证',href:'form/advalid.html'},
                  {id:'remote',text:'远程调用',href:'form/remote.html'},
                  {id:'group',text:'表单分组',href:'form/group.html'},
                  {id:'depends',text:'表单联动',href:'form/depends.html'}
                  */
                ]
              },{
                text:'营销',
                items:[
                  {id:'duanxin',text:'短信管理',href:'<?=base_url()?>crm/message'},
                   {id:'duanxin_model',text:'短信模板',href:'<?=base_url()?>crm/message/msmmodel'}
                  //{id:'fail',text:'失败页面',href:'form/fail.html'}
                
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
                  {id:'add_access',text:'添加账户',href:'<?=base_url()?>account/add'},
                  {id:'log_login',text:'登陆日志',href:'<?=base_url()?>login_log/index'},
                  /*{id:'example-dialog',text:'搜索页面编辑示例',href:'search/example-dialog.html'},
                  {id:'introduce',text:'搜索页面简介',href:'search/introduce.html'}, 
                  {id:'config',text:'搜索配置',href:'search/config.html'}*/
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
