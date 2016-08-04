<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>用户登录</title>
  <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
  <link href="/food/Public/Home/css/login.css" rel="stylesheet">
  <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
</head>
<body>
   <form class="sui-form form-horizontal sui-validate myform" id="login-form">
    <div>
      <div class="control-group">
        <label for="name" class="control-label">姓名：</label>
        <div class="controls">
          <input type="text" id="login-name" placeholder="请输入姓名" data-rules="required" name="name">
        </div>
      </div>
      <div class="control-group">
        <label for="password" class="control-label">密码：</label>
        <div class="controls">
          <input type="password" id="login-password" placeholder="请输入密码" data-rules="required" name="password">
        </div>
      </div>
      <div class="control-group">
        <label for="password" class="control-label">
          <img src="<?php echo U('verify');?>" id="verifyImg" onclick="fleshVerify()"/>
          <!-- <img src="http://www.wlx.com/food/index.php/Login-verify" onclick="fleshVerify()"/> -->
        </label>
        <div class="controls">
          <input type="text" placeholder="请输入验证码" data-rules="required" name="yzm">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <button type="submit" class="sui-btn btn-primary btn-large" id="login-btn">登录</button>
          <a href="http://www.wlx.com/food/index.php/Login/register" class="sui-btn btn-default" id="register-btn">注册</a>
        </div>
      </div>
    </div>
  </form>
<script>
function fleshVerify(){
  //重载验证码
  var time = new Date().getTime();
  document.getElementById('verifyImg').src= "<?php echo U('verify');?>";
}

</script>
</body>
</html>