<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>欢迎来到后台管理系统</title>
  <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/food/Public/Home/css/common.css">

  <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
  <!-- <link rel="stylesheet" href="/food/Public/Home/css/sui.min.css">
  <script type="text/javascript" src="/food/Public/Home/js/jquery.min.js"></script>
  <script type="text/javascript" src="/food/Public/Home/js/sui.min.js"></script> -->

<!-- 这里添加css -->
<!-- 引入导航 -->
<!-- 添加导航条 -->
</head>
<body>
<div class="header">
  <div class="con-width">
    <div class="dl-title">
      欢迎来到华夏餐厅订餐系统
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/food/Admin/" title="退出系统" class="dl-log-quit" style="font-size:14px;">进入管理系统</a>
    </div>
    <div class="dl-log">欢迎您,
      <span class="dl-log-user"><?php echo (session('name')); ?></span>
      <a href="/food/Admin/User/logout" title="退出系统" class="dl-log-quit">[退出]</a>
      <a href="/food/Admin/User/logout" title="切换账号" class="dl-log-quit">[切换账号]</a>
    </div>
</div>
<div class="con-width dl-main-nav">
  <ul id="top-nav" class="nav-list">
      <li class="nav-item">
        <div class="nav-item-inner nav-home"><a href="/food/index.html">首页</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-orderseat"><a href="/food/seat.html">订座管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-caipu"><a href="/food/dcan.html">订餐管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-order"><a href="/food/order.html">订单管理</a></div>
      </li>
      <li class="nav-item">
        <div class="nav-item-inner nav-system"><a href="/food/user.html">账号管理</a></div>
      </li>
  </ul>
</div>
</div>

订餐管理
<script>
$(document).ready(
  function(){
    var height = $(window).height()-68+"px";
    $(".index-con").css({"min-height":height});
    $(".nav-orderseat").parent().addClass("dl-selected");
  }
);
</script>
<!-- 引入底部文件 -->
<script>
  //设置内容高度
  var height = $(window).height()-68+"px";
  $(".dl-tab-slide").css({"min-height":height});
  $(".dl-nav-con").css({"min-height":height});
</script>
<script src="/food/Public/Home/js/common.js"></script>
<!-- <script src="/food/Public/Home/js/[js].js"></script> -->
</body>
</html>