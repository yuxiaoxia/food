<?php if (!defined('THINK_PATH')) exit();?><!-- Modal-->
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
      <h4 id="myModalLabel" class="modal-title">菜品详情</h4>
    </div>
    <div class="modal-body" style="overflow-y: auto;max-height: 450px;">
      <!-- 弹窗内容 -->
      <form class="sui-form sui-validate myform form-margin" id="caipin-edit-form">
        <?php if(is_array($data)): foreach($data as $key=>$data): ?><input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
          <table class="sui-table table-bordered">
            <thead></thead>
            <tbody>
              <tr>
                <td width="50%">菜品名：</td>
                <td>
                  <input value="<?php echo ($data["cname"]); ?>" type="text" class="input-large input-fat" placeholder="请填写菜品名：" data-rules="required" name="Cname">
                </td>
              </tr>
              <tr>
                <td width="50%">菜品标题：</td>
                <td>
                  <input type="text" value="<?php echo ($data["title"]); ?>" class="input-large input-fat" placeholder="请填写菜品标题" data-rules="required" name="title">
                </td>
              </tr>
              <tr>
                <td width="50%">菜品最新价格</td>
                <td>
                  <input type="text" value="<?php echo ($data["newprice"]); ?>" class="input-large input-fat" placeholder="请填写菜品价格" data-rules="required" name="newprice">
                </td>
              </tr>
              <tr>
                <td width="50%">菜品原价格</td>
                <td>
                  <input type="text" value="<?php echo ($data["oldprice"]); ?>" class="input-large input-fat" placeholder="请填写菜品价格" name="oldprice">
                </td>
              </tr>
              <tr>
                <td width="50%">菜品口味：</td>
                <td>
                  <input type="text" value="<?php echo ($data["kouwei"]); ?>" class="input-large input-fat" placeholder="请填写菜品口味" name="kouwei">
                </td>
              </tr>
              <tr>
                <td width="50%">菜品烹饪时间：</td>
                <td>
                  <input type="text" value="<?php echo ($data["prtime"]); ?>"class="input-large input-fat" placeholder="请填写烹饪时间" name="prtime">
                </td>
              </tr>
              <tr>
                <td width="50%">菜品主料：</td>
                <td>
                  <input type="text" value="<?php echo ($data["zhuliao"]); ?>"class="input-large input-fat" placeholder="请填写菜品主料" name="zhuliao">
                </td>
              </tr>
              <tr>
                <td width="50%">菜品功效：</td>
                <td>
                  <input type="text" value="<?php echo ($data["gongxiao"]); ?>" class="input-large input-fat" placeholder="请填写菜品主料" name="gongxiao">
                </td>
              </tr>
              <tr>
                <td width="50%">菜品简介：</td>
                <td>
                  <textarea name="desc" value="" rows="6" cols="80">
                    <?php echo ($data["desc"]); ?>
                  </textarea>
                </td>
              </tr>
            </tbody>
          </table><?php endforeach; endif; ?>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large" id="update-caipu">确定</button>
      <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
    </div>
  </div>
</div>