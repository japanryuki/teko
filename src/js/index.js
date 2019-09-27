$(function(){
    $(".nav-link").on("click",(e)=>{
        $(".nav-link.active").removeClass("active");
        $(e.target).addClass("active");
    })

    $("input[type='radio']").on("click",(e)=>{
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