<?php if (!defined('THINK_PATH')) exit();?><div class="sui-msg msg-info">
    <div class="msg-con">座位状态为0表示该座位未被顾客选择，0为默认状态</div>
    <s class="msg-icon"></s>
</div>
<br><br>
<form class="sui-form form-dark">
  <label for="order-search">座位号：</label>
  <div class="input-control control-right">
    <input type="text" name="order-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  &nbsp;&nbsp;
  <button type="button" data-ok="modal" class="sui-btn btn-primary" id="">搜索</button>
&nbsp;&nbsp;&nbsp;&nbsp;
  <label for="order-search">座位状态：</label>
  <div class="input-control control-right">
    <input type="text" name="order-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  &nbsp;&nbsp;
  <button type="button" data-ok="modal" class="sui-btn btn-primary" id="">搜索</button>
</form>
<table class="sui-table table-bordered" id="table">
  <thead>
    <tr>
      <th>座位id</th>
      <th>座位号</th>
      <th>座位人数</th>
      <th>包间费</th>
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
        <td class="num">
          <?php echo ($data["num"]); ?>
        </td>
        <td class="bjf">
          <?php echo ($data["bjf"]); ?>
        </td>
        <td class="pos">
          <?php echo ($data["pos"]); ?>
        </td>
        <td class="desc">
          <?php echo ($data["desc"]); ?>
        </td>
        <td class="status">
          <?php echo ($data["status"]); ?>
        </td>
        <td>
          <input type="hidden" value="<?php echo ($data["id"]); ?>;<?php echo ($data["seatnum"]); ?>;<?php echo ($data["num"]); ?>;<?php echo ($data["pos"]); ?>;<?php echo ($data["bjf"]); ?>;<?php echo ($data["desc"]); ?>">
          <button data-toggle="modal" data-target="#edit-modal" data-keyboard="false" class="sui-btn btn-lg seat-edit-btn" data-id="<?php echo ($data["id"]); ?>">编辑</button>
          <a href="javascript:void(0);" class="sui-btn btn-default seat-del-btn" data-id="<?php echo ($data["id"]); ?>">删除</a>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>