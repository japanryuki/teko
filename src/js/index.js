$(function(){
    var clickEventType=((window.ontouchstart!==null)?'click':'touchstart');
    $("body").ready(()=>{
        $(".nav-link.active").removeClass("active");
        $(".nav-link").eq(0).addClass("active");
    })

    $("input[type='radio']").on(clickEventType,(e)=>{
        var eObj = $(e.target);
        if(!(eObj.hasClass("disabled"))){
            return;
        }else{
            if(e.target.value==="main"){
                $("#main-gf-wrap").find("input").removeAttr("disabled");
                $("#sub-gf-wrap").find("input").attr("disabled","disabled");
                eObj.removeClass("disabled");
                $("#sub-radio").addClass("disabled");
            }
            else if(e.target.value==="sub"){
                $("#sub-gf-wrap").find("input").removeAttr("disabled");
                $("#main-gf-wrap").find("input").attr("disabled","disabled");
                eObj.removeClass("disabled");
                $("#main-radio").addClass("disabled");
            }
        }
    })
});