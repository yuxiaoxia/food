$(document).ready(function() {


  // 获取点击的分类，若没有则显示全部分类
  var fenlei = window.location.hash;
  //如果没有指定分类，默认显示全部分类
  switch (fenlei) {
    case "#中餐":
      $("#list-title").html("中餐<i></i>");
      getCp(1);
      break;
    case "#异国风味":
      $("#list-title").html("异国风味<i></i>");
      getCp(2);
      break;
    case "#小吃":
      $("#list-title").html("小吃<i></i>");
      getCp(3);
      break;
    case "#饮品":
      $("#list-title").html("饮品<i></i>");
      getCp(4);
      break;
    case "小吃<i></i>":
      pid = 3;
      break;
    case "饮品<i></i>":
      pid = 4;
      break;
    default:
    $("#list-title").html("全部分类<i></i>")
    getCp(0);
  }

  $("#list-title").tap(function() {
    $(".sub-list").toggle();
  });
  $(".sub-list li").each(function() {
    var title = $(this).text();
    $(this).tap(function() {
      $("#list-title").html(title + "<i></i>");
      $(".sub-list").hide();
      if ($(this).index() == 4) {
        getCp(0);
      } else {
        getCp($(this).index() + 1);
      }
    })
  });
  function foodsNone(){
    $(".goods-list").each(function(){
      if($(this).attr("data-status")==0){
        $(this).find(".foods-disabled").show();
      }
    });
  }

  //按价格排序
  $("#sort-price").tap(function() {

      var title = $("#list-title").html();
      var pid = 0;
      switch (title) {
        case "中餐<i></i>":
          pid = 1;
          break;
        case "异国风味<i></i>":
          pid = 2;
          break;
        case "小吃<i></i>":
          pid = 3;
          break;
        case "饮品<i></i>":
          pid = 4;
          break;
        default:
          pid = 0;
      }

      if ($(this).hasClass("down")) {
        $(this).removeClass("down");
        $(this).addClass("up");
        getCpSort(pid, "asc", "newprice")
      } else {
        $(this).removeClass("up");
        $(this).addClass("down");
        getCpSort(pid, "desc", "newprice")
      }
    })
    //按销量排序

  $("#sort-sold").tap(function() {

      var title = $("#list-title").html();
      var pid = 0;
      switch (title) {
        case "中餐<i></i>":
          pid = 1;
          break;
        case "异国风味<i></i>":
          pid = 2;
          break;
        case "小吃<i></i>":
          pid = 3;
          break;
        case "饮品<i></i>":
          pid = 4;
          break;
        default:
          pid = 0;
      }

      if ($(this).hasClass("down")) {
        $(this).removeClass("down");
        $(this).addClass("up");
        getCpSort(pid, "asc", "sold")
      } else {
        $(this).removeClass("up");
        $(this).addClass("down");
        getCpSort(pid, "desc", "sold")
      }
    })
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




  function getCp(pid) {
    var url = "http://www.wlx.com/food/App/get_food_list";
    $.ajax({
      type: 'post',
      url: url,
      data: {
        "pid": pid,
      },
      beforeSend: function() {
        loading("正在加载中");
      },
      success: function(data) {
        loadingHide();
        var list = JSON.parse(data);
        var list = MyApp.templates.list(list);
        $(".list-warp").html(list);
        foodsNone();
      },
      error: function() {
        loading("加载失败");
        loadingHide();
      }
    });
  }

  function getCpSort(pid, sort, by) {
    var url = "http://www.wlx.com/food/App/get_food_list";
    $.ajax({
      type: 'post',
      url: url,
      data: {
        "pid": pid,
        "by": by,
        "sort": sort,
      },
      beforeSend: function() {
        loading("正在加载中");
      },
      success: function(data) {
        loadingHide();
        var list = JSON.parse(data);
        var list = MyApp.templates.list(list);
        $(".list-warp").html(list);
        foodsNone();
      },
      error: function() {
        loading("加载失败");
        loadingHide();
      }
    });
  }

  function loading(str) {
    $("body").append("<div class='tip'>" + str + "</div>");

  }

  function loadingHide() {
    setTimeout(function() {
      $(".tip").remove();
    }, 2000);
  }









});
