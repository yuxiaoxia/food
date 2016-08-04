<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>欢迎来到后台管理系统</title>
  <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css"> -->
  <link rel="stylesheet" href="/tp/Public/Home/css/common.css">
  <link href="/tp/Public/Home/css/index.css" rel="stylesheet">
  <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
</head>
<body>
  <!-- 添加导航条 -->
  <div class="header">
    <div class="con-width">
      <div class="dl-title">
      </div>
      <div class="dl-log">欢迎您,
        <span class="dl-log-user">root</span>
        <a href="javascrip:;" title="退出系统" class="dl-log-quit">[退出]</a>
        <a href="http://www.chihuo.com/tp/index.php/login" title="切换账号" class="dl-log-quit">[切换账号]</a>
      </div>
  </div>
  <div class="con-width dl-main-nav">
    <ul id="top-nav" class="nav-list">
    		<li class="nav-item">
          <div class="nav-item-inner nav-home"><a href="index.html">系统管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-order"><a href="order.html">订单管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-orderseat"><a href="seat.html">订座管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-caipu"><a href="caipu.html">菜谱管理</a></div>
        </li>
        <li><div class="nav-item-inner nav-seat"><a href="zhuotai.html">桌台管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-tips"><a href="tips.html">首页公告</a></div>
        </li>
    </ul>
  </div>
</div>

<div class="dl-con">
  <div id="" class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      订座管理
      <div class="cutline"></div>
    </h4>
    <ul class="tab-wraped tab-vertical">
      <li class="active ">
        <a href="#seat-list" data-toggle="tab" class="slide-tab">
        座位列表
        </a>
      </li>
    </ul>
  </div>
  <div class="dl-tab-content">
      <div class="dl-nav-bar">
      </div>
      <div class="dl-nav-con">
        <div class="tab-content tab-wraped">
          <div id="seat-list" class="tab-pane active">
              <table class="sui-table table-bordered">

  <thead>
    <tr>
      <th>座位id</th>
      <th>座位号</th>
      <th>座位人数</th>
      <th>座位位置</th>
      <th>座位状态</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr id="">
        <td>
          <?php echo ($data["id"]); ?>
        </td>
        <td>
          <?php echo ($data["seatnum"]); ?>
        </td>
        <td>
          <?php echo ($data["num"]); ?>
        </td>
        <td>
          <?php echo ($data["desc"]); ?>
        </td>
        <td>
          <?php echo ($data["status"]); ?>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>

          </div>
      </div>
  </div>
</div>
<script>
$(document).ready(
  function(){
    $(".nav-seat").parent().addClass("dl-selected");
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
<script src="/tp/Public/Home/js/common.js"></script>
<script src="/tp/Public/Home/js/index.js"></script>
</body>
</html>