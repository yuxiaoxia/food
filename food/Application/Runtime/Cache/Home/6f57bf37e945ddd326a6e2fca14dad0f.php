<?php if (!defined('THINK_PATH')) exit();?><!-- <form class="sui-form form-dark">
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