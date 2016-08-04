<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>用户注册</title>
  <link rel="stylesheet" href="/food/Public/Home/css/sui.min.css">
  <script type="text/javascript" src="/food/Public/Home/js/jquery.min.js"></script>
  <script type="text/javascript" src="/food/Public/Home/js/sui.min.js"></script>
  <style>
    body {
      width: 100%;
      height: 100%;
      position: fixed;
      background: url("/food/Public/Home/images/bg.jpg");
      background-size: cover;
      font-size: 14px;
    }

    .myform {
      width: 640px;
      background: rgba(255, 255, 255, 0.3);
      margin: 0px auto;
      margin-top: 40px;
      overflow: hidden;
      cursor: pointer;
      border-radius: 10px;
      color: #333;
    }

    h2 {
      margin-top: 20px;
      text-align: center;
    }

    .myform >div {
      width: 90%;
      margin: 20px auto;
    }

    #register-form {
      height: 520px;
    }

    #register-form >div {
      margin: 48px auto;
    }
  </style>
</head>

<body>
  <form class="sui-form form-horizontal sui-validate myform" id="register-form">
    <h2>欢迎注册后台管理系统</h2>
    <div>
      <div class="control-group">
        <label for="name" class="control-label">姓名：</label>
        <div class="controls">
          <input type="text" class="input-xlarge input-fat" placeholder="姓名" data-rules="required" name="name">
        </div>
      </div>
      <div class="control-group">
        <label for="password" class="control-label">密码：</label>
        <div class="controls">
          <input type="password" class="input-xlarge input-fat" placeholder="3到8个字符" data-rules="required|minlength=3|maxlength=8" name="password">
        </div>
      </div>
      <div class="control-group">
        <label for="inputRepassword" class="control-label">重复密码：</label>
        <div class="controls">
          <input type="password" class="input-xlarge input-fat" namename="repassword" data-rules="required" placeholder="重复密码">
        </div>
      </div>
      <div class="control-group">
        <label for="mobile" class="control-label">手机号码：</label>
        <div class="controls">
          <input type="text" class="input-xlarge input-fat" placeholder="手机号码" data-rules="required|mobile" name="phone">
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
        <label for="card" class="control-label">住址：</label>
        <div class="controls">
          <input type="text" class="input-xlarge input-fat" placeholder="住址" data-rules="required" name="address">
        </div>
      </div>
      <div class="control-group">
        <label for="inputJob" class="control-label">职位: </label>
        <div class="controls">
          <label data-toggle="radio" class="radio-pretty inline checked">
            <input type="radio" name="root" value="0"><span>服务员</span>
          </label>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <button type="button" class="sui-btn btn-primary" id="register-btn">注册</button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="/food/index.php/Home/Login/login" class="sui-btn btn-default">登录</a>
        </div>
      </div>
    </div>
  </form>
  <script>
    var $form = $("#register-form");

    $("#register-btn").click(function() {
      var ok = true;
      $("input[type=text]").each(function() {
        if ($(this).val() == "") {
          ok = false;
          return;
        }
      });
      var password = $("input[name=password]").val();
      var repassword = $("input[namename=repassword]").val();
      if (password != repassword) {
        $form.validate("showError", "password", "两次密码输入不一致", "myerror");
        return;
      }
      if (ok) {
        $.ajax({
          type: 'POST',
          url: "/food/index.php/Home/Login/doregister",
          data: $('#register-form').serialize(),
          success: function(data) {
            if (data.status == '0') {
              if(  data.info == "该号码已存在"){
                $form.validate("showError", "phone", data.info, "myerror");
              }
              else{
                $form.validate("showError", "name", data.info, "myerror");
              }
            }
            else if (data.status == '1') {
              alert(data.info);
              window.location.href = "<?php echo U('login/login');?>";
            }

          }
        });
      }

    });
  </script>
</body>

</html>