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
  .addordercar {
    position: absolute;
    right: 20px;
    top: 30%;
    min-width: 300px;
    padding: 10px;
    background: #fbfbfb;
    border: 2px solid #d7d7d7;
    border-radius: 4px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
    font-size: 12px;
    color: #333;
  }

  .addordercar p {
    margin: 0;
  }

  #foodresult li {
    list-style: none;
    margin-bottom: 6px;
  }

  .orderlist em {
    display: inline-block;
    width: 10px;
    height: 2px;
  }

  .editfood {
    display: inline-block;
    padding: 0px 3px;
    border: 1px solid #ccc;
    cursor: pointer;
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
      订餐管理
      <div class="cutline"></div>
    </h4>
    <ul>
      <li data-slide="tab1" class="slide-tab">订餐</li>
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="nav-bar-tit dl-nav-bar-select" data-slide="tab1">
          <span class="bar-tit">订餐</span>
          <span class="sub-tab-closeBtn"></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <div class="tab-pane active" data-slide="tab1" data-href="/food/index.php/Home/Orderfood/orderFood" id="orderfood">
          <!-- <form class="sui-form form-dark">
  <button type="button" class="sui-btn btn-primary" style="margin-right:30px;" id="search-all">全部菜谱</button>
  <label for="fenlei-search">分类：</label>
  <span class="sui-dropdown dropdown-bordered select">
    <span class="dropdown-inner">
      <a role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
      <input value="" name="" type="hidden" id="input-fenlei">
      <i class="caret"></i><span>选择分类</span></a>
  <ul role="menu" aria-labelledby="drop4" class="sui-dropdown-menu">
    <?php if(is_array($fenleidata)): foreach($fenleidata as $key=>$fenleidata): ?><li role="presentation" data-id="<?php echo ($fenleidata["id"]); ?>">
        <a role="menuitem" tabindex="-1" href="javascript:void(0);" value="<?php echo ($fenleidata["id"]); ?>"><?php echo ($fenleidata["name"]); ?></a>
      </li><?php endforeach; endif; ?>
  </ul>
  </span>
  </span>
  <button type="button" class="sui-btn btn-primary" id="search-fenlei" name="fenlei-search">搜索</button>
</form> -->

<div style="width:800px;">
  共计： <?php echo ($count); ?> 个菜谱
  <table class="sui-table table-bordered">
    <thead>
      <tr>
        <th>菜品id</th>
        <th>菜品名称</th>
        <th>子分类名称</th>
        <th>单价</th>
        <th>销量</th>
        <th>状态</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr>
          <td><?php echo ($data["id"]); ?></td>
          <td><a href="#"><?php echo ($data["cname"]); ?></a></td>
          <td><?php echo ($data["name"]); ?></td>
          <td><?php echo ($data["newprice"]); ?>/份</td>
          <td><?php echo ($data["sold"]); ?></td>
          <td class="caipin-status" data-status="<?php echo ($data["cstatus"]); ?>"><?php echo ($data["cstatus"]); ?></td>
          <td>
            <?php if($data["cstatus"] == '0'): ?><button class="sui-btn btn-lg food-btn disabled" data-id="<?php echo ($data["id"]); ?>" data-name="<?php echo ($data["cname"]); ?>" data-price="<?php echo ($data["newprice"]); ?>" data-num="0" data-money="<?php echo ($data["newprice"]); ?>">
                预定</button>
              <?php else: ?>
              <button class="sui-btn btn-lg food-btn order-food" data-id="<?php echo ($data["id"]); ?>" data-name="<?php echo ($data["cname"]); ?>" data-price="<?php echo ($data["newprice"]); ?>" data-num="0" data-money="<?php echo ($data["newprice"]); ?>">
                预定</button><?php endif; ?>


          </td>
        </tr><?php endforeach; endif; ?>
    </tbody>
  </table>
</div>

<script>

</script>

        </div>
        <div class="addordercar">
          <div>
            <h5>添加菜肴</h5></div>
          <p>座位预定编号为 <span id="orderseatid"></span> 座位号：<span id="seatid"></span></p>
          <div class="orderlist">
            <h5>已选：</h5>
            <ul id="foodresult">
            </ul>
            <div><a>总计：<span id="totalmoney"></span></a><em></em>共<span id="totalnum"></span><em></em>份</div>
            <button class="sui-btn btn-lg" style="margin-left:40px;margin-top:20px;" id="orderfood-ok-btn">确定</button>
          </div>
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
    $(".nav-orderfood").parent().addClass("dl-selected");
    var orderseatid = sessionStorage.getItem("orderseatid");
    $("#orderseatid").html(orderseatid);

    var seatid = sessionStorage.getItem("seatid");
    $("#seatid").html(seatid);

    $("body").on("click", ".order-food", function() {

      if (orderseatid) {
        var foodid = $(this).attr("data-id");
        var foodname = $(this).attr("data-name");
        var foodprice = parseInt($(this).attr("data-price"));
        var foodnum = parseInt($(this).attr("data-num"));
        var foodmoney = parseInt($(this).attr("data-money"));
        foodnum += 1;
        foodmoney = foodnum * foodprice;
        var str = "<li class='foodlist' data-id='" + foodid + "'><a class='foodname'>" + foodname + "</a><em></em><span class='foodprice'>" + foodprice + "</span>元/份<em></em>共:<a class='foodnum'>" + foodnum +
          "</a>份<em></em>总计：<a class='foodmoney'>" + foodmoney + "</a>元 <em></em> <a class='addfood editfood'>+</a><em></em><a class='cutfood editfood'>-</a><em></em><a class='delfood editfood'>X</a></li>";
        $(this).attr({
          "data-num": foodnum
        });
        $(this).attr({
          "data-money": foodmoney
        });
        
        if ($(this).hasClass("hasAdd")) {

          $(".foodlist").each(function() {
            if ($(this).attr("data-id") == foodid) {
              $(this).find(".foodnum").html(foodnum);
              $(this).find(".foodmoney").html(foodmoney);
            }

          });
        } else {
          $(this).addClass("hasAdd");
          $("#foodresult").append(str);
        }

        cal();

      } else {
        alert("请先选座！");
        window.location.href = "dcan.html";
        return;
      }
    });

    function cal() {
      var num = 0;
      var money = 0;
      $(".foodlist").each(function() {
        num += parseInt($(this).find(".foodnum").html());
        money += parseInt($(this).find(".foodmoney").html());
        $("#totalnum").html(num);
        $("#totalmoney").html(money);
      });
    }
    $("body").on("click", ".addfood", function() {
      var num = parseInt($(this).parent().find(".foodnum").html());
      var price = parseInt($(this).parent().find(".foodprice").html());
      num = num + 1;
      var money = parseInt(num * price);
      $(this).parent().find(".foodnum").html(num)
      $(this).parent().find(".foodmoney").html(money);
      cal();
    });
    $("body").on("click", ".cutfood", function() {
      var num = parseInt($(this).parent().find(".foodnum").html());
      var price = parseInt($(this).parent().find(".foodprice").html());
      if (num == 1) {
        return;
      } else {
        num = num - 1;
      }
      var money = parseInt(num * price);
      $(this).parent().find(".foodnum").html(num)
      $(this).parent().find(".foodmoney").html(money);
      cal();
    });
    $("body").on("click", ".delfood", function() {
      $(this).parent().remove();
      cal();
    });

    $("#orderfood-ok-btn").click(function() {
      if ($(".foodlist").length > 0) {
        var orderseatid = $("#orderseatid").html();
        var dataFood = [];
        $(".foodlist").each(function(index) {
          var id = $(this).attr("data-id");
          var name = $(this).find(".foodname").html();
          var num = $(this).find(".foodnum").html();
          var price = $(this).find(".foodprice").html();
          var money = $(this).find(".foodmoney").html();
          dataFood[index] = {
            "id": id,
            'name': name,
            "num": num,
            "price": price,
            "money": money
          }
        });
        var data = JSON.stringify(dataFood);
        $.ajax({
          url: "Orderfood/orderFood",
          type: "POST",
          dataType: "json",
          async: true,
          data: {
            "orderseatid": orderseatid,
            data
          },
          beforeSend: function() {
            $("#loading").show();
          },
          success: function(data) {
            $("#loading").hide();
            sessionStorage.removeItem("orderseatid");
            sessionStorage.removeItem("seatid");
            alert("预定成功,订单编号为" + data.info);
            window.location.href = "order.html";
          }
        });
      } else {
        return;
      }

    });
    $("#search-fenlei").unbind("click");
    $("body").on("click", "#search-fenlei", function() {
      var catid = $("#input-fenlei").val();
      if (catid == "") {
        return;
      }
      search("catid", catid);
    });
    $("body").on("click", "#search-all", function() {
      search("", "");
    });

    function search(name, val) {
      var name = name;
      var val = val;
      var data;
      if (name == "" || val == "") {
        data = "";
      } else {
        data = name + "=" + val;
      }
      $.ajax({
        url: "Orderfood/orderFood",
        type: "GET",
        data: {
          "search": data,
        },
        success: function(data) {
          $("#orderfood").html(data);
        },
        error: function() {

        }
      })
    }
  })
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