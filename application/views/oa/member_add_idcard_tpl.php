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
    <div class="doc-content">
      <ul class="breadcrumb">
          <li>
            <a href="#">首页</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">求职者管理</a> <span class="divider">/</span>
          </li>
          <li class="active">添加求职者</li>
        </ul>
    </div>
   <!-- <table cellspacing="0" class="table table-bordered">
          <thead>
            <th>
                <input id="Button1" type="button" value="测试" onclick="test()" class="button button-primary"/>
                <input id="Button11" type="button" value="修改数据1" onclick="changData1()" class="button button-primary"/>
                <input id="Button12" type="button" value="修改数据2" onclick="changData2()" class="button button-primary"/>
                <input id="Button23" type="button" value="测试重复" onclick="checkCardNo()" class="button button-primary"/>
                <input id="Button33" type="button" value="清除数据" onclick="MyClearData()" class="button button-primary"/>
                </ul>
            </th>
            </tr>
          </thead>
    </table>-->

    <form id="J_Form" name="form1" class="form-horizontal" method="post" action="<?=base_url()?>member/add_idcard">
    <div style="position: absolute; right: 50px; margin-bottom: 10px; top: 80px;">
    
<!--
<OBJECT Name="GT2ICROCX" width="120" height="126" CLASSID="CLSID:220C3AD1-5E9D-4B06-870F-E34662E2DFEA" CODEBASE="IdrOcx.cab#version=1,0,1,2"></OBJECT>
-->
   
       <OBJECT Name="GT2ICROCX" id="GT2ICROCX" width="102" height="126" CLASSID="CLSID:220C3AD1-5E9D-4B06-870F-E34662E2DFEA" CODEBASE="CAB/IdrOcx.cab#version=1,0,1,3"></OBJECT>  
       
    
        <br />
        <input type="button" value="读卡" onclick="StartRead();">
        <input type="button" value="打印" onclick="print();">
        状态：<input type="text" name="Status" size="10" maxlength="10">
      </div>

      <div style="position: absolute; right: 50px; margin-top: 40px; top: 5px;">
        <input id="Button1" type="button" value="测试" onclick="test()" />
        <input id="Button11" type="button" value="修改数据1" onclick="changData1()" />
        <input id="Button12" type="button" value="修改数据2" onclick="changData2()" />
        <input id="Button23" type="button" value="测试重复" onclick="checkCardNo()" />
        <input id="Button33" type="button" value="清除数据" onclick="MyClearData()" />
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>姓名：</label>
          <div class="controls">
            <input name="txtw_name" type="text" id="txtw_name" class="control-text" />

          </div>
        </div>



        <div class="control-group span14">
          <label class="control-label"><s>*</s>手机号：</label>
          <div class="controls">
          <input name="phone" type="text" id="phone"  onblur="check_phone();"/>
          </div>
        </div>





      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">目前所在地：</label>
          <div class="controls">
            <select class="input-small" name="province" id="province" onchange="get_city(this.value);">
              <option value="0:无">=省=</option>
              <?php
                foreach($province as $k => $v){
              ?>
              <option value="<?=$v['id']?>:<?=$v['categoryname']?>"><?=$v['categoryname']?></option>
              <?php
                }
              ?>
            </select>
          
            <select class="input-small" name="city" id="city">
              <option value="0:无">=市=</option>
              
            </select>
          </div>
        </div>
        <div class="control-group12 span8">
          <label class="control-label">人才类型：</label>
          <div class="controls">
  <input id="person_type" type="radio" name="person_type" value="0" checked="checked" /><label for="person_type_1">普通人才</label></td><td><input id="person_type" type="radio" name="person_type" value="1" /><label for="txtw_sex_1">高级人才</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>性别：</label>
          <div class="controls">
              <input id="txtw_sex_0" type="radio" name="txtw_sex" value="1" checked="checked" /><label for="txtw_sex_0">男</label></td><td><input id="txtw_sex_1" type="radio" name="txtw_sex" value="2" /><label for="txtw_sex_1">女</label>
          </div>
        </div>
        <div class="control-group12 span8">
          <label class="control-label"><s>*</s>出生日期：</label>
          <div class="controls">
          <input name="txtw_birthday" type="text" id="txtw_birthday"  class="calendar" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label">民族：</label>
          <div class="controls">
          <input name="txtw_nationl" type="text" id="txtw_nationl"  />
          </div>
        </div>
        <div class="control-group12 span8">
          <label class="control-label"><s>*</s>薪资要求：</label>
          <div class="controls">
            <select name="wage">
                <option value="0:无">==无==</option>
                <?php
                 foreach($wage as $wk =>$wv){
                ?>
                   <option value="<?=$wv['c_id']?>:<?=$wv['c_name']?>" <?php if($wv['c_id']=='59'){ ?> selected <?php } ?>><?=$wv['c_name']?></option>
                <?php
                  }
                ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>身份证：</label>
          <div class="controls">
          <input name="txtw_card_number" type="text" id="txtw_card_number"  />
          <!--<input id="Button3" type="button" value="生成编码" />-->

          </div>
        </div>
        <!--
        -->
        <div class="control-group span10">
          <label class="control-label"><s>*</s>学历：</label>
          <div class="controls">
            <select name="education">
                <option value="0:无">==无==</option>
                <?php
                 foreach($education as $ek =>$ev){
                ?>
                   <option value="<?=$ev['c_id']?>:<?=$ev['c_name']?>" <?php if($ev['c_id']=='66'){ ?> selected <?php } ?>><?=$ev['c_name']?></option>
                <?php
                  }
                ?>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="control-group span8">
          <label class="control-label">籍贯：</label>
          <div class="controls bui-form-field-plain" >
          <input name="txtw_native_place" type="text" id="txtw_native_place" />
          </div>
        </div>
        <div class="control-group span10">
          <label class="control-label"><s>*</s>工作经验：</label>
          <div class="controls">
            <select name="experience">
                <option value="0:无">==无==</option>
                <?php
                 foreach($experience as $eek =>$eev){
                ?>
                   <option value="<?=$eev['c_id']?>:<?=$eev['c_name']?>" <?php if($eev['c_id']=='77'){ ?> selected <?php } ?>><?=$eev['c_name']?></option>
                <?php
                  }
                ?>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="control-group span8">
          <label class="control-label"><s>*</s>求职意向：</label>
          <div class="controls">
            <input name="intention" type="text" >
          </div>
        </div>
      </div>

      <hr/>
      
      <div class="row">
        <div class="form-actions offset3">
          <button type="button" class="button button-primary" onclick="do_post();">保存</button>
          <button type="reset" class="button" onclick="history.back();">返回</button>
        </div>
      </div>
 
    </form>
    
 
<script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>  
<!-- script start --> 
    <script type="text/javascript">
        BUI.use('bui/calendar',function(Calendar){
          var datepicker = new Calendar.DatePicker({
            trigger:'.calendar',
            autoRender : true
          });
        });
    </script>
<!-- script start --> 
<script type="text/javascript">
function get_city(id)
{

    
    var aj = $.ajax( {
              url:'<?=base_url()?>member/get_city_select',
              data:{
                  
                  id : id
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
               
               if(data.code == 0){

                    $("#city").html(data.data);

               }else{
                
                  alert('error');

               }

              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
          
} 
 

 function check_phone()
{

  var phone = '';
  phone = $("#phone").val();

  if(phone == ''){
    $("#phone-err").remove();
      $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">手机号不能为空</label></span>');
      return false;
  }else{

        var aj = $.ajax( {
              url:'<?=base_url()?>member/check_phone',
              data:{                 
                  phone : phone                 
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.code);
                if(data.code != 0){
                  $("#phone-err").remove();
                  $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">'+data.msg+'</label></span>');
                  return false;
                }else{
                  $("#phone-err").remove();
                  return true;
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
      $("#phone-err").remove();
      return true;
  }
}

function do_post()
{

  var phone = '';
  phone = $("#phone").val();

  if(phone == ''){
    $("#phone-err").remove();
      $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">手机号不能为空</label></span>');
      return false;
  }else{

        var aj = $.ajax( {
              url:'<?=base_url()?>member/check_phone',
              data:{                 
                  phone : phone                 
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.code);
                if(data.code != 0){
                  $("#phone-err").remove();
                  $("#phone").after('<span class="x-field-error" id="phone-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">'+data.msg+'</label></span>');
                  return false;
                }else{
                  $("#phone-err").remove();
                  //return true;
                  document.form1.submit();
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
      $("#phone-err").remove();
      return true;
  }
}
      
</script>
  <script type="text/javascript" language="JavaScript">
    $(document).ready(function () {

      $('#Button3').click(function () {
        var Num = "";
        for (var i = 0; i < 6; i++) {
          Num += Math.floor(Math.random() * 10);
        }
        var value = new Date();
        $('#txtw_card_number').val(Num + value.getMilliseconds() + value.getMinutes() + value.getHours() + value.getDate());
      });

      StartRead();

      //$('#txtw_professional_like').focus();
      //initdate();
      $('#txtw_card_number').blur(function () {
        //alert('ddd');
        checkCardNo();
      });

    });

    var cardData = {
      Name: "",
      NameL: "",
      Sex: "",
      SexL: "",
      Nation: "",
      NationL: "",
      Born: "",
      BornL: "",
      Address: "",
      CardNo: "",
      Police: "",
      Activity: "",
      ActivityLFrom: "",
      ActivityLTo: "",
      Photo: ""
    }

    function MyGetData() {
      cardData.Name = GT2ICROCX.Name;
      cardData.NameL = GT2ICROCX.NameL;
      cardData.Sex = GT2ICROCX.Sex;
      cardData.SexL = GT2ICROCX.SexL;
      cardData.Nation = GT2ICROCX.Nation;
      cardData.NationL = GT2ICROCX.NationL;
      cardData.Born = GT2ICROCX.Born;
      cardData.BornL = GT2ICROCX.BornL;
      cardData.Address = GT2ICROCX.Address;
      cardData.CardNo = GT2ICROCX.CardNo;
      cardData.Police = GT2ICROCX.Police;
      cardData.Activity = GT2ICROCX.Activity;
      cardData.ActivityLFrom = GT2ICROCX.ActivityLFrom;
      cardData.ActivityLTo = GT2ICROCX.ActivityLTo;
      cardData.Photo = GT2ICROCX.GetPhotoBuffer();
    }

    function MyClearData() {
      //ClearData
      //clearData();
    }

    function clearData() {
      $('#txtw_name').val('');
      $('#txtw_birthday').val('');
      $('#txtw_card_number').val('');
      $('#txtw_native_place').val('');
      $('#txtw_professional_like').val('');
      $('#txtw_professional_title').val('');
      $('#txtw_nationl').val('');
      $('#txtw_like').val('');
      $('#txtw_home_page').val('');
      $('#txtw_remark').val('');
    }

    function MyGetErrMsg() {
      Status.value = GT2ICROCX.ErrMsg;
    }

    function StartRead() {
      //alert(GT2ICROCX);
      //GT2ICROCX.PhotoPath = "c:";
      GT2ICROCX.Start();
    }

    function print() {
      //0 双面，1 正面，2 反面
      GT2ICROCX.PrintFaceImage(0, 30, 10);
    }

    function getCardData() {
      $('#txtw_name').val(cardData.NameL);
      if (cardData.Sex == 1) {
        $("input:radio[value='0']").attr('checked', 'true');
      } else {
        $("input:radio[value='1']").attr('checked', 'true');
      }
      $('#txtw_nationl').val(cardData.NationL);
      $('#txtw_birthday').val(cardData.BornL.replace(/年/i, '-').replace(/月/i, '-').replace(/日/i, ''));
      $('#txtw_native_place').val(cardData.Address);
      $('#txtw_card_number').val(cardData.CardNo);
    }

    function initdate() {
      cardData.NameL = 'TestName';
      cardData.BornL = '2017年6月6日';
      cardData.Sex = 1;
      cardData.NationL = '汉';
      cardData.Address = '湖南描述';
      cardData.CardNo = '431228198911151446';
    }

    function test() {
      getCardData();
      checkCardNo();
    }

    function changData1() {
      cardData.NameL = '习大大';
      cardData.Sex = 0;
    }
    function changData2() {
      cardData.NameL = '道法自然';
      cardData.Sex = 1;
    }

    function checkCardNo() {
      worker_search();
    }

    function worker_search() {
      if (cardData.CardNo != null && cardData.CardNo.length > 0) {
        $.ajax({
          url: "/zrjob/RegPerson/CheckCardNo.aspx",
          type: "post",
          dataType: "text",
          data: {
            'cardNo': cardData.CardNo
          },
          success: function (data) {
            if (data == "0") {
              //alert('无此求职者!');
              $('#msg').html('<h1 style="color:Blue">【' + cardData.NameL + '】 无此求职者，请登记！</h1>');
              $('#txtw_professional_like').focus();
            } else {
              var url = "/zrjob/RegPerson/EditResumeCRM.aspx?cardNo=" + data;
              $('#msg').html('<h1 style="color:Red">【' + cardData.NameL + '】 已经有此求职者，<a href="' + url + '">查看修改</a></h1>');
              //window.location.href = "/zrjob/RegPerson/EditResumeCRM.aspx?cardNo=" + data;
            }
          }
        });
      }
    }

    $(document).keydown(function (e) {
      //alert(e.keyCode);

      // F2 key pressed
      if (e.keyCode == 113) {
      }

      // Enter key pressed
      if (e.keyCode == 13) {
        $('#btnAddResume').focus();
        $('#btnAddResume').click();
      }

      // ESCAPE key pressed
      if (e.keyCode == 27) {
        clearData();
      }
    });

  </script>
  <script type="text/javascript" language="javascript" for="GT2ICROCX" event="GetData">
    MyGetData(); 
    getCardData();
    checkCardNo();
  </script>
  <script type="text/javascript" language="javascript" for="GT2ICROCX" event="GetErrMsg">
    MyGetErrMsg();  
  </script>
  <script type="text/javascript" language="javascript" for="GT2ICROCX" event="ClearData">
    MyClearData();
  </script>
<!-- script end -->
  </div>
</body>

    </body>
    </html>

