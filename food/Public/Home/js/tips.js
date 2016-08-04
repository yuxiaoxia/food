$(document).ready(
  function(){
    $(".nav-tips").parent().addClass("dl-selected");
    $('#add-modal').on('okHide', function(e){console.log('okHide')})
    $('#add-modal').on('okHidden', function(e){console.log('okHidden')})
    $('#add-modal').on('cancelHide', function(e){console.log('cancelHide')})
    $('#add-modal').on('cancelHidden', function(e){console.log('cancelHidden')})
    $(".tips-del-btn").click(function(){
        var id = $(this).siblings("input").val();
        var that = $(this);
        var nowTips = "#tips-"+id;
        var url = "Tips/delete";
        if(confirm("确定删除？")){
          $.ajax({
            type: 'POST',
            url: url,
            data:{
              "id":id
            },
            success:function(data){
                alert(data.info);
                that.parent().parent().remove()
                // window.location.reload();
            }
          });
        }
    });
    $(".tips-edit-btn").click(function(){
      var id = $(this).siblings("input").val(); //获取当前编辑的公告id
      var nowTips = "#tips-"+id;
      var nowTipsCon = "#tips-con-"+id;
      var con = $(this).parent().siblings().html();
      $("#add-modal").find("#edit-con").html(con);
      $("#add-modal").attr({"data-now-id":id});
      $("#edit-ok").click(function(){
        var content = $("#edit-con").val();
        var url = "Tips/update";
        if(content==""){
          alert("内容不能为空");
          return false;
        }
        else{
          $.ajax({
            type: 'POST',
            url: url,
            data:{
              "id":id,
              "con":content
            },
            success:function(data){
                alert(data.info);
                window.location.reload();
            }
          });
        }
      });
    });
  $("#add-btn").click(function(){
    var url = "Tips/add";
    $("#edit-ok").click(function(){
      var content = $("#edit-con").val();
      if(content==""){
        alert("内容不能为空");
        return false;
      }
      else{
        $.ajax({
          type: 'POST',
          url: url,
          data:{
            "con":content
          },
          success:function(data){
              alert(data.info);
              window.location.reload();
          }
        });
      }
    })
  });
  $(".tips-on-btn").click(function(){
    var id = $(this).attr("data-id");
    var that = $(this);
    if($(this).html() == "禁用"){

      $.ajax({
        type: 'POST',
        url: "Tips/status",
        data:{
          "id":id,
          "status":0,
        },
        success:function(data){
          that.html("启用");
          that.parent().parent().find(".tips-status").html("0");
        }
      });
    }
    else{
      $.ajax({
        type: 'POST',
        url: "Tips/status",
        data:{
          "id":id,
          "status":1,
        },
        success:function(data){
          that.html("禁用");
          that.parent().parent().find(".tips-status").html("1");
        }
      });
    }
  });
});
