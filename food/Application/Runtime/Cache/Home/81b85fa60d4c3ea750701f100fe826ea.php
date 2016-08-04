<?php if (!defined('THINK_PATH')) exit();?>
<table class="sui-table table-bordered">
  <thead>
    <tr>
      <th>座位id</th>
      <th>顾客姓名</th>
      <th>顾客手机号</th>
      <th>顾客备注信息</th>
      <th>是否点餐</th>
      <th>状态</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr id="">
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
        <td>
          <?php echo ($data["orderid"]); ?>
        </td>
        <td>
          <?php echo ($data["status"]); ?>
        </td>
        <td>
          <button data-toggle="modal" data-target="#orderSeat-modal" data-keyboard="false" class="sui-btn btn-lg order-seat-btn" data-id="<?php echo ($data["id"]); ?>" data-status="<?php echo ($data["status"]); ?>">确定</button>
          <button data-toggle="modal" data-target="#orderSeat-modal" data-keyboard="false" class="sui-btn btn-lg order-seat-btn" data-id="<?php echo ($data["id"]); ?>" data-status="<?php echo ($data["status"]); ?>">删除</button>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<!-- Modal-->
<div id="orderSeat-modal" tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade" width="500px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
        <h4 id="myModalLabel" class="modal-title">座位预定</h4>
      </div>
      <div class="modal-body"  style="height:230px;">
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
              <input type="text" class="input-large input-fat zl-phone" placeholder="手机号码" data-rules="required|mobile" name="phone" value="" id="orderphone">
            </div>
          </div>
          <div class="control-group">
            <label for="mobile" class="control-label">备注</label>
            <div class="controls">
              <input type="text" class="input-large input-fat zl-phone" placeholder="备注" data-rules="required" name="people" value="" id="seat-bz">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button"class="sui-btn btn-primary btn-large" id="order-seat-ok">确定</button>
        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
      </div>
    </div>
  </div>
</div>
<script>

</script>