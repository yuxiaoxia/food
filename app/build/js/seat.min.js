$(document).ready(function() {

  getSeat("大厅");

  $("body").on("tap", ".seat-canselect", function() {
    $(".seat-canselect").removeClass("seat-now");
    $(".seat-canselect").find(".seat-status").html("可选");
    $(this).addClass("seat-now");
    $(this).find(".seat-status").html("可选");
    var num = $(this).find("input").val();
    $(".btn").removeClass("btn-stop");
    $("#result").html(num);
  });

  $("body").on("tap", ".btn", function() {
    if ($(this).hasClass("btn-stop")) {
      tips("请先选择座位");
      return;
    }
    var guke = JSON.parse(localStorage.getItem("guke"));
    if( guke ){
      loading("你已经选座了!");
      loadingHide();
      return;
    }
    else{
      $(".mask").show();
      $(".pupop").hide();
      $("#seat-popup").show();

    }
  });
  $("body").on("tap", "#ok", function() {
    if ( ($("#name").val() == "") || ($("#phone").val() == "") || ($("#bz").val() == "") ) {
      alert("请填写");
      return;
    }
    if (!( /^1\d{10}$/.test($("#phone").val()))) {
      alert("手机号码有误");
      return;
    }
    //将座位号存储在session,顾客信息存到local

    var seatid = $(".seat-now").attr("data-id");
    var gkName = $("#name").val();
    var gkPhone = $("#phone").val();
    var gkBz = $("#bz").val();
    var seatDesc = $("#result").html();
    var guke = {
      "seatId":seatid,
      "seatDesc":seatDesc,
      "gkName":gkName,
      "gkPhone":gkPhone,
      "gkBz":gkBz,
    }
    localStorage.setItem("guke", JSON.stringify(guke));

    $(".mask").hide();
    $(".pupop").hide();
    $("#seat-popup").hide();
    tips("座位保存成功");
    window.location.href = "goodsList.html";
  });
  $("body").on("tap", "#no", function() {
    $(".mask").hide();
    $(".pupop").hide();
    $("#seat-popup").hide();
  });
  $("body").on("tap", ".close-btn", function() {
    $(".mask").hide();
    $(".pupop").hide();
    $("#seat-popup").hide();
  });

  $("body").on("tap", ".seat-tit", function() {
    $(".seat-tit").removeClass("seat-titnow");
    $(this).addClass("seat-titnow");
    var now = $(".seat-titnow").html();
    if (now == "大厅") {
      $("#seat-dating").show();
      $("#seat-yazuo").hide();
      getSeat("大厅");
    } else {
      $("#seat-yazuo").show();
      $("#seat-dating").hide();
      getSeat("包间");
    }
  });

  function tips(str) {
    $("body").append("<div class='tip'>" + str + "</div>");
    setTimeout(function() {
      $(".tip").remove();
    }, 3000);
  }

  function loading(str) {
    $("body").append("<div class='tip'>" + str + "</div>");

  }

  function loadingHide() {
    setTimeout(function() {
      $(".tip").remove();
    }, 2000);
  }

  function getSeat(pos) {
    var url = "http://www.wlx.com/food/App/show_seat";
    $.ajax({
      type: 'post',
      url: url,
      data: {
        "pos": pos,
      },
      beforeSend: function() {
        loading("正在加载中");
      },
      success: function(data) {
        loadingHide();
        var seat = JSON.parse(data);
        var list = MyApp.templates.seat(seat);
        if (pos == "大厅") {
          $("#seat-dating").html(list);
        } else {
          $("#seat-yazuo").html(list);
        }
        $(".seat-status").each(function() {
          if ($(this).html() == 0) {
            $(this).html("可选");
            $(this).parent().addClass("seat-canselect");
          } else if ($(this).html() == 1) {
            $(this).html("不可选");
            $(this).parent().addClass("seat-selected");
            $(this).next().attr("readOnly", "true");
          }
        });
      },
      error: function() {
        loading("加载失败");
        loadingHide();
      }
    });
  }







});
