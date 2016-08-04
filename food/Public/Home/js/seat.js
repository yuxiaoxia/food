$(document).ready(
  function(){

    if( !($("#edit-modal").length>0) ){
      $.ajax({
        type: 'get',
        url: "__URL__/edit",
        success:function(data){
            $("#table").after(data);
        }
      });
    }

    $(".slide-tab").each(function(){
      $(this).click(function(){
        if($(this).attr("href") == "#seat-add"){
            if($("#seat-add").find(".sui-loading").hasClass("loading")){
                $(this).removeClass("loading")
                $.ajax({
                  type: 'get',
                  url: "__URL__/add",
                  data:"",
                  success:function(data){
                    $("#seat-add").html(data);
                  }
                });
            }
        }
      });
    });
    //删除座位
    $(".seat-del-btn").click(function(){
        var id = $(this).attr("data-id");
        var nowTips = "#seat-"+id;
        var url = "__URL__/delete";
        if(confirm("确定删除？")){
          $.ajax({
            type: 'POST',
            url: url,
            data:{
              "id":id
            },
            success:function(data){
                alert(data.info);
                window.location.reload();
            }
          });
        }
    });

    //编辑座位
$(".seat-edit-btn").click(function(){
    var id = $(this).attr("data-id"); //获取当前编辑的id
    $(".update-id").val(id);

    var url = "__URL__/update";
    var status = $(this).siblings("input").val();
    if( status==1 ){
      alert("座位被占用不能编辑！");
      return fasle;
    }
    var val = $(this).siblings("input").val();
    var strs = val.split(";");
    $(".update").each(function(index){

        $(this).val(strs[index]);
        if(index==3){
          $(".value").text(strs[index]);
        }
    });

    $("#ok").click(function(){
      if($("input[data-rules=required]").val() == ""){
        return false;
      }
      // var seatnum = $(".updateseatnum").val().substring(0,1);
      // var num = $(".updatenum").val();
      // checkSeat(seatnum,num);
      $.ajax({
        type: 'POST',
        url: "__URL__/Update",
        data: $('#seat-update').serialize(),
        success:function(data){
            alert(data.info);
            window.location.reload();
        }
      });
    });
  });


//添加座位
$("body").on("click","#seat-add-ok",function(){
  var ok = true;
  var inputs = $("#seat-add-form input[data-rules=required]");

  inputs.each(function(index){
    $(this).removeClass("input-error");
    $(this).siblings(".msg-error").addClass("hide");
    if($(this).val() == ""){
      $(this).addClass("input-error");
      $(this).siblings(".msg-error").removeClass("hide");
      ok = false;
      return false;
    }
  });

  if( ok ){
    $.ajax({
      type: 'POST',
      url: "__URL__/add",
      data: $('#seat-add-form').serialize(),
      success:function(data){
          alert(data.info);
          // window.location.reload();
      }
    });
  }


});











});
