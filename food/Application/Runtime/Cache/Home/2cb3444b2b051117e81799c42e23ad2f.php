<?php if (!defined('THINK_PATH')) exit();?><div class="sui-steps-round">
  <div class="finished">
    <div class="wrap">
      <div class="round"><i class="sui-icon icon-pc-right"></i></div>
      <div class="bar"></div>
    </div>
    <label>顾客下单</label>
  </div>
  <div class="current">
    <div class="wrap">
      <div class="round">2</div>
      <div class="bar"></div>
    </div>
    <label>服务员确认订单中</label>
  </div>
  <div class="todo">
    <div class="wrap">
      <div class="round">3</div>
      <div class="bar"></div>
    </div>
    <label>厨师配餐</label>
  </div>
  <div class="todo last">
    <div class="wrap">
      <div class="round">4</div>
    </div>
    <label>顾客用餐，订单完成</label>
  </div>
</div>
<!-- <form class="sui-form form-dark">
  <label for="num-search">订单号：</label>
  <div class="input-control control-right">
    <input type="text" name="num-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  <button type="button" class="sui-btn btn-primary" id="" style="margin-right:20px;">搜索</button>

  <label for="seat-search">座位号：</label>
  <div class="input-control control-right">
    <input type="text" name="seat-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  <button type="button" class="sui-btn btn-primary" id="" style="margin-right:20px;">搜索</button>

  <label for="phone-search">手机号：</label>
  <div class="input-control control-right">
    <input type="text" name="phone-search"><i class="sui-icon icon-touch-magnifier"></i>
  </div>
  <button type="button" class="sui-btn btn-primary" id="" style="margin-right:20px;">搜索</button>
</form> -->
<label for=""class="pull-left">
  <span class="mycheckbox "></span>全选
</label>

<label class="pull-left"style="margin-left:100px;">
  <button type="button" class="sui-btn del-order-btn">删除所选</button>
</label>
<br><br>
<?php if(is_array($order)): foreach($order as $key=>$order): ?><table class="sui-table table-bordered" id="<?php echo ($order["oid"]); ?>">
  <thead>
      <tr>
        <th colspan="6">
        <label class="pull-left">
          <span class="mycheckbox"></span>订单编号：<?php echo ($order["oid"]); ?>&nbsp;&nbsp;
        </label>
        <label class="pull-left">
          订座编号：<?php echo ($order["orderseatid"]); ?>&nbsp;&nbsp;
        </label>
        <label class="pull-left">
          座位号：<?php echo ($order["seatid"]); ?>&nbsp;&nbsp;
        </label>
        <label class="pull-left">
          菜品数量：<?php echo ($order["num"]); ?>&nbsp;&nbsp;
        </label>
        <label class="pull-left">
          菜品总价格：<?php echo ($order["money"]); ?>元&nbsp;&nbsp;
        </label>
        <a href="javascript:;"class="pull-left showdetail" data-orderid="<?php echo ($order["id"]); ?>">详情</a>
        <label class="pull-left" style="margin:0 30px;">
            <span class="pull-left">
              <a href="javascript;:" class="unhandled-order-ok-btn" data-id="<?php echo ($order["oid"]); ?>" data-orderseatid="<?php echo ($order["orderseatid"]); ?>" data-status="<?php echo ($order["ostatus"]); ?>">确认</a>
            </span>
        </label>
        <span class="pull-right">下单时间：<?php echo ($order["ordertime"]); ?></span>
        </th>
      </tr>
  </thead>
  <tbody class="order-list list-table hide"data-orderid="<?php echo ($order["orderseatid"]); ?>">
  <tr>
    <td colspan="6">
      <div>
        <a href="javascript:;">联系人：</a><?php echo ($order["gkname"]); ?>&nbsp;&nbsp;&nbsp;
        <a href="javascript:;">手机号码：</a><?php echo ($order["gkphone"]); ?>&nbsp;&nbsp;&nbsp;
        <a href="javascript:;">备注：</a><?php echo ($order["gkbz"]); ?>&nbsp;&nbsp;&nbsp;
      </div>
    </td>
  </tr>
  <?php if(is_array($order['food'])): foreach($order['food'] as $key=>$food): ?><tr>
      <td width="40%">
        <div class="typographic">
          <a href="#" class="block-text"><?php echo ($food["foodname"]); ?></a>
          <span>共：<?php echo ($food["foodnum"]); ?>份</span>
          <span class="pull-right">￥<?php echo ($food["foodprice"]); ?>/份</span>
        </div>
      </td>
      <td width="10%" class="center">小计：<?php echo ($food["foodtotalmoney"]); ?>元</td>
      <td width="30%" class="center">备注:<?php echo ($food["foodbz"]); ?></td>
      <td width="10%" class="center"><a href="#">删除</a></td>
    </tr><?php endforeach; endif; ?>
  </tbody>
</table><?php endforeach; endif; ?>
<script>
  $("body").on("click",".unhandled-order-ok-btn",function(){
    var oid = $(this).attr("data-id");
    var ostatus = $(this).attr("data-ostatus");
    var ok = true;
    if( ostatus == 1 ){
      ok = false;
      return;
    }
    if( ok ){
      ostatus = 1;
      $.ajax({
            url: "Order/orderStatus",
            type: "POST",
            dataType: "json",
            async: true,
            data: {
              "oid": oid,
              "ostatus":ostatus,
            },
            beforeSend:function(){
              $("#loading").show();
            },
            success: function(data) {
              $("#loading").hide();
              var removeid = "#"+oid;
              $(removeid).remove();
            }
      })
    }

  })

</script>