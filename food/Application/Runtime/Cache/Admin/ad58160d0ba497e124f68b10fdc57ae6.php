<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>欢迎来到后台管理系统</title>
  <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/food/Public/Admin/css/common.css">

  <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
  <!-- <link rel="stylesheet" href="/food/Public/Admin/css/sui.min.css">
  <script type="text/javascript" src="/food/Public/Admin/js/jquery.min.js"></script>
  <script type="text/javascript" src="/food/Public/Admin/js/sui.min.js"></script> -->

<!-- 添加导航条 -->
</head>
<body>
<div class="header">
  <div class="con-width">
    <div class="dl-title">
      欢迎来到华夏餐厅后台管理系统
      &nbsp;&nbsp;&nbsp;
      <a href="/food/Home/" style="font-size: 12px;">回到首页</a>
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
        <div class="nav-item-inner nav-home"><a href="/food/Admin/index.html">首页</a></div>
      </li>
      <li class="nav-item">
        <div class="nav-item-inner nav-system"><a href="/food/Admin/system.html">系统管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-orderseat"><a href="/food/Admin/seat.html">桌台管理</a></div>
      </li>
    
      <li>
        <div class="nav-item-inner nav-caipu"><a href="/food/Admin/caipu.html">菜谱管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-tips"><a href="/food/Admin/tips.html">首页公告</a></div>
      </li>
  </ul>
</div>
</div>

<div class="dl-con">
  <div id="" class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      订单管理
      <div class="cutline"></div>
    </h4>
    <ul>
      <li data-slide="tab1" class="slide-tab">未处理订单</li>
      <li data-slide="tab2" class="slide-tab">未完成订单</li>
      <li data-slide="tab3" class="slide-tab">已完成订单</li>
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="nav-bar-tit dl-nav-bar-select" data-slide="tab1">
          <span class="bar-tit">未处理订单</span>
          <span class="sub-tab-closeBtn"></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <div class="tab-pane active" data-slide="tab1" data-href="/food/Admin/Order/handled">
          <div class="sui-msg msg-info">
    <div class="msg-con">未处理订单可以根据顾客需要取消或者修改，一经确认则打印订单并交由厨师配餐，确认的订单修改权限只能是大厅经理</div>
    <s class="msg-icon"></s>
</div>
<br><br>
<form class="sui-form form-dark">
  <label for="order-search">订单号：</label>
  <div class="input-control control-right">
    <input type="text" name="order-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  &nbsp;&nbsp;
  <button type="button" data-ok="modal" class="sui-btn btn-primary" id="">搜索</button>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <label for="order-search">座位号：</label>
  <div class="input-control control-right">
    <input type="text" name="order-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  &nbsp;&nbsp;
  <button type="button" data-ok="modal" class="sui-btn btn-primary" id="">搜索</button>
</form>
<table class="sui-table table-bordered">
  <thead>
      <tr>
        <th colspan="5">
        <label class="checkbox pull-left">
          <input type="checkbox">订单编号：7867473872181848
        </label>
        <label class="pull-left">
          座位号：A1
        </label>
        <span class="pull-right">下单时间：2014-01-11 11:59</span>
        </th>
      </tr>
  </thead>
  <tbody>
  <tr>
    <td width="35%">
      <div class="typographic">
        <!-- <img src="http://img.f2e.taobao.net/img.png_50x50.jpg"> -->
        <a href="#" class="block-text">脆皮鸡</a>
        <span>1</span>
        <span class="pull-right">￥30</span>
      </div>
    </td>
    <td rowspan="2" width="15%" class="center">56.50</td>
    <td rowspan="2" width="30%" class="center">备注</td>
    <td rowspan="2" width="15%" class="center">
      <ul class="unstyled">
        <li>未处理</li>
        <!-- <li><a href="#">订单详情</a></li> -->
      </ul>
    </td>
    <td rowspan="2" width="15%" class="center">
      <ul class="unstyled">
        <li><a href="#">删除</a></li>
      </ul>
    </td>
    </tr>
  </tbody>
</table>

        </div>
        <div class="tab-pane tab-none" data-slide="tab2" data-href="/food/Admin/Order/handled">

        </div>
        <div class="tab-pane tab-none" data-slide="tab3" data-href="/food/Admin/Order/handled">

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
$(document).ready(
  function(){
    $(".nav-order").parent().addClass("dl-selected");
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
<script src="/food/Public/Admin/js/common.js"></script>
<!-- <script src="/food/Public/Admin/js/[js].js"></script> -->
</body>
</html>