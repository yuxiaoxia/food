<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>欢迎来到后台管理系统</title>
  <link rel="stylesheet" href="/food/Public/Home/css/sui.min.css">
  <link rel="stylesheet" href="/food/Public/Home/css/common.css">
  <script type="text/javascript" src="/food/Public/Home/js/jquery.min.js"></script>
  <script type="text/javascript" src="/food/Public/Home/js/sui.min.js"></script>

<!-- 这里添加css -->
<style>
  .showcon {
    width: 80%;
    margin: 0 auto;
    margin-top: 120px;
  }

  .box {
    width: 200px;
    height: 120px;
    border-radius: 6px;
    background: rgb(8, 61, 105);
    float: left;
    color: rgba(255, 255, 255, 0.81);
    margin-right: 40px;
  }

  .box1 {
    background: rgb(8, 61, 105);
  }

  .box-top {
    height: 35%;
    line-height: 40px;
    text-indent: 8px;
    background: rgb(57, 111, 155);
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    font-size: 14px;
  }

  .box-bottom {
    height: 65%;
  }

  .box-bottom-left {
    float: left;
  }

  .box-bottom-right {
    float: right;
    font-size: 30px;
    font-weight: bold;
    margin-right: 20px;
    margin-top: 30px;
  }

  .myicon {
    display: inline-block;
    width: 50px;
    height: 50px;
    margin: 10px 0px 10px 25px;
  }

  .myicon-order {
    background: url("/food/Public/Home/images/order.png");
    background-size: cover;
  }

  .myicon-seat {
    background: url("/food/Public/Home/images/seat.png");
    background-size: cover;
  }
  .myicon-seatnum {
    background: url("/food/Public/Home/images/seatnum.png");
    background-size: cover;
  }
  .myicon-one {
      width: 68px;
    background: url("/food/Public/Home/images/one.png");
    background-size: cover;
  }
</style>
<!-- 引入导航 -->
<!-- 添加导航条 -->
</head>
<body>
<div class="header">
  <div class="con-width">
    <div class="dl-title">
      欢迎来到华夏餐厅订餐系统
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/food/index.php/Admin/" title="进入管理系统" class="dl-log-quit" style="font-size:12px;">进入管理系统</a>
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
        <div class="nav-item-inner nav-home"><a href="/food/index.php/index.html">首页</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-caipu"><a href="/food/index.php/dcan.html">订座管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-orderfood"><a href="/food/index.php/orderfood.html">订餐管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-order"><a href="/food/index.php/order.html">订单管理</a></div>
      </li>
      <li class="nav-item">
        <div class="nav-item-inner nav-system"><a href="/food/index.php/user.html">账号管理</a></div>
      </li>
  </ul>
</div>
</div>

<div class="index-con">
  <div class="showcon">
    <div class="box box1">
      <div class="box-top">
        未处理点菜订单
      </div>
      <div class="box-bottom">
        <div class="box-bottom-left">
          <i class="myicon myicon-order"></i>
        </div>
        <div class="box-bottom-right">
          <?php echo ($unordernum); ?>
        </div>

      </div>

    </div>
    <div class="box">
      <div class="box-top">
        未确认订座订单
      </div>
      <div class="box-bottom">
        <div class="box-bottom-left">
          <i class="myicon myicon-seat"></i>
        </div>
        <div class="box-bottom-right">
          <?php echo ($unseatnum); ?>
        </div>
      </div>

    </div>
    <div class="box">
      <div class="box-top">
        空闲桌台
      </div>
      <div class="box-bottom">
        <div class="box-bottom-left">
  <i class="myicon myicon-seatnum"></i>
        </div>
        <div class="box-bottom-right">
          <?php echo ($seatnum); ?>
        </div>

      </div>
    </div>
    <div class="box">
      <div class="box-top">
        今日订单
      </div>
      <div class="box-bottom">
        <div class="box-bottom-left">
<i class="myicon myicon-one"></i>
        </div>
        <div class="box-bottom-right">
          <?php echo ($ordernum); ?>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(
    function() {
      var height = $(window).height() - 68 + "px";
      $(".index-con").css({
        "min-height": height
      });
      $(".nav-home").parent().addClass("dl-selected");
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