$(document).ready(function() {
  //取消编辑
  $("#rest-edit-cancel").click(function() {
    window.location.reload();
  });
  //确定编辑
  $("#rest-edit-ok").click(function() {
    if ($("input[data-rules=required]").val() == "") {
      return;
    }
    if ($("textarea[data-rules=required]").html() == "") {
      return;
    }
    $.ajax({
      type: 'POST',
      url: "Index/Redit",
      data: $('#rest-edit').serialize(),
      success: function(data) {
        alert(data.info);
        window.location.reload();
      }
    });
  });
  //图片上传
  var img = "";
  $(".img-save").find("img").each(function() {
    img += $(this).attr("src") + ";";
  });
  $.ajax({
    type: 'POST',
    url: "Index/Addimg",
    data: {
      "imgsrc": img
    },
    success: function(data) {

    }
  });

  $(".close").click(function() {
    var src = $(this).siblings("img").attr("src");
    var that = $(this);
    if (confirm("确定删除吗？")) {
      var url = "__URL__/Delete";
      $.ajax({
        type: 'POST',
        url: url,
        data: {
          "src": src
        },
        success: function(data) {
          that.parent().parent().remove();
        }
      });
    }
  });

});
