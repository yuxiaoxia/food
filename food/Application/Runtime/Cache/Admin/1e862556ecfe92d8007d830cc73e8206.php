<?php if (!defined('THINK_PATH')) exit();?><table class="sui-table table-bordered add-limit">
  <thead>
    <tr>
      <th>分类id</th>
      <th>分类名称</th>
      <th>上级分类id</th>
      <th>上级分类名称</th>
      <th>路径</th>
      <th>状态</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr>
        <td><?php echo ($data["id"]); ?></td>
        <td><a href="#"><?php echo ($data["name"]); ?></a></td>
        <td><?php echo ($data["pid"]); ?></td>
        <td><?php echo ($data["pid"]); ?></td>
        <td><?php echo ($data["path"]); ?></td>
        <td class="fenlei-status"><?php echo ($data["status"]); ?></td>
        <td>
          <!-- <button class="sui-btn btn-lg del-zifenlei-btn del-zifenlei-btn2" data-id="<?php echo ($data["id"]); ?>">删除</button> -->
          <button class="sui-btn btn-lg on-zifenlei-btn">下架</button>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>