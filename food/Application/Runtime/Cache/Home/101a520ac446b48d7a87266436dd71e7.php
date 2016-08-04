<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>欢迎来到后台管理系统</title>
  <link rel="stylesheet" href="/food/Public/Home/css/sui.min.css">
  <link rel="stylesheet" href="/food/Public/Home/css/common.css">
  <script type="text/javascript" src="/food/Public/Home/js/jquery.min.js"></script>
  <script type="text/javascript" src="/food/Public/Home/js/sui.min.js"></script>

<style>
.mycheckbox{
  display: inline-block;
  width: 16px;
  height: 16px;
  border: 2px solid #33475f;
  border-radius: 50%;
  box-sizing: border-box;
  margin-right: 6px;
  margin-bottom: -4px;
  cursor: pointer;
}
.mycheckbox-checked{
  background: url("/food/Public/Home/images/check.png") center center;
}
</style>
<!-- 添加导航条 -->
</head>
<body>
<div class="header">
  <div class="con-width">
    <div class="dl-title">
      欢迎来到华夏餐厅订餐系统
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/food/index.php/Admin/" title="进入管理系统" class="dl-log-quit" style="font-size:12px;">进入管理系统</a>
    </div>
    <div class="dl-log">欢迎您,
      <span class="dl-log-user"><?php echo (session('name')); ?></span>
      <a href="/food/index.php/Login/logout" title="退出系统" class="dl-log-quit">[退出]</a>
      <a href="/food/index.php/Login/logout" title="切换账号" class="dl-log-quit">[切换账号]</a>
    </div>
</div>
<div class="con-width dl-main-nav">
  <ul id="top-nav" class="nav-list">
      <li class="nav-item">
        <div class="nav-item-inner nav-home"><a href="/food/index.php/index.html">首页</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-caipu"><a href="/food/index.php/dcan.html">订座管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-orderfood"><a href="/food/index.php/orderfood.html">订餐管理</a></div>
      </li>
      <li>
        <div class="nav-item-inner nav-order"><a href="/food/index.php/order.html">订单管理</a></div>
      </li>
      <li class="nav-item">
        <div class="nav-item-inner nav-system"><a href="/food/index.php/user.html">账号管理</a></div>
      </li>
  </ul>
</div>
</div>

<div class="dl-con">
  <div class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      账号管理
      <div class="cutline"></div>
    </h4>
    <ul>
      <li data-slide="tab1" class="slide-tab">修改资料</li>
      <li data-slide="tab2" class="slide-tab">修改密码</li>
    </ul>
  </div>
  <div class="dl-tab-content">
    <div class="dl-nav-bar">
      <ul id="dl-nav-bar-tit">
        <li class="nav-bar-tit dl-nav-bar-select" data-slide="tab1">
          <span class="bar-tit">修改资料</span>
          <span class="sub-tab-closeBtn"></span>
        </li>
      </ul>
    </div>
    <div class="dl-nav-con">
      <div class="tab-content tab-wraped" id="tab-con">
        <div class="tab-pane active" data-slide="tab1" data-href="/food/index.php/Home/User/updatezl">
          <form class="sui-form form-horizontal sui-validate myform form-margin" id="updatezl-form">
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

        </div>
        <div class="tab-pane" data-slide="tab2" data-href="/food/index.php/Home/User/updatepass">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="sui-loading loading-inline loading" id="loading" style="display: none">
  <i class="sui-icon icon-pc-loading"></i>
  <span>正在加载中</span>
</div>
<script>
$(document).ready(function(){
    $(".nav-system").parent().addClass("dl-selected");
});
</script>
<!-- 引入底部文件 -->
<script>
  //设置内容高度
  var height = $(window).height()-68+"px";
  $(".dl-tab-slide").css({"min-height":height});
  $(".dl-nav-con").css({"min-height":height});
</script>
<script src="/food/Public/Home/js/common.js"></script>
<!-- <script src="/food/Public/Home/js/[js].js"></script> -->
</body>
</html>