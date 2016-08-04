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
  <link rel="stylesheet" href="/food/Public/Home/css/common.css">
  <link href="/food/Public/Home/css/index.css" rel="stylesheet">
  <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
</head>
<body>
  <!-- 添加导航条 -->
  <div class="header">
    <div class="con-width">
      <div class="dl-title">
        欢迎来到华夏餐厅
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
          <div class="nav-item-inner nav-orderseat"><a href="seat.html">桌台管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-order"><a href="order.html">订单管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-caipu"><a href="caipu.html">菜谱管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-tips"><a href="tips.html">首页公告</a></div>
        </li>
        <li><div class="nav-item-inner nav-seat"><a href="news.html">意见反馈</a></div>
        </li>
    </ul>
  </div>
</div>

<div class="dl-con">
  <div id="" class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      菜谱管理
      <div class="cutline"></div>
    </h4>
    <ul class="tab-wraped tab-vertical">
      <li class="fist-li active ">
        <a href="#order-wei" data-toggle="tab" class="slide-tab" data-slide="tab1">
        分类管理
        </a>
      </li>
      <li>
        <a href="#order-unfinish" data-toggle="tab" class="slide-tab" data-slide="tab2">
        菜谱管理
        </a>
      </li>
      <li>
        <a href="#order-finished" data-toggle="tab" class="slide-tab" data-slide="tab3">

        </a>
      </li>
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="dl-nav-bar-select nav-bar-tit" data-slide="tab1">
          <span class="bar-tit">分类管理</span>
          <span class="sub-tab-closeBtn"></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped">
        <div id="order-wei" class="tab-pane active">
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
                    <span class="pull-right">成交时间：2014-01-11 11:59</span>
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
                    <li>交易成功</li>
                    <li><a href="#">订单详情</a></li>
                  </ul>
                </td+>
                <td rowspan="2" width="15%" class="center">
                  <ul class="unstyled">
                    <li><a href="#">删除</a></li>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="order-unfinish" class="tab-pane">
          wwwwwww
        </div>
        <div id="order-finished" class="tab-pane">
            <p>Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
      </div>
      </div>
    </div>
</div>
</div>
<script>
$(document).ready(
  function(){
    $(".nav-caipu").parent().addClass("dl-selected");
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
<!-- <script src="/food/Public/Home/js/index.js"></script> -->
</body>
</html>