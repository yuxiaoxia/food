<?php if (!defined('THINK_PATH')) exit();?><form class="sui-form form-horizontal sui-validate myform form-margin" id="updatezl-form">
<?php if(is_array($updateUser)): $i = 0; $__LIST__ = $updateUser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$updateUser): $mod = ($i % 2 );++$i;?><div class="control-group">
  <label for="name" class="control-label">姓名：</label>
  <div class="controls">
    <input type="text" class="input-xlarge input-fat zl-name" placeholder="姓名" data-rules="required" name="name" value="<?php echo ($updateUser["name"]); ?>">
  </div>
</div>

<div class="control-group">
  <label for="mobile" class="control-label">手机号码：</label>
  <div class="controls">
    <input type="text" class="input-xlarge input-fat zl-phone" placeholder="手机号码" data-rules="required|mobile" name="phone" value="<?php echo ($updateUser["phone"]); ?>">
  </div>
</div>
<div class="control-group">
  <label for="inputGender" class="control-label">性别：</label>
  <div class="controls">
    <?php if($updateUser["sex"] == '男'): ?><span class="mycheckbox mycheckbox-checked"></span><?php echo ($updateUser["sex"]); ?>
      <span class="mycheckbox"></span>女
      <input type="radio" checked="" value="<?php echo ($updateUser["sex"]); ?>" name="sex" class="hide inputhide">
      <input type="radio" value="女" name="sex" class="hide inputhide">
    <?php else: ?>
      <span class="mycheckbox"></span>男
      <span class="mycheckbox mycheckbox-checked"></span>女
      <input type="radio" value="男" name="sex" class="hide inputhide">
      <input type="radio"  checked="" value="女" name="sex" class="hide inputhide"><?php endif; ?>

  </div>
</div>
<div class="control-group">
  <label for="card" class="control-label">住址: </label>
  <div class="controls">
    <input type="text" class="input-xlarge input-fat zl-address" placeholder="住址" data-rules="required" name="address" value="<?php echo ($updateUser["address"]); ?>">
  </div>
</div>
<div class="btn-center">
  <button type="button" class="sui-btn btn-primary" id="update-zl-ok">确定</button>
  <button type="button" class="sui-btn btn-primary" id="update-zl-cancel">取消</button>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</form>
<script>
var $form  = $("#updatezl-form");
$("#update-zl-ok").click(function(){
    if($(".zl-name").val() == ""){
      return;
    }
    if($(".zl-phone").val() == ""){
      return;
    }
    if($(".zl-address").val() == ""){
      return;
    }

    $.ajax({
      type: 'POST',
      url: "User/updatezl",
      data: $('#updatezl-form').serialize(),
      success:function(data){
        if( data.status == 1){
          alert(data.info);
          window.location.reload();
        }
        else{
          alert(data.info);
        }

      }
    });
});
$("body").on("click",".mycheckbox",function(){
  $(".mycheckbox").removeClass("mycheckbox-checked");
  $(this).addClass("mycheckbox-checked");
  var sex = $(this).index();
  $(".inputhide").each(function(){
    $(".inputhide").removeAttr("checked");
  });
  $(".inputhide").eq(sex).attr({"checked":""});
})
</script>