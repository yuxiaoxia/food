<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>登录</title>
  <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
  <link rel="stylesheet" href="[cssSrc]">
  <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
</head>
<body>
  
<!-- 添加导航条 -->
<div class="sui-navbar">
  <div class="navbar-inner" id="my-nav"><a href="#" class="sui-brand">SUI</a>
    <ul class="sui-nav">
      <li class="active"><a href="#">首页</a></li>
      <li><a href="#">组件</a></li>
      <li class="sui-dropdown"><a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">其他 <i class="caret"></i></a>
        <ul role="menu" class="sui-dropdown-menu">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">关于</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">项目组成员</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">版权</a></li>
        </ul>
      </li>
    </ul>
    <ul class="sui-nav pull-right">
      <li><a href="#">个人中心</a></li>
      <li><a href="#">帮助</a></li>
    </ul>
  </div>
</div>
  <div class="sui-container">
   <ul class="sui-breadcrumb">
     <li><a href="#">待办事项</a></li>
     <li class="active">添加待办事项</li>
   </ul>
   <div class="sui-msg msg-large msg-block msg-success">
     <div class="msg-con">
       新的待办事项”晚上9点拿夜宵”创建成功！
     </div>
     <s class="msg-icon"></s>
   </div>
   <form class="sui-form form-horizontal sui-validate" action="" method="post" id="servingForm">
     <div class="control-group">
       <label class="control-label">名称：</label>
       <div class="controls">
         <input class="input-xlarge" type='text' data-rules="required|minlength=2|maxlength=50" />
       </div>
     </div>
     <div class="control-group">
       <label class="control-label">时间：</label>
       <div class="controls">
         <select class="input-medium " name='month' data-rules='required'>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">8</option>
           <option value="8">9</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
         </select>
         月
         <select class="input-medium " name='date' data-rules='required'>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">8</option>
           <option value="8">9</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
         </select>
         日
       </div>
     </div>
     <div class="control-group">
       <label class="control-label">补充说明：</label>
       <div class="controls">
         <textarea class='input-xlarge' data-rules='maxlength=100'></textarea>
       </div>
     </div>
     <div class="control-group">
       <div class="controls">
         <button class="sui-btn btn-primary btn-xlarge">创建待办事项</button>
       </div>
     </div>
   </form>
 </div>
 <!-- 引入底部文件 -->