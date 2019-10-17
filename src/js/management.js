$(function(){
    $("body").ready(()=>{
        $(".nav-link.active").removeClass("active");
        $(".nav-link").eq(2).addClass("active");
    })
});