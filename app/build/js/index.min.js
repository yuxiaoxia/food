$(document).ready(
  function(){
    var orderid = localStorage.getItem("orderid");
    if( orderid ){
      $.ajax({
          type: 'POST',
          url: "http://www.wlx.com/food/App/searchOrder",
          data:{
            "orderid":orderid,
          },
          success:function(data){
            var data =  JSON.parse(data);
            if(data.status== 0){
              localStorage.clear();
            }
            else{
              if(data.info == 2){
                localStorage.clear();
              }
            }
          },
          error:function(){

          }
      });
    }
    // 获取推荐菜单
    var url = "http://www.wlx.com/food/App/showTopfood";
    $.ajax({
      type: 'get',
      url: url,
      success: function(data) {
        var list = JSON.parse(data);
        var list = MyApp.templates.list(list);
        $("#foodlist").html(list);
        foodsNone();
      },
      error:function(){
        loading("加载失败");
        loadingHide();
      }
    });

  //详情展示
  $("body").on("tap", ".goods-list", function() {
    $(this).tap(function() {
      var status = $(this).attr("data-status");
      var id = $(this).attr("data-id");
      var ok = true;
      if( status == "0" ){
        ok = false;
      }
      if( ok ){
        window.location.href = "goodsDetail.html#" + id;
      }
    });
  })
  function foodsNone(){
    $(".goods-list").each(function(){
      if($(this).attr("data-status")==0){
        $(this).find(".foods-disabled").show();
      }
    });
  }

    //子菜单
    $(".car").tap(function(){
        window.location.href = "buyNow.html";
    });
    $(".menu").on("tap", function () {
        $(".sub-menu").toggle();
    });
    var seatId ;
    var guke = JSON.parse(localStorage.getItem("guke"));
    if( guke ){
      seatId = guke.seatId;
    }
    if( seatId ){
      $(".seat-num").html(seatId);
      $(".seat").tap(function(){
        window.location.href = "buyNow.html";
      });
    }else{
      $(".seat-num").html("未选");
      $(".seat").tap(function(){
        window.location.href = "seat.html";
      });
    }
    //公告栏
    (function(){
      var notice = $("#notice");
      var url = "http://www.wlx.com/food/App/show";
      $.ajax({
          type: 'GET',
          url: url,
          success:function(data){
            var data1 =  JSON.parse(data);
            for(var i=0;i<data1.length;i++){

              var con = "<div class='swiper-slide notice-main'>" + data1[i].con + "</div>";
              notice.append(con);
            }
            var mySwiper2 = new Swiper('.swiper-container2', {
                loop: true,
                autoplay: 2500,
                direction: 'vertical',
            });
          }
      });

    })();
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: 3000,
        pagination: '.swiper-pagination',
    });

    (function () {
        $("#askService").on("tap", function () {
          $(".mask").show();

          $("#service-popup").show()
        });

        $(".close-btn").on("tap",function(){
            $(".mask").hide();
        });

    })();

    //申请打折
    (function(){
        $("#askCut").on("tap", function () {
            console.log("a");
            $(".tip").remove();
            $("body").append("<div class='tip'>该功能尚未完善</div>");
            setTimeout(function () {
                $(".tip").remove();
            },5000);
        });
    })();

  }
);
