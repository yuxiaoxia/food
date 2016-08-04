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
  <div class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      系统管理
      <div class="cutline"></div>
    </h4>
    <ul>
      <?php if(is_array($Title)): $k = 0; $__LIST__ = $Title;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="slide-tab" data-slide="tab<?php echo ($k); ?>"><?php echo ($vo); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="dl-tab-content">
      <div class="dl-nav-bar">
        <ul id="dl-nav-bar-tit">
          <li class="nav-bar-tit dl-nav-bar-select" data-slide="tab1">
            <span class="bar-tit">餐厅信息</span>
            <span class="sub-tab-closeBtn"></span>
          </li>
        </ul>
      </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <div class="tab-pane active" data-slide="tab1" data-href="/food/Admin/System/Rinfo">
          <div id="rest-info">
  <table class="sui-table table-bordered">
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
        <td style="width: 100px;">餐厅名称</td>
        <td><?php echo ($data["name"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">餐厅注册时间</td>
        <td><?php echo ($data["time"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">创始人</td>
        <td><?php echo ($data["founders"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">餐馆类型</td>
        <td><?php echo ($data["type"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">餐馆简介</td>
        <td><?php echo ($data["brief"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">特色服务</td>
        <td>
          <?php echo ($data["feature"]); ?>
        </td>
      </tr>
      <tr>
        <td>图片展示</td>
        <td>
          <li class="span2">
            <div class="img-round">
              <img src="<?php echo ($data["img"]); ?>" alt="">
            </div>
          </li>
        </td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>

        </div>
        <div class="tab-pane" data-slide="tab2" data-href="/food/Admin/System/rupdate">

        </div>
        <div class="tab-pane" data-slide="tab3" data-href="/food/Admin/System/user">

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
$(document).ready(function(){
    $(".nav-system").parent().addClass("dl-selected");
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
<!-- <script src="/food/Public/Admin/js/[js].js"></script> -->
</body>
</html>