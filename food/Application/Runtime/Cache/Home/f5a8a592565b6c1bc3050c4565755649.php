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

<style>
.mycheckbox{
  display: inline-block;
  width: 16px;
  height: 16px;
  border: 2px solid #33475f;
  border-radius: 50%;
  box-sizing: border-box;
  margin-right: 6px;
  margin-bottom: -4px;
  cursor: pointer;
}
.mycheckbox-checked{
  background: url("/food/Public/Home/images/check.png") center center;
}

</style>
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
        <div class="tab-pane active" data-slide="tab1" data-href="/food/index.php/Home/Order/unhandled">
          <div class="sui-steps-round">
  <div class="finished">
    <div class="wrap">
      <div class="round"><i class="sui-icon icon-pc-right"></i></div>
      <div class="bar"></div>
    </div>
    <label>顾客下单</label>
  </div>
  <div class="current">
    <div class="wrap">
      <div class="round">2</div>
      <div class="bar"></div>
    </div>
    <label>服务员确认订单中</label>
  </div>
  <div class="todo">
    <div class="wrap">
      <div class="round">3</div>
      <div class="bar"></div>
    </div>
    <label>厨师配餐</label>
  </div>
  <div class="todo last">
    <div class="wrap">
      <div class="round">4</div>
    </div>
    <label>顾客用餐，订单完成</label>
  </div>
</div>
<!-- <form class="sui-form form-dark">
  <label for="num-search">订单号：</label>
  <div class="input-control control-right">
    <input type="text" name="num-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  <button type="button" class="sui-btn btn-primary" id="" style="margin-right:20px;">搜索</button>

  <label for="seat-search">座位号：</label>
  <div class="input-control control-right">
    <input type="text" name="seat-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  <button type="button" class="sui-btn btn-primary" id="" style="margin-right:20px;">搜索</button>

  <label for="phone-search">手机号：</label>
  <div class="input-control control-right">
    <input type="text" name="phone-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  <button type="button" class="sui-btn btn-primary" id="" style="margin-right:20px;">搜索</button>
</form> -->
<label for=""class="pull-left">
  <span class="mycheckbox "></span>全选
</label>

<label class="pull-left"style="margin-left:100px;">
  <button type="button" class="sui-btn del-order-btn" id="unhandled-del-order-btn">删除所选</button>
</label>
<br><br>
<?php if(is_array($order)): foreach($order as $key=>$order): ?><table class="sui-table table-bordered" id="<?php echo ($order["oid"]); ?>">
  <thead>
      <tr>
        <th colspan="6">
        <label class="pull-left">
          <span class="mycheckbox"></span>订单编号：<?php echo ($order["oid"]); ?>&nbsp;&nbsp;
        </label>
        <label class="pull-left">
          订座编号：<?php echo ($order["orderseatid"]); ?>&nbsp;&nbsp;
        </label>
        <label class="pull-left">
          座位号：<?php echo ($order["seatid"]); ?>&nbsp;&nbsp;
        </label>
        <label class="pull-left">
          菜品数量：<?php echo ($order["num"]); ?>&nbsp;&nbsp;
        </label>
        <label class="pull-left">
          菜品总价格：<?php echo ($order["money"]); ?>元&nbsp;&nbsp;
        </label>
        <a href="javascript:;"class="pull-left showdetail" data-orderid="<?php echo ($order["id"]); ?>">详情</a>
        <label class="pull-left" style="margin:0 30px;">
            <span class="pull-left">
              <a href="javascript;:" class="unhandled-order-ok-btn" data-id="<?php echo ($order["oid"]); ?>" data-orderseatid="<?php echo ($order["orderseatid"]); ?>" data-status="<?php echo ($order["ostatus"]); ?>">确认</a>
            </span>
        </label>
        <span class="pull-right">下单时间：<?php echo ($order["ordertime"]); ?></span>
        </th>
      </tr>
  </thead>
  <tbody class="order-list list-table hide"data-orderid="<?php echo ($order["orderseatid"]); ?>">
  <tr>
    <td colspan="6">
      <div>
        <a href="javascript:;">联系人：</a><?php echo ($order["gkname"]); ?>&nbsp;&nbsp;&nbsp;
        <a href="javascript:;">手机号码：</a><?php echo ($order["gkphone"]); ?>&nbsp;&nbsp;&nbsp;
        <a href="javascript:;">备注：</a><?php echo ($order["gkbz"]); ?>&nbsp;&nbsp;&nbsp;
      </div>
    </td>
  </tr>
  <?php if(is_array($order['food'])): foreach($order['food'] as $key=>$food): ?><tr>
      <td width="40%">
        <div class="typographic">
          <a href="#" class="block-text"><?php echo ($food["foodname"]); ?></a>
          <span>共：<?php echo ($food["foodnum"]); ?>份</span>
          <span class="pull-right">￥<?php echo ($food["foodprice"]); ?>/份</span>
        </div>
      </td>
      <td width="10%" class="center">小计：<?php echo ($food["foodtotalmoney"]); ?>元</td>
      <td width="30%" class="center">备注:<?php echo ($food["foodbz"]); ?></td>
      <td width="10%" class="center"><a href="#">删除</a></td>
    </tr><?php endforeach; endif; ?>
  </tbody>
</table><?php endforeach; endif; ?>
<script>
  $("body").on("click",".unhandled-order-ok-btn",function(){
    var oid = $(this).attr("data-id");
    var ostatus = $(this).attr("data-ostatus");
    var ok = true;
    if( ostatus == 1 ){
      ok = false;
      return;
    }
    if( ok ){
      ostatus = 1;
      $.ajax({
            url: "Order/orderStatus",
            type: "POST",
            dataType: "json",
            async: true,
            data: {
              "oid": oid,
              "ostatus":ostatus,
            },
            beforeSend:function(){
              $("#loading").show();
            },
            success: function(data) {
              $("#loading").hide();
              var removeid = "#"+oid;
              $(removeid).remove();
            }
      })
    }

  })
  $("#unhandled-del-order-btn").unbind("click");
  $("body").on("click","#unhandled-del-order-btn",function(){
      if( $("#finished").find(".mycheckbox-checked").length > 0 ){
        if(confirm("确定删除？")){
          var dataId = [];
          var dataSeatid = [];
          $("#finished-list").find(".mycheckbox-checked").each(function(){
              var orderid = $(this).attr("data-id");
              var orderseatid = $(this).attr("data-orderseatid");
              dataId.push(orderid);
              dataSeatid.push(orderseatid);
          });
          console.log(dataId);
          console.log(dataSeatid);

          $.ajax({
                url: "Order/delOrder",
                type: "POST",
                dataType: "json",
                async: true,
                data: {
                  dataId,
                  dataSeatid,
                },
                beforeSend:function(){
                  $("#loading").show();
                },
                success: function(data) {
                  $("#loading").hide();
                  for(var i = 0;i<dataId.length;i++){
                    $(".list-table").each(function(){
                      if($(this).attr("data-id")==dataId[i]){
                        $(this).remove();
                      }
                    })
                  }
                },
                error:function(){
                  $("#loading").hide();
                }
          })
        }
      }else{
        alert("请选择！");
      }
  })
</script>

        </div>
        <div class="tab-pane tab-none" data-slide="tab2" data-href="/food/index.php/Home/Order/unfinished">
        </div>
        <div class="tab-pane tab-none" data-slide="tab3" data-href="/food/index.php/Home/Order/finished" id="finished">

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
    $(".nav-order").parent().addClass("dl-selected");
    $("body").on("click",".showdetail",function(){
      var id = $(this).attr("data-orderid");
      $(".list-table").each(function(){
        if($(this).attr("data-orderid")==id){
          if($(this).hasClass("hide")){
            $(this).removeClass("hide");
          }else{
            $(this).addClass("hide");
          }
        }
      })
    });
  });
</script>
<script src="/food/Public/Home/js/order.js"></script>
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