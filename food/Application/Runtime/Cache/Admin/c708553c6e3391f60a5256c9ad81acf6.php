<?php if (!defined('THINK_PATH')) exit();?><table class="sui-table table-bordered">
  <thead>
    <tr>
      <th>菜品id</th>
      <th>菜品名称</th>
      <th>子分类名称</th>
      <th>月销量</th>
      <th>状态</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr>
        <td><?php echo ($data["id"]); ?></td>
        <td><a href="#"><?php echo ($data["cname"]); ?></a></td>
        <td><?php echo ($data["name"]); ?></td>
        <td><?php echo ($data["sold"]); ?></td>
        <td class="caipin-status"><?php echo ($data["cstatus"]); ?></td>
        <td>
          <button data-toggle="modal" data-target="#caipin-deatil-modal" data-keyboard="false" class="sui-btn btn-lg caipin-deatil-btn" data-id="<?php echo ($data["id"]); ?>">详情</button>
          <button class="sui-btn btn-lg del-caipin-btn" data-id="<?php echo ($data["id"]); ?>">删除</button>
          <button class="sui-btn btn-lg on-caipin-btn" data-id="<?php echo ($data["id"]); ?>">下架</button>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<div id="caipin-deatil-modal" tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade" style="width: 700px;"></div>
<script>

if($("#addcaipu").hasClass("active")){
  $(".uplaod").show();
}else{
  $(".uplaod").hide();
}
$(".caipin-status").each(function(){
  if($(this).html() == 0){
    $(this).parent().find(".on-caipin-btn").html("启用");
  }
  else{
    $(this).parent().find(".on-caipin-btn").html("下架");
  }
});
  $("body").on("click",".del-caipin-btn",function(){
    var delId = $(this).attr("data-id");
    var that = $(this);
    if(confirm("确定删除？")){
      $.ajax({
        type: 'POST',
        url: "/food/index.php/Admin/Caipu/delcaipin",
        data:{
          "id":delId,
        },
        beforeSend:function(){
          $("#loading").show();
        },
        success:function(data){
          $("#loading").hide();
          alert(data.info);
          that.parent().parent().remove()
        }
      });
    }
  })

  $("body").on("click",".on-caipin-btn",function(){
    var id = $(this).attr("data-id");
    var that = $(this);
    if($(this).html() == "下架"){

      $.ajax({
        type: 'POST',
        url: "/food/index.php/Admin/Caipu/caipinstatus",
        data:{
          "id":id,
          "status":0,
        },
        beforeSend:function(){
          $("#loading").show();
        },
        success:function(data){
          that.html("启用");
          that.parent().parent().find(".caipin-status").html("0");
          $("#loading").hide();
        }
      });
    }
    else{
      $.ajax({
        type: 'POST',
        url: "/food/index.php/Admin/Caipu/caipinstatus",
        data:{
          "id":id,
          "status":1,
        },
        beforeSend:function(){
          $("#loading").show();
        },
        success:function(data){
          that.html("下架");
          that.parent().parent().find(".caipin-status").html("1");
          $("#loading").hide();
        }
      });
    }
  });

  $("body").on("click",".caipin-deatil-btn",function(){
    $("#caipin-deatil-modal").html("");
    var showId = $(this).attr("data-id");
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Admin/Caipu/caipindetail",
      data:{
        "id":showId,
      },
      beforeSend:function(){
        $("#loading").show();
      },
      success:function(data){
        $("#caipin-deatil-modal").html(data);
        $ele = $("#caipin-deatil-modal");
        $ele.modal('resize');
        $("#loading").hide();
      }
    });
  })
  $("body").on("click","#update-caipu",function(){
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Admin/Caipu/updatecaipin",
      data:$("#caipin-edit-form").serialize(),
      success:function(data){
        alert(data.info);
      }
    });
  })
</script>