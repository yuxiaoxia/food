

var str = window.location.hash;
var id = str.slice(1);
getDetail(id);

$("body").on("tap",".add-goods",function(){
  $(".cut-goods").removeClass("btn-hide");
  $(".goods-num").removeClass("btn-hide");
  var count = parseInt($(".goods-total-num").html());
  var num = parseInt($(".goods-num").html());
  count += 1;
  num += 1;
  $(".goods-num").html(num);
  var price = parseInt( $("#save").attr("data-price"));
  var total = count * price;
  $(".goods-total-num").html(count);
  $("#totalmoney").html(total);
});
$("body").on("tap",".cut-goods",function(){
  $(".cut-goods").removeClass("btn-hide");
  $(".goods-num").removeClass("btn-hide");
  var num = parseInt($(".goods-num").html());
  var count = parseInt($(".goods-total-num").html());
  if (count <= 0) {
    $("body").append("<div class='tip'>已经不能再少了</div>");
    setTimeout(function() {
      $(".tip").remove();
    }, 4000);
  }
  else{
    count -= 1;
    num -= 1;
    $(".goods-num").html(num);
    $(".goods-total-num").html(count);
    var price = parseInt( $("#save").attr("data-price"));
    var total = count * price;
    $("#totalmoney").html(total);
  }
});


$("body").on("tap",".goBuy",function(){
  if(  $(".goods-total-num").html() == 0){
    $("body").append("<div class='tip'>请先选择</div>");
    setTimeout(function() {
      $(".tip").remove();
    }, 4000);
  }
  else{

    var num = $(".goods-total-num").html();
    var foodsid =  "foods"+$("#save").attr("data-id");

    var price =  $("#save").attr("data-price");
    var id = $("#save").attr("data-id");
    var name = $("#save").attr("data-name");

    var money = parseInt(num)*parseInt(price);


    var foods = {
      "id" : id,
      "num":num,
      "price":price,
      "money":money,
      "name":name,
      "bz":"",
    }

    localStorage.setItem(foodsid, JSON.stringify(foods));

    setTimeout(function() {
      window.location.href = "goodsList.html";
    }, 1000);
  }
})


function getDetail(id) {
  var url = "http://www.wlx.com/food/App/get_food_detail";
  $.ajax({
    type: 'post',
    url: url,
    data:{
      "id":id,
    },
    beforeSend: function() {
      loading("正在加载中");
    },
    success: function(data) {
      loadingHide();
      var detail =   JSON.parse(data);
      var list = MyApp.templates.detail(detail);
      $("#goodsDetail").html(list);

      // 获取session信息
      var getFood = "foods"+id;
      var food = localStorage.getItem(getFood);
      var food1 = JSON.parse(food);

      if(food1){
        var num = food1['num'];
        var money = food1['money'];
      }
      $(".goods-total-num").html(num);
      $("#totalmoney").html(money);
    },
    error:function(){
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
