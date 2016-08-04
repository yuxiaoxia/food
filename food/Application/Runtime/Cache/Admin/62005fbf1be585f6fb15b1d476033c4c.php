<?php if (!defined('THINK_PATH')) exit();?><form class="sui-form sui-validate" id="rest-edit">
  <input type="hidden" name="id">
  <table class="sui-table table-bordered">
    <?php if(is_array($data1)): foreach($data1 as $key=>$data1): ?><tr>
        <td style="width: 100px;">餐厅名称</td>
        <td><input type="text" name="name" class="input-medium" value="<?php echo ($data1["name"]); ?>" data-rules="required"></td>
      </tr>
      <tr>
        <td style="width: 100px;">餐厅注册时间</td>
        <td><input type="date" name="time" class="input-medium" value="<?php echo ($data1["time"]); ?>" data-rules="required"disabled="true"></td>
      </tr>
      <tr>
        <td style="width: 100px;">创始人</td>
        <td><input type="text" name="founders" class="input-medium" value="<?php echo ($data1["founders"]); ?>"data-rules="required"disabled="true"></td>
      </tr>
      <tr>
        <td style="width: 100px;">餐馆类型</td>
        <td><input type="text" name="type" class="input-xlarge" value="<?php echo ($data1["type"]); ?>" data-rules="required" style="width:90%">
        </td>
      </tr>
      <tr>
        <td style="width: 100px;">餐馆简介</td>
        <td>
          <textarea name="brief" rows="8" cols="140" data-rules="required" name="brief">
            <?php echo ($data1["brief"]); ?>
          </textarea>
        </td>
      </tr>
      <tr>
        <td style="width: 100px;">特色服务</td>
        <td><input type="text" name="feature" class="input-xlarge" value="<?php echo ($data1["feature"]); ?>" data-rules="required" style="width:90%"></td>
      </tr><?php endforeach; endif; ?>
    <tr>
      <td style="width: 100px;">餐厅图片</td>
      <td>
        <ul class="sui-row-fluid">
          <li class="span2">
            <div class="img-round">
              <img src="/food/Public/Static/images/rest/rest1.jpg" alt="">
            </div>
          </li>
          <li class="span2">
            <div class="img-round">
              <img src="/food/Public/Static/images/rest/rest2.jpg" alt="">
            </div>
          </li>
          <li class="span2">
            <div class="img-round">
              <img src="/food/Public/Static/images/rest/rest3.jpg" alt="">
            </div>
          </li>
          <li class="span2">
            <div class="img-round">
              <img src="/food/Public/Static/images/rest/rest4.jpg" alt="">
            </div>
          </li>
          <li class="span2" id="empty-img">
            <div class="img-round" id="img-desc">
              <label class="upload-label">
                <input class="hide" type="file" id="imgUpload">
                <img src="/food/Public/Admin/images/text.png" alt="" id="imginput">
              </label>
            </div>
          </li>
        </ul>
      </td>
    </tr>
</table>
<button type="button" class="sui-btn btn-primary" id="rest-edit-ok">确定</button>
<button type="button" class="sui-btn btn-primary" id="rest-edit-cancel">取消</button>
</form>
<script src="/food/Public/Admin/js/rest.js"></script>