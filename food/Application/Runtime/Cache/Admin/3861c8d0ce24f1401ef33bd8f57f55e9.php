<?php if (!defined('THINK_PATH')) exit();?><ul class="sui-breadcrumb">
  <li><a href="javascript:;" class="all-click">父分类</a></li>
  <li class="active"></li>
</ul>
<table class="sui-table table-bordered" id="table">
  <thead>
    <tr>
      <th>分类id</th>
      <th>分类名称</th>
      <th>上级分类</th>
      <th>路径</th>
      <th>状态</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody id="tbody">
    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr>
        <td><?php echo ($data["id"]); ?></td>
        <td><a href="javascript:;"><?php echo ($data["name"]); ?></a></td>
        <td><?php echo ($data["pid"]); ?></td>
        <td><?php echo ($data["path"]); ?></td>
        <td><?php echo ($data["status"]); ?></td>
        <td>
          <button data-toggle="modal" data-target="#addzifenlei-modal" data-keyboard="false" class="sui-btn btn-lg seat-edit-btn">添加子分类</button>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<!-- Modal-->
<div id="addzifenlei-modal" tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
        <h4 id="myModalLabel" class="modal-title">添加子分类</h4>
      </div>
      <div class="modal-body"  style="height:130px;">
        <!-- 弹窗内容 -->
        <form class="sui-form sui-validate myform" id="add-zifenlei">
          请选择分类：
          <span class="sui-dropdown dropdown-bordered select">
            <span class="dropdown-inner">
              <a role="button" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
              <input value="" name="fenlei" type="hidden" data-rules="required" disabled="">
              <i class="caret"></i><span>选择分类</span></a>
              <ul role="menu" aria-labelledby="drop4" class="sui-dropdown-menu" id="menu">
                <?php if(is_array($data1)): foreach($data1 as $key=>$data1): ?><li role="presentation" data-id="<?php echo ($data1["id"]); ?>">
                    <a role="menuitem" tabindex="-1" href="javascript:void(0);" value="<?php echo ($data1["name"]); ?>"><?php echo ($data1["name"]); ?></a>
                  </li><?php endforeach; endif; ?>
              </ul>
            </span>
            <input value="" name="error" type="hidden" data-rules="required">
          </span>
          <br>
          <br>
          <label for="">请填写子分类名称： </label>
          <input class="input-large input-fat addnum" type="text" name="zifenlei" data-rules="required">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large" id="add-ok">确定</button>
        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
      </div>
    </div>
  </div>
</div>
<script>

var $form  = $("#add-zifenlei");
// $form.validate("showError", "username", "", "myerror");
  $("#add-ok").click(function(){
    if($("input[name=fenlei]").val() == ""){
      $form.validate("showError", "error", "请选择", "myerror");
      return false;
    }
    if($("input[name=zifenlei]").val() == ""){
      $form.validate("showError", "zifenlei", "请填写", "myerror");
      return false;
    }
    var fenleiId = "";
    var fenleiName = $("input[name=fenlei]").val();
    var zifenleiName = $("input[name=zifenlei]").val();
    $("#menu").find("li").each(function(){
      if($(this).hasClass("active")){
        fenleiId = $(this).attr("data-id");
      }
    });
    $.ajax({
      type: 'POST',
      url: "/food/index.php/Admin/Caipu/addzifenlei",
      data: {
        "fenleiId": fenleiId,
        "fenleiName": fenleiName,
        "zifenleiName": zifenleiName,
      },
      beforeSend:function(){
        $("#loading").show();
      },
      success:function(data){
          $("#loading").hide();
          alert(data.info);
          window.location.reload();
      }
    });

  });
</script>