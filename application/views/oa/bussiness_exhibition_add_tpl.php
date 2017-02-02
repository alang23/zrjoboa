<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单页</title>
<!-- 此文件为了显示Demo样式，项目中不需要引入 -->
 
  <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
  <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
 
</head>
<body>
  <div class="container">
    
    <!-- 表单页 ================================================== --> 
    <div class="row">
    <div class="doc-content">
      <ul class="breadcrumb">
          <li>
            <a href="#">业务管理</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">办理业务</a> <span class="divider">/</span>
          </li>
          <li class="active">现场业务</li>
        </ul>
    </div>
      <div class="span24">
      <button class="button   button-success">现场业务</button>
      <a href="<?=base_url()?>bussiness/index?type=ad"><button class="button">广告业务</button></a>       
      <hr>
      <form id="J_Form" method="post" action="<?=base_url()?>bussiness/add_ex" class="form-horizontal">
      
      <div class="control-group">
        <label class="control-label">企业：</label>
        <div class="controls  control-row-auto">
                <select name="bussiness_id" class="input-normal"> 
                <?php
                  foreach($bussiness as $bk => $bv){
                ?>
                  <option value="<?=$bv['id']?>-<?=$bv['c_name']?>" <?php if($bussiness_id == $bv['id']){?> selected <?php } ?> ><?=$bv['c_name']?></option>
                <?php
                  }
                ?>
                </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">参展时间</label>
        <div class="controls">
          <input type="text" class="calendar" name="show_time" value="">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>展位号：</label>
        <div class="controls">
                <select name="no_id" class="input-normal"> 
                <?php
                  foreach($booth as $bk => $bv){
                ?>
                  <option value="<?=$bv['id']?>-<?=$bv['booth_name']?>"  ><?=$bv['booth_name']?></option>
                <?php
                  }
                ?>
                </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否会员：</label>
            <div class="controls" >
              <input name="is_member" type="checkbox" value="1" />
            </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否缴费：</label>
        <div class="controls">
              <input name="payment" type="checkbox" value="1" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否扣税：</label>
        <div class="controls">
              <input name="invoice" type="checkbox" value="1" />
        </div>
      </div>


            <div class="control-group">
              <label class="control-label">付款方式：</label>    
              <div class="controls control-row-auto">
                <label class="radio">
                  <input type="radio" name="pay_type" value="now" checked="1">现金
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="pay_type" value="2">转账  
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="3">刷卡
                </label>
                      
              </div>
            </div>

            <div class="control-group">
        <label class="control-label">应收金额：</label>
        <div class="controls  control-row-auto">
          <input name="y_amount" type="text"  id="y_amount" class="input-large" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">实收金额：</label>
        <div class="controls  control-row-auto">
            <input name="s_amount" type="text"  id="s_amount" class="input-large" >

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">收费项目：</label>
        <div class="controls  control-row-auto">
                <select name="pay_project" class="input-normal"> 
                <?php
                  foreach($charge_type as $ckt => $ckv){
                ?>
                  <option value="<?=$ckv['id']?>"><?=$ckv['name']?></option>
                <?php
                  }
                ?>
                </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">中餐：</label>
        <div class="controls  control-row-auto">
          <input name="c_food" type="text"  id="c_food" class="input-large" >
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">西餐：</label>
        <div class="controls  control-row-auto">
            <input name="e_food" type="text"  id="e_food" class="input-large" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">联系人：</label>
        <div class="controls  control-row-auto">
            <input name="contacts" type="text"  id="contacts" class="input-large" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">联系电话：</label>
        <div class="controls  control-row-auto">
          <input name="phone" type="text"  id="phone" class="input-large">

        </div>
      </div>

            <div class="control-group">
        <label class="control-label">备注：</label>
        <div class="controls  control-row-auto">
          <textarea name="remarks" id="remarks" class="control-row4 input-large"></textarea>
        </div>
      </div>

      <div class="row actions-bar">       
          <div class="form-actions span13 offset3">
            <button type="submit" class="button button-primary">保存</button>
            <button type="reset" class="button">重置</button>
          </div>
      </div>       
    </form>
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    
<!-- script start --> 
    <script type="text/javascript">
      BUI.use('bui/form',function(Form){
      
      
      new Form.Form({
        srcNode : '#J_Form'
      }).render();
      
  });  
      
</script>

<!-- script end -->
  </div>
</body>
</html>