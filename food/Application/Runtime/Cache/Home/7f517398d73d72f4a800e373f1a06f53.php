<?php if (!defined('THINK_PATH')) exit();?><form class="sui-form form-horizontal sui-validate" style="margin-top: 40px;" id="seat-add-form">

  <div class="control-group">
    <label class="control-label v-top"><b style="color: #f00;">*</b>
      座位号：
    </label>
    <div class="controls">
      <input type="text" name="seatnum" class="input-xlarge addseatnum"  data-rules="required">
      <div class="sui-msg msg-tips msg-naked">
        <div class="msg-con">座位号必须为数字</div>
        <s class="msg-icon"></s>
      </div>
      <div class="sui-msg msg-error msg-clear help-block hide">
          <div class="msg-con">该项为必填项</div>
          <s class="msg-icon"></s>
      </div>
    </div>

  </div>
  <div class="control-group">
    <label class="control-label v-top"><b style="color: #f00;">*</b>
      座位位置：
    </label>
    <div class="controls">

      <span class="sui-dropdown dropdown-bordered select">
        <span class="dropdown-inner">
          <a id="select" role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
          <input value="" name="pos" type="hidden" data-rules="required">
          <i class="caret"></i><span>选择餐桌位置</span></a>
          <ul role="menu" aria-labelledby="drop4" class="sui-dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="大厅A区">大厅A区</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="大厅B区">大厅B区</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="大厅C区">大厅C区</a></li>
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
      <input class="input-xlarge addnum" type="text" name="num" data-rules="required">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label v-top"><b style="color: #f00;">*</b>座位描述：</label>
    <div class="controls">
      <input class="input-xlarge" type="text" name="desc" data-rules="required">
    </div>
  </div>
  <div class="btn-center">
    <button type="button" class="sui-btn btn-primary" id="seat-add-ok">确定</button>
  &nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="sui-btn btn-primary" id="seat-add-cancel">取消</button>
  </div>
</form>