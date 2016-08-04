<?php if (!defined('THINK_PATH')) exit();?><div id="rest-info">
  <table class="sui-table table-bordered">
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
        <td style="width: 100px;">餐厅名称</td>
        <td><?php echo ($data["name"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">餐厅注册时间</td>
        <td><?php echo ($data["time"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">创始人</td>
        <td><?php echo ($data["founders"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">餐馆类型</td>
        <td><?php echo ($data["type"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">餐馆简介</td>
        <td><?php echo ($data["brief"]); ?></td>
      </tr>
      <tr>
        <td style="width: 100px;">特色服务</td>
        <td>
          <?php echo ($data["feature"]); ?>
        </td>
      </tr>
      <tr>
        <td>图片展示</td>
        <td>
          <li class="span2">
            <div class="img-round">
              <img src="<?php echo ($data["img"]); ?>" alt="">
            </div>
          </li>
        </td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>