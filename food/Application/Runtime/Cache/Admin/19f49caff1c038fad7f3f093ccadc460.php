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
  .edit input {
    border: none;
  }

  .btn-center {
    margin-left: 60px;
    margin-top: 30px;
  }

  #height-60 {
    height: 60px;
  }
</style>
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
  <div class="con-width dl-tab-slide row">
    <h4 class="nav-tit">
      桌台管理
      <div class="cutline"></div>
    </h4>
    <ul>
      <li class="slide-tab" data-slide="tab1">座位列表</li>
      <li class="slide-tab" data-slide="tab2">添加座位</li>
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="dl-nav-bar-select nav-bar-tit" data-slide="tab1">
          <span class='bar-tit'>
            座位列表
          </span>
          <span class='sub-tab-closeBtn'></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <div class="tab-pane active" data-slide="tab1" data-href="/food/index.php/Admin/Seat/seatlist">
          <div class="sui-msg msg-info">
  <div class="msg-con">座位状态为0表示该座位未被顾客选择，0为默认状态</div>
  <s class="msg-icon"></s>
</div>
<br>
<br>
<table class="sui-table table-bordered" id="table">
  <thead>
    <tr>
      <th>座位id</th>
      <th>座位人数</th>
      <th>座位位置</th>
      <th>座位描述</th>
      <th>座位状态</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr id="">
        <td>
          <?php echo ($data["id"]); ?>
        </td>
        <td class="seatnum">
          <?php echo ($data["seatnum"]); ?>
        </td>
        <td class="pos">
          <?php if($data["pos"] == '1'): ?>包间
            <?php else: ?> 大厅<?php endif; ?>
        </td>
        <td class="desc">
          <?php echo ($data["desc"]); ?>
        </td>
        <td class="status">
          <?php echo ($data["status"]); ?>
        </td>
        <td>
          <?php if($data["pos"] == '1'): ?><input type="hidden" value="<?php echo ($data["id"]); ?>;<?php echo ($data["seatnum"]); ?>;包间;<?php echo ($data["desc"]); ?>">
            <?php else: ?>
            <input type="hidden" value="<?php echo ($data["id"]); ?>;<?php echo ($data["seatnum"]); ?>;大厅;<?php echo ($data["desc"]); ?>"><?php endif; ?>
          <button data-toggle="modal" data-target="#edit-modal" data-keyboard="false" class="sui-btn btn-lg seat-edit-btn" data-id="<?php echo ($data["id"]); ?>" data-status="<?php echo ($data["status"]); ?>">编辑</button>
          <button class="sui-btn btn-lg update-seatstatus-btn" data-id="<?php echo ($data["id"]); ?>" data-status="<?php echo ($data["status"]); ?>">修改座位状态</button>
          <a href="javascript:void(0);" class="sui-btn btn-default seat-del-btn" data-id="<?php echo ($data["id"]); ?>">删除</a>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<script>
  //删除座位
  $(".seat-del-btn").unbind("click");
  $("body").on("click", ".seat-del-btn", function() {
      var id = $(this).attr("data-id");
      var nowTips = "#seat-" + id;
      var url = "/food/index.php/Admin/Seat/delete";
      if (confirm("确定删除？")) {
        $.ajax({
          type: 'POST',
          url: url,
          data: {
            "id": id
          },
          success: function(data) {
            alert(data.info);
            window.location.reload();
          }
        });
      }
    })
    //编辑座位
  $(".seat-edit-btn").unbind("click");
  $("body").on("click", ".seat-edit-btn", function() {
    var id = $(this).attr("data-id"); //获取当前编辑的id
    $(".update-id").val(id);
    var url = "/food/index.php/Admin/Seat/update";
    var status = $(this).attr("data-status")

    var val = $(this).siblings("input").val();
    var strs = val.split(";");
    $(".update").each(function(index) {

      $(this).val(strs[index]);
      if (index == 2) {
        $(".value").text(strs[index]);
      }
    });

    $("#ok").click(function() {
      if ($("input[data-rules=required]").val() == "") {
        return false;
      }
      var pos = $(".seat-pos").val();

      $.ajax({
        type: 'POST',
        url: "/food/index.php/Admin/Seat/Update",
        data: $('#seat-update').serialize(),
        success: function(data) {
          alert(data.info);
          window.location.reload();
        }
      });
    });
  })
  $(".update-seatstatus-btn").unbind("click");
  $("body").on("click", ".update-seatstatus-btn", function() {
    var id = $(this).attr("data-id");
    var status = $(this).attr("data-status");
    var that = $(this);
    var updatestatus;
    if( status == 0 ){
      updatestatus = 1;
    }else{
      updatestatus = 0;
    }
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Admin/Seat/updatestatus",
      data: {
        "id":id,
        "status":updatestatus,
      },
      success: function(data) {
        alert(data.info);
        window.location.reload();
      }
    });
  })
</script>

        </div>
        <div class="tab-pane tab-none" data-slide="tab2" data-href="/food/index.php/Admin/Seat/add">

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
    $(".nav-orderseat").parent().addClass("dl-selected");
    if (!($("#edit-modal").length > 0)) {
      $.ajax({
        type: 'get',
        url: "Seat/edit",
        success: function(data) {
          $("#table").after(data);
        }
      });
    }
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