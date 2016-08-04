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
    <label data-toggle="radio" class="radio-pretty inline checked label">
      <input type="radio" name="sex" value="男" checked="checked" class="radio"><span>男</span>
    </label>
    <label data-toggle="radio" class="radio-pretty inline label">
      <input type="radio" name="sex" value="女" class="radio"><span>女</span>
    </label>
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
      // $form.validate("showError", "name", "请填写", "myerror");
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
      url: "System/updatezl",
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
</script>