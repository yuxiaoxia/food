<?php if (!defined('THINK_PATH')) exit();?><div class="sui-msg msg-info">
    <div class="msg-con">座位状态为0表示该座位未被顾客选择，0为默认状态</div>
    <s class="msg-icon"></s>
</div>
<br><br>
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
          <?php else: ?>
            大厅<?php endif; ?>
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
          <button class="sui-btn btn-lg" data-id="<?php echo ($data["id"]); ?>">修改座位状态</button>
          <a href="javascript:void(0);" class="sui-btn btn-default seat-del-btn" data-id="<?php echo ($data["id"]); ?>">删除</a>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<script>
//删除座位
$(".seat-del-btn").click(function() {
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
});
//编辑座位
$(".seat-edit-btn").click(function() {
  var id = $(this).attr("data-id"); //获取当前编辑的id
  $(".update-id").val(id);
  var url = "/food/index.php/Admin/Seat/update";
  var status = $(this).attr("data-status")
  if (status == 1) {
    alert("座位被占用不能编辑！");
    return fasle;
  }
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
});
</script>