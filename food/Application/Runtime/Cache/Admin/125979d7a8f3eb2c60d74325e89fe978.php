<?php if (!defined('THINK_PATH')) exit();?><form class="sui-form form-horizontal sui-validate" style="margin-top: 40px;" id="seat-add-form">
  <div class="control-group">
    <label class="control-label v-top"><b style="color: #f00;">*</b>
      座位位置：
    </label>
    <div class="controls">

      <span class="sui-dropdown dropdown-bordered select">
        <span class="dropdown-inner">
          <a id="select" role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
          <input value="" name="pos" type="hidden" data-rules="required" id="seat-pos">
          <i class="caret"></i><span>选择餐桌位置</span></a>
          <ul role="menu" aria-labelledby="drop4" class="sui-dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="大厅">大厅</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation" class="active"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="包间">包间</a></li>
          </ul>
        </span>
      </span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label v-top"><b style="color: #f00;">*</b>
      座位数量：
    </label>
    <div class="controls">
      <input class="input-xlarge addnum" type="text" name="num" data-rules="required" id="zwnum">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label v-top"><b style="color: #f00;">*</b>
      包间费：
    </label>
    <div class="controls">
      <input class="input-xlarge addnum" type="text" name="bjf" data-rules="required" value="0" id="bjf">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label v-top"><b style="color: #f00;">*</b>座位描述：</label>
    <div class="controls">
      <input class="input-xlarge" type="text" name="desc" data-rules="required" id="zwdesc">
    </div>
  </div>
  <div class="btn-center">
    <button type="button" class="sui-btn btn-primary" id="seat-add-ok">确定</button>
  &nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="sui-btn btn-primary" id="seat-add-cancel">取消</button>
  </div>
</form>
<script>
var $form = $("#seat-add-form");
//添加座位
$("body").on("click", "#seat-add-ok", function() {
  if ($("#seat-pos").val() == "") {
    alert("请选择餐厅位置！");
    return;
  }

  if ($("#zwnum").val() == "") {
    alert("请填写座位人数！");
    return;
  }
  if ($("#zwdesc").val() == "") {
    alert("请填写座位描述！");
    return;
  }
  $.ajax({
    type: 'POST',
    url: "/food/index.php/Admin/Seat/Add",
    data: $('#seat-add-form').serialize(),
    success: function(data) {
      alert(data.info);
     window.location.reload();
    }
  });
});
</script>