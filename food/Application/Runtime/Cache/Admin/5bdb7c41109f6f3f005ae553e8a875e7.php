<?php if (!defined('THINK_PATH')) exit();?><!-- Modal-->
<div id="edit-modal" tabindex="-1" role="dialog" data-width="large" data-hasfoot="false" class="sui-modal hide fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
        <h4 id="myModalLabel" class="modal-title">座位编辑</h4>
      </div>
      <div class="modal-body">
        <!-- 弹窗内容 -->
        <form class="sui-form form-horizontal sui-validate" style="margin-top: 40px;" id="seat-update">
          <input type="hidden" value="" name="id" class="update update-id">
          <div class="control-group">
            <label class="control-label v-top"><b style="color: #f00;">*</b>
              座位人数：
            </label>
            <div class="controls">
              <input value="" class="input-xlarge update updatenum" type="text" name="num"data-rules="required">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label v-top"><b style="color: #f00;">*</b>
              座位位置：
            </label>
            <div class="controls">
              <span class="sui-dropdown dropdown-bordered select" id="height-60">
                <span class="dropdown-inner">
                  <a id="select" role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
                  <input value="" name="pos" type="hidden" data-rules="required" class="update seat-pos">
                  <i class="caret"></i><span class="value">选择餐桌位置</span></a>
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
            <label class="control-label v-top"><b style="color: #f00;">*</b>座位描述：</label>
            <div class="controls">
              <input value="" class="input-xlarge update" type="text" name="desc">
            </div>
          </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large"id="ok">确定</button>
        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
      </div>
  </div>
  </div>
</div>
<script>

</script>