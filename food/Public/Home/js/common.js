$(document).ready(
  function(){
    $(".slide-tab").each(function(index){
      var on  = false;  //点击判断
      $(this).click(function(){
        var now = $(this).attr("data-slide");
        var nowTit = $(this).html();
        var tit = "<li class='dl-nav-bar-select nav-bar-tit' data-slide='"+now+"'><span class='bar-tit'>"+nowTit+"</span><span class='sub-tab-closeBtn'></span>";

        $("#dl-nav-bar-tit").find("li").removeClass("dl-nav-bar-select");
        $("#tab-con").find(".tab-pane").removeClass("active");

        if(index==0){
          $("#dl-nav-bar-tit").find("li").each(function(){
            if($(this).attr("data-slide") == now){
              $(this).addClass("dl-nav-bar-select").show();
            }
          });
          // $("#tab-con").find(".tab-pane").each(function(){
          //   if($(this).attr("data-slide") == now){
          //     $(this).addClass("active").show();
          //     addHtml();
          //   }
          // });
        }else{
          if(!on){   //为true追加html
            $("#dl-nav-bar-tit").append(tit);
            on = true;
          }else{    //为false显示
            $("#dl-nav-bar-tit").find("li").each(function(){
              if($(this).attr("data-slide") == now){
                $(this).addClass("dl-nav-bar-select").show();
              }
            });
          }
        }
        $("#tab-con").find(".tab-pane").each(function(){
          if($(this).attr("data-slide") == now){
            $(this).addClass("active").show();
            addHtml();
          }
        });
      });
    });
    $("body").on("click",".bar-tit",function(){

      $(".nav-bar-tit").removeClass("dl-nav-bar-select");
      $("#tab-con").find(".tab-pane").removeClass("active");
      $(this).parent().addClass("dl-nav-bar-select");
      var now = $(this).parent().attr("data-slide");
      $("#tab-con").find(".tab-pane").each(function(){
        if($(this).attr("data-slide") == now){
          $(this).addClass("active").show();
          // addHtml();
        }
      });
    });
    $("body").on("click",".sub-tab-closeBtn",function(){
      var tab = $(this).parent().attr("data-slide");
      $(this).parent().removeClass("dl-nav-bar-select").hide();
      $("#tab-con").find(".tab-pane").each(function(){
        if($(this).attr("data-slide") == tab){
          $(this).removeClass("active").hide();
        }
      });
    });
    function addHtml(){
      $(".tab-pane").each(function(){
        if($(this).hasClass("active")){
          $(this).html() == "";
          var url = $(this).attr("data-href");
          // if($(this).hasClass("tab-none")){
            var that = $(this);
            $.ajax({
              type: 'get',
              url: url,
              beforeSend:function(){
                $("#loading").show();
              },
              success:function(data){
                $("#loading").hide();
                that.html(data);
                // that.removeClass("tab-none");
              }
            });
          // }

        }
      });
    }
});
