var url = "http://www.wlx.com/food/App/show_rest";
$.ajax({
  type: 'get',
  url: url,
  beforeSend: function() {
    loading("正在加载中");
  },
  success: function(data) {
    loadingHide();
    var rest = JSON.parse(data);
    var list = MyApp.templates.rest(rest);
    $(".rest-con").html(list);
  },
  error: function() {
    loading("加载失败");
    loadingHide();
  }
});


function loading(str) {
  $("body").append("<div class='tip'>" + str + "</div>");

};

function loadingHide() {
  setTimeout(function() {
    $(".tip").remove();
  }, 2000);
};
