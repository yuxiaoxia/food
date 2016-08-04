<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>用户登录</title>
  <!-- <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet"> -->
  <!-- <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script> -->
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
      width: 600px;
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
      margin-bottom: 40px;
      text-align: center;
    }

    .myform >div {
      width: 74%;
      margin: 20px auto;
    }

    #login-form {
      margin-top: 60px;
    }

    #login-form >div {
      margin: 48px auto;
    }
  </style>
</head>

<body>
  <form class="sui-form form-horizontal sui-validate myform" id="login-form" action="/food/index.php/Home/User/dologin" method="post">
    <div>
      <h2>欢迎登录后台管理系统</h2>
      <div class="control-group">
        <label for="name" class="control-label">姓名：</label>
        <div class="controls">
          <input type="text" class="input-large input-fat" placeholder="请输入姓名" data-rules="required" name="username" id="username">
        </div>
      </div>
      <div class="control-group">
        <label for="password" class="control-label">密码：</label>
        <div class="controls">
          <input type="password" class="input-large input-fat" placeholder="请输入密码" data-rules="required" name="password" id="password">
        </div>
      </div>
      <div class="control-group">
        <label for="password" class="control-label">
          <img src="/food/index.php/Home/User/verify" id="verifyImg" onclick="fleshVerify()" />
        </label>
        <div class="controls">
          <input type="text" class="input-large input-fat" placeholder="请输入验证码" data-rules="required" name="yzm" id="yzm">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <button type="submit" class="sui-btn btn-primary btn-large" id="login-btn">登录</button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="/food/index.php/Home/User/register" class="sui-btn btn-default">注册</a>
        </div>
      </div>

    </div>
  </form>
  <script>
    function fleshVerify() {
      //重载验证码
      var time = new Date().getTime();
      document.getElementById('verifyImg').src = "/food/index.php/Home/User/verify/" + time;
    }
    var $form = $("#login-form");
    //$form.validate("showError", "username", "", "myerror");
    //ajax提交登录
    // $("#login-btn").unblind("click");
    $("#login-btn").click(function() {
      var userName = $("#username").val();
      var passwd = $("#password").val();
      var verify_code = $("#yzm").val();
      var ok = true;
      if (passwd == '' || userName == '' || verify_code == '') {
        ok = false;
        // return false;
      }
      var url = '/food/index.php/Home/User/dologin';
      if (ok) {
        $.ajax({
          url: url,
          type: "POST",
          dataType: "json",
          async: true,
          data: {
            'userName': userName,
            'passwd': passwd,
            'verify_code': verify_code,
          },
          success: function(data) {
            if (data.status == 'error') {
              alert(data.message);
            } else if (data.status == 'success') {
              alert(data.message);
              window.location.href = "<?php echo U('index/index');?>";
            }
          }
        });

      };
      return false;
    });
    $(document).bind("keyup", function(e) {
      if (e.keyCode == 13) {
        $("#login-btn").click();
      }
    });
  </script>
</body>

</html>