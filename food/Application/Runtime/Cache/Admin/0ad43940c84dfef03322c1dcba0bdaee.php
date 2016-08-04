<?php if (!defined('THINK_PATH')) exit();?><div class="sui-msg msg-tips">
  <div class="msg-con">角色为0表示该用户是普通用户，即餐厅服务员，角色为1表示该用户是管理员，即大厅经理</div>
  <s class="msg-icon"></s>
</div><br><br>
<table class="sui-table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>姓名</th>
      <th>性别</th>
      <th>角色</th>
      <th>手机号码</th>
      <th>住址</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($user)): foreach($user as $key=>$user): ?><tr>
        <td class="user-id">
          <?php echo ($user["userid"]); ?>
        </td>
        <td>
          <?php echo ($user["name"]); ?>
        </td>
        <td>
          <?php echo ($user["sex"]); ?>
        </td>
        <td class="userroot">
          <?php echo ($user["root"]); ?>
        </td>
        <td>
          <?php echo ($user["phone"]); ?>
        </td>
        <td>
          <?php echo ($user["address"]); ?>
        </td>
        <td>
          <a href="javascript:void(0);" class="sui-btn user-del-btn" data-userid="<?php echo ($user["userid"]); ?>">删除</a>
          <a href="javascript:void(0);" class="sui-btn update-root-btn" data-userid="<?php echo ($user["userid"]); ?>" data-userroot="<?php echo ($user["root"]); ?>">修改权限</a>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
  <input type="hidden" value="<?php echo ($root); ?>" id="root">
</table>
<script>
  $('#add-modal').on('okHide', function(e){console.log('okHide')})
  $('#add-modal').on('okHidden', function(e){console.log('okHidden')})
  $('#add-modal').on('cancelHide', function(e){console.log('cancelHide')})
  $('#add-modal').on('cancelHidden', function(e){console.log('cancelHidden')})
  $(".user-del-btn").click(function(){
      var id = $(this).attr("data-userid");
      var that = $(this);
      var url = "/food/index.php/Admin/Index/deluser";
      if(confirm("确定删除？")){
        $.ajax({
          type: 'POST',
          url: url,
          data:{
            "id":id
          },
          success:function(data){
              alert(data.info);
              that.parent().parent().remove();
          }
        });
      }
  });
  $(".update-root-btn").unbind("click");
  $("body").on("click",".update-root-btn",function(){
    var root = $("#root").val();
    var updateroot = 0;
    if( root == "1" ){
      alert("您没有操作权限!");
      return;
    }
    else{
      var nowroot = $(this).attr("data-userroot");
      var id = $(this).attr("data-userid");
      var that = $(this).parent().parent().find(".userroot");
      if( nowroot == "0" ){
        updateroot = 1;
      }
      else{
        updateroot = 0;
      }
      $.ajax({
        type: 'POST',
        url: "/food/index.php/Admin/Index/updateroot",
        data:{
          "id":id,
          "root":updateroot,
        },
        success:function(data){
            alert(data.info);
            that.html(updateroot);
        }
      });
    }
  })
</script>