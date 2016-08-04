<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>欢迎来到后台管理系统</title>
  <!-- <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="/food/Public/Admin/css/sui.min.css">
  <link rel="stylesheet" href="/food/Public/Admin/css/common.css">

  <!-- <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script> -->

  <script type="text/javascript" src="/food/Public/Admin/js/jquery.min.js"></script>
  <script type="text/javascript" src="/food/Public/Admin/js/sui.min.js"></script>

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
      <a href="/food/index.php/Login/logout" title="退出系统" class="dl-log-quit">[退出]</a>
      <a href="/food/index.php/Login/logout" title="切换账号" class="dl-log-quit">[切换账号]</a>
    </div>
</div>
<div class="con-width dl-main-nav">
  <ul id="top-nav" class="nav-list">
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
        <div class="nav-item-inner nav-tips"><a href="/food/index.php/Admin/tips.html">首页公告</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-cal"><a href="/food/index.php/Admin/cal.html">数据统计</a></div>
      </li>
  </ul>
</div>
</div>

<iframe id="id_iframe" name="id_iframe" style="display:none;"></iframe>
<div class="dl-con">
  <div id="" class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      菜谱管理
      <div class="cutline"></div>
    </h4>
    <ul>
      <li class="slide-tab" data-slide="tab1">分类列表</li>
      <li class="slide-tab" data-slide="tab2">子分类列表</li>
      <li class="slide-tab" data-slide="tab3">菜谱列表</li>
      <li class="slide-tab" data-slide="tab4">添加菜品</li>
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="dl-nav-bar-select nav-bar-tit" data-slide="tab1">
          <span class="bar-tit">分类列表</span>
          <span class="sub-tab-closeBtn"></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <div class="tab-pane active" data-slide="tab1" data-href="/food/index.php/Admin/Caipu/Fenlei">
          <ul class="sui-breadcrumb">
  <li><a href="javascript:;" class="all-click">父分类</a></li>
  <li class="active"></li>
</ul>
<table class="sui-table table-bordered" id="table">
  <thead>
    <tr>
      <th>分类id</th>
      <th>分类名称</th>
      <th>上级分类</th>
      <th>路径</th>
      <th>状态</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody id="tbody">
    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr>
        <td><?php echo ($data["id"]); ?></td>
        <td><a href="javascript:;"><?php echo ($data["name"]); ?></a></td>
        <td><?php echo ($data["pid"]); ?></td>
        <td><?php echo ($data["path"]); ?></td>
        <td><?php echo ($data["status"]); ?></td>
        <td>
          <button data-toggle="modal" data-target="#addzifenlei-modal" data-keyboard="false" class="sui-btn btn-lg seat-edit-btn">添加子分类</button>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<!-- Modal-->
<div id="addzifenlei-modal" tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
        <h4 id="myModalLabel" class="modal-title">添加子分类</h4>
      </div>
      <div class="modal-body"  style="height:130px;">
        <!-- 弹窗内容 -->
        <form class="sui-form sui-validate myform" id="add-zifenlei">
          请选择分类：
          <span class="sui-dropdown dropdown-bordered select">
            <span class="dropdown-inner">
              <a role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
              <input value="" name="fenlei" type="hidden" data-rules="required" disabled="">
              <i class="caret"></i><span>选择分类</span></a>
              <ul role="menu" aria-labelledby="drop4" class="sui-dropdown-menu" id="menu">
                <?php if(is_array($data1)): foreach($data1 as $key=>$data1): ?><li role="presentation" data-id="<?php echo ($data1["id"]); ?>">
                    <a role="menuitem" tabindex="-1" href="javascript:void(0);" value="<?php echo ($data1["name"]); ?>"><?php echo ($data1["name"]); ?></a>
                  </li><?php endforeach; endif; ?>
              </ul>
            </span>
            <input value="" name="error" type="hidden" data-rules="required">
          </span>
          <br>
          <br>
          <label for="">请填写子分类名称： </label>
          <input class="input-large input-fat addnum" type="text" name="zifenlei" data-rules="required">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large" id="add-ok">确定</button>
        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
      </div>
    </div>
  </div>
</div>
<script>

var $form  = $("#add-zifenlei");
// $form.validate("showError", "username", "", "myerror");
  $("#add-ok").click(function(){
    if($("input[name=fenlei]").val() == ""){
      $form.validate("showError", "error", "请选择", "myerror");
      return false;
    }
    if($("input[name=zifenlei]").val() == ""){
      $form.validate("showError", "zifenlei", "请填写", "myerror");
      return false;
    }
    var fenleiId = "";
    var fenleiName = $("input[name=fenlei]").val();
    var zifenleiName = $("input[name=zifenlei]").val();
    $("#menu").find("li").each(function(){
      if($(this).hasClass("active")){
        fenleiId = $(this).attr("data-id");
      }
    });
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Admin/Caipu/addzifenlei",
      data: {
        "fenleiId": fenleiId,
        "fenleiName": fenleiName,
        "zifenleiName": zifenleiName,
      },
      beforeSend:function(){
        $("#loading").show();
      },
      success:function(data){
          $("#loading").hide();
          alert(data.info);
          window.location.reload();
      }
    });

  });
</script>

        </div>
        <div class="tab-pane tab-none" data-slide="tab2" id="tab2" data-href="/food/index.php/Admin/Caipu/Zifenlei">

        </div>
        <div class="tab-pane tab-none" data-slide="tab3" data-href="/food/index.php/Admin/Caipu/Caipulb">

        </div>
        <div class="tab-pane tab-none" data-slide="tab4" data-href="/food/index.php/Admin/Caipu/Addcaipin" id="addcaipu">

        </div>
        <br>
        <div class="uplaod hide">
          <div style="float:left;margin-right:40px;">
            <span>选择菜谱列表图片上传：</span>
            <form name="form1" method="post" enctype="multipart/form-data" action="/food/index.php/Admin/Caipu/uploadpic" id="loadPic1" target="id_iframe">
               <input type="file" name="picfile" style="width:160px;" />
               <input type="submit" name="addpic1" value="上传" />
            </form>
          </div>
          <div style="float:left;">
            <span>选择菜谱详情图片上传：</span>
            <form name="form2" method="post" enctype="multipart/form-data" action="/food/index.php/Admin/Caipu/uploadpic" id="loadPic2" target="id_iframe">
               <input type="file" name="picfile" style="width:160px;" />
               <input type="submit" name="addpic2" value="上传" />
            </form>
          </div>
        </div>
        <br>
        <br>
        <br>
      </div>
    </div>
  </div>

</div>

<div class="sui-loading loading-inline loading" id="loading" style="display: none">
  <i class="sui-icon icon-pc-loading"></i>
  <span>正在加载中</span>
</div>
<script>
  $(document).ready(function() {
    $(".nav-caipu").parent().addClass("dl-selected");
    $("body").on("click", "#caipin-edit-btn", function() {
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
        } else {
          ok = true;
        }

      });

      if (ok == true) {
        var data = $('#add-caipin').serialize() + "&Act=Add";
        $.ajax({
          type: 'POST',
          url: "/food/index.php/Admin/Caipu/addcaipin",
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