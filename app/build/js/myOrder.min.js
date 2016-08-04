//获取保存的顾客信息

var guke = JSON.parse(localStorage.getItem("guke"));
var orderid = localStorage.getItem("orderid");
if( guke && orderid ){
  $("#seatnum").html(guke.seatId);
  $(".seat-desc").html(guke.seatDesc);
  $(".seat-gk").html(guke.gkName + "/" + guke.gkPhone);
  $(".gk-bz").html(guke.gkBz);
  $("#orderid").html(orderid);
}
if( orderid ){
  $.ajax({
      type: 'POST',
      url: "http://www.wlx.com/food/App/searchOrder",
      data:{
        "orderid":orderid,
      },
      success:function(data){
        var data =  JSON.parse(data);
        if(data.status==0){

        }else{
          if(data.info == 0){
            $("#show").html("订餐信息已提交了请稍后。。。");
          }
          if(data.info == 1){
            $("#show").html("厨师已经配餐了，请稍后。。。");
          }
          if(data.info == 2){
            localStorage.clear();
          }
        }
      },

  });
}
//获取点菜详情
var dataFood = [];
for (var i = localStorage.length - 1; i >= 0; i--) {
  var s = localStorage.key(i);
  if (s.substring(0, 5) == "foods") {
    var food = JSON.parse(localStorage.getItem(localStorage.key(i)));
    dataFood.push(food);
  }
}
if( dataFood.length == 0 ){

}
else if( dataFood.length!=0){
  var list = MyApp.templates.order(dataFood);
  $("#order-list").html(list);
  calTotal();
}

function calTotal() {
  var allNum = 0;
  var allMoney = 0;
  $(".selected-list").each(function() {
    var num = parseInt($(this).attr("data-num"));
    var money = parseInt($(this).attr("data-money"));
    allNum += num;
    allMoney += money;
  })
  $("#total-money").html(allMoney);
  $("#total-num").html(allNum);
}
