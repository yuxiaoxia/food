$("body").on("click",".mycheckbox",function(){
  if($(this).attr("id") == "select-all"){
    if($(this).hasClass("mycheckbox-checked")){
      $(".mycheckbox").removeClass("mycheckbox-checked");
    }else{
    $(".mycheckbox").addClass("mycheckbox-checked")
    }
  }
  else{
    if($(this).hasClass("mycheckbox-checked")){
      $(this).removeClass("mycheckbox-checked")
    }else{
      $(this).addClass("mycheckbox-checked")
    }
  }

})
