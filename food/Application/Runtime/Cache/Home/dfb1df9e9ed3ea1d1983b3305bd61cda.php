<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头文件 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>欢迎来到后台管理系统</title>
  <link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css"> -->
  <link rel="stylesheet" href="/food/Public/Home/css/common.css">
  <link href="/food/Public/Home/css/index.css" rel="stylesheet">
  <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
</head>
<body>
  <!-- 添加导航条 -->
  <div class="header">
    <div class="con-width">
      <div class="dl-title">
        欢迎来到华夏餐厅
      </div>
      <div class="dl-log">欢迎您,
        <span class="dl-log-user">root</span>
        <a href="javascrip:;" title="退出系统" class="dl-log-quit">[退出]</a>
        <a href="http://www.chihuo.com/tp/index.php/login" title="切换账号" class="dl-log-quit">[切换账号]</a>
      </div>
  </div>
  <div class="con-width dl-main-nav">
    <ul id="top-nav" class="nav-list">
    		<li class="nav-item">
          <div class="nav-item-inner nav-home"><a href="index.html">系统管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-orderseat"><a href="seat.html">桌台管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-order"><a href="order.html">订单管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-caipu"><a href="caipu.html">菜谱管理</a></div>
        </li>
        <li>
          <div class="nav-item-inner nav-tips"><a href="tips.html">首页公告</a></div>
        </li>
        <li><div class="nav-item-inner nav-seat"><a href="news.html">意见反馈</a></div>
        </li>
    </ul>
  </div>
</div>

<div class="dl-con">
  <div id="" class="con-width dl-tab-slide">
    <h4 class="nav-tit">
      公告内容
      <div class="cutline"></div>
    </h4>
    <ul class="tab-wraped tab-vertical">
      <li class="fist-li active">
        <a href="" data-toggle="tab" data-slide="tab1" class="slide-tab">
        公告内容
        </a>
      </li>
    </ul>
  </div>
  <div class="dl-tab-content">
      <div class="dl-nav-bar">
        <ul id="dl-nav-bar-tit">
          <li class=" nav-bar-tit dl-nav-bar-select" data-slide="tab1">
            <span class="bar-tit">公告内容</span>
            <span class="sub-tab-closeBtn"></span>
          </li>
        </ul>
      </div>
      <div class="dl-nav-con">
        <div class="tab-content tab-wraped">
          <div id="seat-list" class="tab-pane active">
            <form class="sui-form">
              <table class="sui-table table-bordered">
                <thead>
                   <tr>
                     <th>公告内容</th>
                     <th>操作</th>
                   </tr>
                </thead>
                <tbody>
                  <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr id="tips-<?php echo ($data["id"]); ?>">
                      <td id="tips-con-<?php echo ($data["id"]); ?>"><?php echo ($data["con"]); ?></td>
                      <td>
                        <input type="hidden"value="<?php echo ($data["id"]); ?>">
                        <button data-toggle="modal" data-target="#add-modal" data-keyboard="false" class="sui-btn btn-lg tips-edit-btn">编辑</button>
                        <a href="javascript:void(0);" class="sui-btn btn-default tips-del-btn">删除</a>
                      </td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
              </table>
              <button data-toggle="modal" data-target="#add-modal" data-keyboard="false" class="sui-btn btn-lg" id="add-btn">添加</button>
            </form>
              <!-- Modal-->
              <div id="add-modal" tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                      <h4 id="myModalLabel" class="modal-title">公告内容编辑</h4>
                    </div>
                    <div class="modal-body">
                      <!-- 弹窗内容 -->
                      <form class="sui-form form-horizontal sui-validate">
                          <div class="control-group">
                            <label for="inputCon" class="control-label">公告内容</label>
                            <div class="controls">
                              <textarea name="con" data-rules="required" rows="5" cols="60" id="edit-con"></textarea>
                            </div>
                          </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large" id="edit-ok">确定</button>
                      <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                    </div>
                  </div>

              </div>
            </div>
        </div>
</div>
<script src="/food/Public/Home/js/tips.js"></script>
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