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

<style>
  #container {
    float: left;
    margin-right: 10px;
  }

  #container2 {
    float: left;
  }
</style>
<script src="/food/Public/Admin/js/highcharts.js"></script>
<script src="/food/Public/Admin/js/exporting.js" type="text/javascript"></script>
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

<div class="dl-con">
  <div id="" class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      数据统计
      <div class="cutline"></div>
    </h4>
    <ul>
      <li class="slide-tab" data-slide="tab1">数据统计</li>
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="dl-nav-bar-select nav-bar-tit" data-slide="tab1">
          <span class="bar-tit">数据统计</span>
          <span class="sub-tab-closeBtn"></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <div class="tab-pane active">
          <div id="container" style="width:400px;height:400px"></div>
          <div id="container2" style="width:500px;height:400px"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(".nav-cal").parent().addClass("dl-selected");


  $(function() {

    var topfoodSold = [];
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Admin/Cal/index",
      data: {
        "show": "foodsfenlei",
      },
      success: function(data) {
        var data = JSON.parse(data);

        for (var i in data) {
          topfoodSold.push(parseInt(data[i]));
        }
        $('#container').highcharts({ //图表展示容器，与div的id保持一致
          chart: {
            type: 'column' //指定图表的类型，默认是折线图（line）
          },
          title: {
            text: '菜谱类别销量' //指定图表标题
          },
          xAxis: {
            categories: ['中餐', '异国风味', '小吃', '饮品'] //指定x轴分组
          },
          yAxis: {
            title: {
              text: '销量' //指定y轴的标题
            }
          },
          tooltip: {
            formatter: function() {
              return '<b>' + this.x + '</b>: ' + this.y;
            }
          },
          series: [{ //指定数据列
            name: '菜谱分类名称', //数据列名
            data: topfoodSold
          }]
        });
      }
    });
  })
  $(function() {
    var topfoodName = [];
    var topfoodSold = [];
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Admin/Cal/index",
      data: {
        "show": "foodstop",
      },
      success: function(data) {
        var data = JSON.parse(data);

        for (var i in data) {
          topfoodName.push(i);
          topfoodSold.push(parseInt(data[i]));
        }

        $('#container2').highcharts({ //图表展示容器，与div的id保持一致
          chart: {
            type: 'column' //指定图表的类型，默认是折线图（line）
          },
          title: {
            text: '销量前10名' //指定图表标题
          },
          xAxis: {
            categories: topfoodName //指定x轴分组
          },
          yAxis: {
            title: {
              text: '销量' //指定y轴的标题
            }
          },
          tooltip: {
            formatter: function() {
              return '<b>' + this.x + '</b>: ' + this.y;
            }
          },
          series: [{ //指定数据列
            name: '菜谱名称', //数据列名
            data: topfoodSold
          }]
        });
      }
    });


  });
</script>

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