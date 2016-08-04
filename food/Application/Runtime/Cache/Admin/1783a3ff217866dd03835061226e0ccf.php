<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>欢迎来到后台管理系统</title>
  <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="/food/Public/Admin/css/sui.min.css"> -->
  <link rel="stylesheet" href="/food/Public/Admin/css/common.css">

  <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>

  <!-- <script type="text/javascript" src="/food/Public/Admin/js/jquery.min.js"></script>
  <script type="text/javascript" src="/food/Public/Admin/js/sui.min.js"></script> -->

<!-- 添加导航条 -->
</head>
<body>
<div class="header">
  <div class="con-width">
    <div class="dl-title">
      欢迎来到华夏餐厅后台管理系统
      &nbsp;&nbsp;&nbsp;
      <a href="/food/index.php/Home/" style="font-size: 12px;">回到首页</a>
    </div>
    <div class="dl-log">欢迎您,
      <span class="dl-log-user"><?php echo (session('name')); ?></span>
      <a href="/food/index.php/Admin/User/logout" title="退出系统" class="dl-log-quit">[退出]</a>
      <a href="/food/index.php/Admin/User/logout" title="切换账号" class="dl-log-quit">[切换账号]</a>
    </div>
</div>
<div class="con-width dl-main-nav">
  <ul id="top-nav" class="nav-list">
      <!-- <li class="nav-item">
        <div class="nav-item-inner nav-home"><a href="/food/index.php/Admin/index.html">首页</a></div>
      </li> -->
      <li class="nav-item">
        <div class="nav-item-inner nav-system"><a href="/food/index.php/Admin/index.html">系统管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-orderseat"><a href="/food/index.php/Admin/seat.html">桌台管理</a></div>
      </li>

      <li>
        <div class="nav-item-inner nav-caipu"><a href="/food/index.php/Admin/caipu.html">菜谱管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-caipu"><a href="/food/index.php/Admin/Addcaipu.html">添加菜谱</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-tips"><a href="/food/index.php/Admin/tips.html">首页公告</a></div>
      </li>
  </ul>
</div>
</div>

<iframe id="id_iframe" name="id_iframe" style="display:none;"></iframe>
<div class="dl-con">
  <div id="" class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      添加菜品
      <div class="cutline"></div>
    </h4>
    <ul>
      <li>添加菜品</li>
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="dl-nav-bar-select nav-bar-tit">
          <span class="bar-tit">添加菜品</span>
          <span class="sub-tab-closeBtn"></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <form class="sui-form sui-validate myform form-margin" id="add-caipin">
          <table class="sui-table table-bordered">
            <tr>
              <td style="width: 100px;">请选择分类：</td>
              <td>
                请选择父分类：
                <span class="sui-dropdown dropdown-bordered select">
                    <span class="dropdown-inner">
                      <a role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
                      <input value="" name="fufenlei" type="hidden" id="addfufenlei">
                      <i class="caret"></i><span>选择分类</span></a>
                <ul role="menu" aria-labelledby="drop4" class="sui-dropdown-menu">
                  <?php if(is_array($fudata)): foreach($fudata as $key=>$fudata): ?><li role="presentation" data-id="<?php echo ($fudata["id"]); ?>" class="fuselect">
                      <a role="menuitem" tabindex="-1" href="javascript:void(0);" value="<?php echo ($fudata["name"]); ?>"><?php echo ($fudata["name"]); ?></a>
                    </li><?php endforeach; endif; ?>
                </ul>
                </span>
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 请选择子分类：
                <span class="sui-dropdown dropdown-bordered select">
                    <span class="dropdown-inner">
                      <a role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
                      <input value="" name="zifenlei" type="hidden" id="addzifenlei">
                      <i class="caret"></i><span>选择子分类</span></a>
                <ul role="menu" aria-labelledby="drop4" class="sui-dropdown-menu" id="selectzifenlei">
                </ul>
                </span>
                </span>
              </td>
            </tr>
            <tr>
              <td style="width: 100px;">菜品名：</td>
              <td>
                <input type="text" class="input-xxlarge input-fat" placeholder="请填写菜品名：" data-rules="required" name="name">
              </td>
            </tr>
            <tr>
              <td style="width: 100px;">菜品标题：</td>
              <td>
                <input type="text" class="input-xxlarge input-fat" placeholder="请填写菜品标题" data-rules="required" name="title">
              </td>
            </tr>
            <tr>
              <td style="width: 100px;">菜品价格</td>
              <td>
                <input type="text" class="input-xxlarge input-fat" placeholder="请填写菜品价格" data-rules="required" name="newprice">
              </td>
            </tr>
            <tr>
              <td style="width: 100px;">菜品口味：</td>
              <td>
                <input type="text" class="input-xxlarge input-fat" placeholder="请填写菜品口味" name="kouwei">
              </td>
            </tr>
            <tr>
              <td style="width: 100px;">菜品烹饪时间：</td>
              <td>
                <input type="text" class="input-xxlarge input-fat" placeholder="请填写烹饪时间" name="prtime">
              </td>
            </tr>
            <tr>
              <td style="width: 100px;">菜品主料：</td>
              <td>
                <input type="text" class="input-xxlarge input-fat" placeholder="请填写菜品主料" name="zhuliao">
              </td>
            </tr>
            <tr>
              <td style="width: 100px;">菜品功效：</td>
              <td>
                <input type="text" class="input-xxlarge input-fat" placeholder="请填写菜品主料" name="gongxiao">
              </td>
            </tr>
            <tr>
              <td style="width: 100px;">菜品简介：</td>
              <td>
                <textarea name="desc" rows="8" cols="140">

                </textarea>
              </td>
            </tr>

            <tr>
              <td style="width: 100px;">菜品图片：</td>
              <td>
                <ul class="sui-row-fluid">
                  <li class="span2" style="margin-right:20px;">
                    菜谱列表小图
                    <div class="img-round">
                      <img src="" alt="" id="pic1">
                    </div>
                  </li>
                  <li class="span2">
                    菜谱详情大图
                    <div class="img-round">
                      <img src="" alt="" id="pic2">
                    </div>
                  </li>

                </ul>
              </td>
            </tr>

          </table>
        </form>

        <button type="button" class="sui-btn btn-primary btn-large" id="addCaipin-ok">确定</button>


        <div class="uplaod">
          <p>选择菜谱列表图片上传：</p>
          <form name="form1" method="post" enctype="multipart/form-data" action="/food/index.php/Admin/Addcaipu/Addcaipin" id="loadPic" target="id_iframe">
             <input type="file" name="picfile" style="width:160px;" />
             <input type="submit" name="addpic" value="添加" />
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<div class="sui-loading loading-inline loading" id="loading" style="display: none">
  <i class="sui-icon icon-pc-loading"></i>
  <span>正在加载中</span>
</div>
<script>

  function showpic(str){
    var str = "http://www.wlx.com/food/Public/"+str;
    $("#pic1").attr({"src":str});
  };
  $("body").on("click", ".fuselect", function() {
    var id = $(this).attr("data-id");
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Admin/Addcaipu/addcaipin",
      data: {
        "selectId": id,
        "Act": "select",
      },
      success: function(data) {
        var data = JSON.parse(data);
        var str = 　"";
        for (var i = 0; i < data.length; i++) {
          console.log(data[i].name)
          $("#selectzifenlei").html("");

          str += '<li role="presentation" data-id="' + data[i].id + '"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="' + data[i].name + '">' + data[i].name + '</a></li>';
          $("#selectzifenlei").html(str);
        }
      }
    });
  });

  //
  var $form = $("#add-caipin");
  // $form.validate("showError", "username", "", "myerror");
  $("body").on("click", "#addCaipin-ok", function() {
    var ok = true;
    if ($("#addfufenlei").val() == "") {
      alert("请选择！");
      return;
    }
    if ($("#addzifenlei").val() == "") {
      alert("请选择！");
      return;
    }
    $("#add-caipin input[data-rules=required]").each(function() {
      $(this).focus(function() {
        $form.validate("hideError", $(this), "myerror");
      });
      if ($(this).val() == "") {
        $form.validate("showError", $(this), "请填写", "myerror");
        ok = false;
        return;
      } else {
        ok = true;
      }

    });

    if (ok == true) {
      var data = $('#add-caipin').serialize() + "&Act=Add";
      $.ajax({
        type: 'POST',
        url: "/food/index.php/Admin/Addcaipu/addcaipin",
        data: data,
        beforeSend: function() {
          $("#loading").show();
        },
        success: function(data) {
          $("#loading").hide();
          alert(data.info);
          // window.location.reload();
        }
      });
    }
  });


</script>
<!-- 引入底部文件 -->
<script>
  //设置内容高度
  var height = $(window).height()-68+"px";
  $(".dl-tab-slide").css({"min-height":height});
  $(".dl-nav-con").css({"min-height":height});
</script>
<script src="/food/Public/Admin/js/common.js"></script>
<!-- <script src="/food/Public/Admin/js/index.js"></script> -->
</body>
</html>