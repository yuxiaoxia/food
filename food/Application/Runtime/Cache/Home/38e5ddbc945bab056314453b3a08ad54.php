<?php if (!defined('THINK_PATH')) exit();?><form class="sui-form form-horizontal sui-validate myform form-margin" id="updatezl-form">
<div class="control-group">
  <label for="password" class="control-label">原密码：</label>
  <div class="controls">
    <input type="password" class="input-xlarge input-fat" placeholder="请输入原密码" name="oldpass"data-rules="required|minlength=3|maxlength=8" id="update-oldpass">
  </div>
</div>
<div class="control-group">
  <label for="password" class="control-label">新密码：</label>
  <div class="controls">
    <input type="password" class="input-xlarge input-fat" placeholder="长度为3到8的字符" data-rules="required|minlength=3|maxlength=8" name="password" id="update-newpass">
  </div>
</div>
<div class="control-group">
    <label for="inputRepassword" class="control-label">重复密码：</label>
    <div class="controls">
      <input type="password" class="input-xlarge input-fat" name="repassword" data-rules="required" placeholder="重复密码" id="update-repass">
    </div>
</div>
<div class="btn-center">
  <button type="submit" class="sui-btn btn-primary" id="update-pass-ok">确定</button>
  <button type="button" class="sui-btn btn-primary" id="update-pass-cancel">取消</button>
</div>
</form>
<script>
var $form  = $("#updatezl-form");
$("#update-pass-ok").click(function(){
    if($("#update-oldpass").val() == ""){
      $form.validate("showError", "oldpass", "请输入原密码", "myerror");
      return;
    }
    if($("#update-newpass").val() == ""){
      return;
    }
    if($("#update-repass").val() == ""){
      return;
    }
    if($("#update-newpass").val() != $("#update-repass").val()){
        $form.validate("showError", "password", "两次密码输入不一致", "myerror");
      return;
    }
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Home/User/doupdatepass",
      data: {
        "password": $("#update-oldpass").val(),
        "repassword": $("#update-newpass").val(),
      },
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
// $form.validate("showError", "username", "", "myerror");
</script>