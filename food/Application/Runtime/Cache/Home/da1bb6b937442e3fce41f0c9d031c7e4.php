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
  .mask {
    width: 100%;
    height: 100%;
    position: fixed;
    z-index: 888;
    background: rgba(0, 0, 0, .6);
    left: 0;
    top: 0;
  }

  .result {
    max-width: 300px;
    height: 100px;
    margin: 0 auto;
    margin-top: 10%;
    background: #fff;
    text-align: center;
    font-size: 16px;
    border-radius: 10px;
  }

  .result p {
    margin: 0;
    margin-top: 4px;
  }

  .result-btn {
    width: 100%;
    height: 48px;
    line-height: 48px;
    margin-top: 18px;
    cursor: pointer;
  }

  .btn-ok {
    width: 50%;
    height: 100%;
    float: left;
    background: #084D84;
    border-bottom-left-radius: 10px;
  }

  .btn-no {
    width: 50%;
    height: 100%;
    float: left;
    background: #ccc;
    border-bottom-right-radius: 10px;
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

<div class="mask" style="display:none;">
  <div class="result">
    <p>座位预定成功，订座编号为：
      <dpan id="result-orderseat-id"></dpan>
    </p>
    <p>是否订餐？</p>
    <div class="result-btn">
      <div class="btn-ok">是</div>
      <div class="btn-no">否</div>
    </div>
  </div>
</div>
<div class="dl-con">
  <div id="" class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      订座管理
      <div class="cutline"></div>
    </h4>
    <ul>
      <li data-slide="tab1" class="slide-tab">座位预订列表</li>
      <li data-slide="tab2" class="slide-tab">预定座位</li>
      <!-- <li data-slide="tab3" class="slide-tab">订餐</li> -->
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="nav-bar-tit dl-nav-bar-select" data-slide="tab1">
          <span class="bar-tit">座位预订列表</span>
          <span class="sub-tab-closeBtn"></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <div class="tab-pane active" data-slide="tab1" data-href="/food/index.php/Home/Dcan/slist" id="slist">
          共计： <?php echo ($count); ?> 条数据
<button class="sui-btn btn-lg search-limit-status" style="margin-left:80px;margin-bottom:5px;" data-search="status=0">未确认</button>
<button class="sui-btn btn-lg search-limit-status" style="margin-left:10px;margin-bottom:5px;"data-search="status=1">已确认</button>
<button class="sui-btn btn-lg search-limit-status" style="margin-left:10px;margin-bottom:5px;"data-search="status=2">已完成</button>
<button class="sui-btn btn-lg search-limit-status" style="margin-left:10px;margin-bottom:5px;"data-search="">全部</button>
<br>
<table class="sui-table table-bordered">
  <thead>
    <tr>
      <th>座位预定编号</th>
      <th>座位id</th>
      <th>顾客姓名</th>
      <th>顾客手机号</th>
      <th>顾客备注信息</th>
      <th>预订座位时是否下单</th>
      <th>预订时间</th>
      <th>状态</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr>
        <td>
          <?php echo ($data["id"]); ?>
        </td>
        <td>
          <?php echo ($data["seatid"]); ?>
        </td>
        <td>
          <?php echo ($data["gkname"]); ?>
        </td>

        <td>
          <?php echo ($data["gkphone"]); ?>
        </td>
        <td>
          <?php echo ($data["gkbz"]); ?>
        </td>
        <td class="isorder" data-orderid="<?php echo ($data["orderid"]); ?>">
          <?php echo ($data["orderid"]); ?>
        </td>
        <td>
          <?php echo ($data["ordertime"]); ?>
        </td>
        <td class="orderseat-status" data-status="<?php echo ($data["status"]); ?>">
          <?php echo ($data["status"]); ?>
        </td>
        <td>
          <button class="sui-btn btn-lg orderfood-btn" data-id="<?php echo ($data["id"]); ?>" data-seatid="<?php echo ($data["seatid"]); ?>" data-status="<?php echo ($data["status"]); ?>">点餐</button>
          <button class="sui-btn btn-lg gukeconfirm-btn" data-id="<?php echo ($data["id"]); ?>" data-status="<?php echo ($data["status"]); ?>">确认</button>
          <button class="sui-btn btn-lg orderseatok-btn" data-id="<?php echo ($data["id"]); ?>" data-status="<?php echo ($data["status"]); ?>" data-seatid="<?php echo ($data["seatid"]); ?>">完成</button>
          <button class="sui-btn btn-lg delorderseat-btn" data-id="<?php echo ($data["id"]); ?>" data-seatid="<?php echo ($data["seatid"]); ?>" data-status="<?php echo ($data["status"]); ?>">删除</button>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<!-- Modal-->
<div id="gukeconfirm-modal" tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
        <h4 id="myModalLabel" class="modal-title">添加备注信息</h4>
      </div>
      <div class="modal-body">
        <!-- 弹窗内容 -->
        <form class="sui-form form-horizontal sui-validate myform form-margin">
          <div class="control-group">
            <label for="mobile" class="control-label">备注</label>
            <div class="controls">
              <input type="text" class="input-large input-fat zl-phone" placeholder="备注" data-rules="required" name="people" value="" id="addgukeBz">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button"class="sui-btn btn-primary btn-large" id="addgukeBz-ok">确定</button>
        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
      </div>
    </div>
  </div>
</div>
<script>
$(".orderseat-status").each(function() {
  if ($(this).attr("data-status") == 0) {
    $(this).html("未确认");
  } else if ($(this).attr("data-status") == 1) {
    $(this).html("已确认");
    $(this).parent().find(".gukeconfirm-btn").addClass("disabled");
  } else {
    $(this).parent().find(".gukeconfirm-btn").addClass("disabled");
    $(this).parent().find(".orderseatok-btn").addClass("disabled");
    $(this).parent().find(".orderfood-btn").addClass("disabled");
    $(this).html("已完成");
  }
});
//
$(".isorder").each(function() {
  if ($(this).attr("data-orderid") == 0) {
    $(this).html("未下单");
  } else if ($(this).attr("data-orderid") == 1) {
    $(this).html("已下单");
  }
});
$("body").on("click",".see-order-btn",function(){

  var order = $(this).attr("data-orderid");

  if( order == 1 ){
     window.location.href="order.html";
  }
})
$("body").on("click",".orderfood-btn",function(){
  if($(this).hasClass("disabled")){
    return;
  }else{
    var id = $(this).attr("data-id");
    var seatid = $(this).attr("data-seatid");
    sessionStorage.setItem("orderseatid",id);
    sessionStorage.setItem("seatid",seatid);
    window.location.href = "http://www.wlx.com/food/index.php/orderfood.html";
  }
})
//确认订座
$("body").off("click", ".gukeconfirm-btn");
$("body").on("click", ".gukeconfirm-btn", function() {
  var that = $(this);
  var id = $(this).attr("data-id");
  var status = $(this).attr("data-status");
  if (status == 0) {
    $.ajax({
      url: "Dcan/statusOrderSeat",
      type: "POST",
      dataType: "json",
      async: true,
      data: {
        "id": id,
        "status": 1,
      },
      beforeSend: function() {
        $("#loading").show();
      },
      success: function(data) {
        that.attr("data-status") == 1;
        that.parent().parent().find(".orderseat-status").html("已确认");
        $("#loading").hide();
      }
    });

  } else if (status == 1) {
    return;
  }
});
//顾客结束
$("body").on("click", ".orderseatok-btn", function() {
  var that = $(this);
  var id = $(this).attr("data-id");
  var status = $(this).attr("data-status");
  var seatid = $(this).attr("data-seatid");

  if (status == 1) {
    $.ajax({
      url: "Dcan/statusOrderSeat",
      type: "POST",
      dataType: "json",
      async: true,
      data: {
        "id": id,
        "status": 2,
        "seatid": seatid,
      },
      beforeSend: function() {
        $("#loading").show();
      },
      success: function(data) {
        that.attr("data-status") == 2;
        that.parent().parent().find(".orderseat-status").html("已确认");
        $("#loading").hide();
        fleshAjax("#slist","Dcan/slist");
      }
    });

  } else if (status == 2) {
    return;
  }
});
//顾客订座删除

$("body").on("click", ".delorderseat-btn", function() {
  var that = $(this);
  var id = $(this).attr("data-id");
  var seatid = $(this).attr("data-seatid");

  $.ajax({
    url: "Dcan/delOrderSeat",
    type: "POST",
    dataType: "json",
    async: true,
    data: {
      "id": id,
      "seatid": seatid,
    },
    beforeSend: function() {
      $("#loading").show();
    },
    success: function(data) {
      that.parent().parent().remove();
      $("#loading").hide();
      fleshAjax("#slist","Dcan/slist");
    }
  });
});
$("body").on("click",".search-limit-status",function(){
  var search = $(this).attr("data-search");
  $.ajax({
        url: "Dcan/slist",
        type: "GET",
        data: {
          "search": search,
        },
        success:function(data) {
          $("#slist").html(data);
        },
        error: function() {

        }
  })
})
</script>

        </div>
        <div class="tab-pane" data-slide="tab2" data-href="/food/index.php/Home/Dcan/orderSeat" id="orderSeat">

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
  $(document).ready(function() {
    var height = $(window).height() - 68 + "px";
    $(".index-con").css({
      "min-height": height
    });
    $(".nav-caipu").parent().addClass("dl-selected");
  });
  $(".btn-ok").click(function() {
    $(".mask").hide();
    var id = $("#result-orderseat-id").html();
    sessionStorage.setItem("orderseatid",id);
    sessionStorage.setItem("seatid",$("#result-seatid").val());
    window.location.href = "orderfood.html";
  });
  $(".btn-no").click(function() {
    $(".mask").hide();
    window.location.reload();
  });
  function fleshAjax(str, url) {
    $.ajax({
      type: 'get',
      url: url,
      beforeSend: function() {
        $("#loading").show();
        $(str).html("")
      },
      success: function(data) {
        $("#loading").hide();
        $(str).html(data);
      }
    });
  }
</script>
<script src="/food/Public/Home/js/dcan.js"></script>
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