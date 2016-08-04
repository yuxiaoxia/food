<?php if (!defined('THINK_PATH')) exit();?><div class="sui-msg msg-info">
  <div class="msg-con">座位状态为0表示该座位未被顾客选择，0为默认状态</div>
  <s class="msg-icon"></s>
</div>
<br>
<br>
<form class="sui-form form-dark">
  <button type="button" data-ok="modal" class="sui-btn btn-primary" id="search-all">全部座位</button>&nbsp;&nbsp;
  <label for="order-search">座位号：</label>
  <div class="input-control control-right">
    <input type="text" name="" id="input-seatid"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  &nbsp;&nbsp;
  <button type="button" data-ok="modal" class="sui-btn btn-primary" id="search-seatid">搜索</button>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <label for="order-search">座位状态：</label>
  <div class="input-control control-right">
    <input type="text" name="" id="input-status"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  &nbsp;&nbsp;
  <button type="button" data-ok="modal" class="sui-btn btn-primary" id="search-status">搜索</button>
  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
  <label for="">座位位置：</label>
  <div class="input-control control-right">
    <input type="text" name="" id="input-pos"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  &nbsp;&nbsp;
  <button type="button" data-ok="modal" class="sui-btn btn-primary" id="search-pos">搜索</button>
</form>
<table class="sui-table table-bordered">
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
        <td>
          <?php echo ($data["seatnum"]); ?>
        </td>
        <td class="seat-pos" data-pos="<?php echo ($data["pos"]); ?>">
          <?php echo ($data["pos"]); ?>
        </td>
        <td>
          <?php echo ($data["desc"]); ?>
        </td>
        <td class="seat-status" data-status="<?php echo ($data["status"]); ?>">
          <?php echo ($data["status"]); ?>
        </td>
        <td>
          <button data-target="#orderSeat-modal" data-keyboard="false" class="sui-btn btn-lg order-seat-btn" data-id="<?php echo ($data["id"]); ?>" data-status="<?php echo ($data["status"]); ?>">预定</button>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<!-- Modal-->
<div id="orderSeat-modal" tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade" width="600px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
        <h4 id="myModalLabel" class="modal-title">座位预定</h4>
      </div>
      <div class="modal-body" style="height:300px;">
        <!-- 弹窗内容 -->
        <form class="sui-form form-horizontal sui-validate myform form-margin" id="seat-order-form">

          <div class="control-group">
            <label for="name" class="control-label">请填写姓名：</label>
            <div class="controls">
              <input type="text" class="input-large input-fat" placeholder="姓名" data-rules="required" name="ordername" value="" id="ordername">
            </div>
          </div>

          <div class="control-group">
            <label for="mobile" class="control-label">请填写手机号码：</label>
            <div class="controls">
              <input type="text" class="input-large input-fat" placeholder="手机号码" data-rules="required|mobile" value="" id="orderphone">
            </div>
          </div>
          <div class="control-group">
            <label for="mobile" class="control-label">备注: </label>
            <div class="controls">
              <textarea name="name" rows="8" cols="30" placeholder="备注时间、人数等" data-rules="required" id="seat-bz"></textarea>
              <!-- <input type="text" class="input-large input-fat zl-phone" > -->
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="sui-btn btn-primary btn-large" id="order-seat-okok">确定</button>
        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
      </div>
    </div>
  </div>
</div>
<div class="orderresult">
  <input type="hidden" id="result-seatid">
</div>
<script>
  $(".seat-pos").each(function() {
    if ($(this).attr("data-pos") == '1') {
      $(this).html("包间");
    } else {
      $(this).html("大厅");
    }
  })
  $(".seat-status").each(function() {
    if ($(this).attr("data-status") == '1') {
      $(this).parent().find(".order-seat-btn").addClass("disabled");
    } else {
      $(this).parent().find(".order-seat-btn").attr({
        "data-toggle": "modal"
      });
    }
  })

  var sendId = 0;
  $(".order-seat-btn").unbind("click");
  $("body").on("click", ".order-seat-btn", function() {
    var status = $(this).attr("data-status");
    var id = $(this).attr("data-id");
    sendId = id;
    if (status == '1') {
      return;
    }
  });
  $("#order-seat-okok").unbind("click");
  $("body").on("click", "#order-seat-okok", function() {
    var that = $(this);
    var ok = true;
    if ($("#ordername").val() == "") {
      alert("请填写姓名");
      ok = false;
      return;
    }
    if ($("#orderphone").val() == "") {
      alert("请填写号码");
      ok = false;
      return;
    }
    if ($("#seat-bz").val() == "") {
      alert("请填写备注");
      ok = false;
      return;
    }
    if (!(/^1\d{10}$/.test($("#orderphone").val()))) {
      alert("请填写正确手机号码");
      ok = false;
      return;
    }
    if (ok) {
      $.ajax({
        url: "Dcan/check",
        type: "POST",
        dataType: "json",
        async: true,
        data: {
          "id": sendId,
        },
        beforeSend: function() {
          $("#loading").show();
        },
        success: function(data) {
          if (data.info == "ok") {
            $.ajax({
              url: "Dcan/orderSeat",
              type: "POST",
              dataType: "json",
              async: true,
              data: {
                "seatid": sendId,
                "gkname": $("#ordername").val(),
                "gkphone": $("#orderphone").val(),
                "gkbz": $("#seat-bz").val(),
              },
              beforeSend: function() {
                $("#orderSeat-modal").attr({
                  "aria-hidden": "true"
                });
                $("#orderSeat-modal").hide();
                $(".sui-modal-backdrop").hide();
              },
              success: function(data) {
                var result = data;
                $("#loading").hide();
                $("#result-orderseat-id").html(result.info);
                $("#result-seatid").val(sendId);
                $(".mask").show();
              }
            })
          } else {
            alert(data.info);
          }
        },
        error: function() {
          $("#loading").hide();
        }
      });
    }

  });
  $("#search-seatid").unbind("click");
  $("body").on("click", "#search-seatid", function() {
    var ok = true;
    var seatid = $("#input-seatid").val();
    if (seatid == "") {
      alert("请填写！");
      ok = false;
      return;
    }
    if (ok) {
      $.ajax({
        url: "Dcan/orderSeat",
        type: "GET",
        data: {
          "search": "id=" + seatid,
        },
        success: function(data) {
          $("#orderSeat").html(data);
        },
        error: function() {

        }
      })
    }

  });
  $("#search-status").unbind("click");
  $("body").on("click", "#search-status", function() {
    var ok = true;
    var status = $("#input-status").val();
    if (status == "") {
      alert("请填写！");
      ok = false;
      return;
    }
    if (ok) {
      $.ajax({
        url: "Dcan/orderSeat",
        type: "GET",
        data: {
          "search": "status=" + status,
        },
        success: function(data) {
          $("#orderSeat").html(data);
        },
        error: function() {

        }
      })
    }

  });
  $("#search-pos").unbind("click");
  $("body").on("click", "#search-pos", function() {
    var ok = true;
    var pos = $("#input-pos").val();
    if (pos == "") {
      alert("请填写！");
      ok = false;
      return;
    }
    if (pos == "包间") {
      pos = 1;
    } else if (pos == "大厅") {
      pos = 0;
    } else {
      alert("请正确填写");
      ok = false;
      return;
    }
    if (ok) {
      $.ajax({
        url: "Dcan/orderSeat",
        type: "GET",
        data: {
          "search": "pos=" + pos,
        },
        success: function(data) {
          $("#orderSeat").html(data);
        },
        error: function() {

        }
      })
    }

  });
  $("#search-all").unbind("click");
  $("body").on("click", "#search-all", function() {
    $.ajax({
      url: "Dcan/orderSeat",
      type: "GET",
      success: function(data) {
        $("#orderSeat").html(data);
      },
      error: function() {

      }
    })
  })
</script>