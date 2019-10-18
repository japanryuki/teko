$(function(){
    var clickEventType=((window.ontouchstart!==null)?'click':'touchstart');
    $("body").ready(()=>{
        $(".nav-link.active").removeClass("active");
        $(".nav-link").eq(1).addClass("active");
    })

    $(".modal-button").on(clickEventType,()=>{
        $(".js-modal").fadeIn();
    })

    $(".modal").on(clickEventType,()=>{
        $(".js-modal").fadeOut();
    })

    $(".plus-button").on(clickEventType,()=>{
        var len=$("input[name='answer']").length;
        len++;
        $(".form-group").last().after("<div class=\"form-group\"><label for=\"choices"+len+"\">Choices"+len+"</label><input type=\"text\" class=\"form-control\" id=\"choices"+len+"\" placeholder=\"\" name=\"choices\"></div><div class=\"form-group\"><label for=\"answer"+len+"\">Answer"+len+"</label><input type=\"text\" class=\"form-control\" id=\"answer"+len+"\" placeholder=\"\" name=\"answer\"></div>");
    })

    // $(".form-control").on("focusout",(e)=>{

    //     $(".form-control").each((index,el)=>{
    //         if($(el).parent().css("display")!="none"){
    //             // console.log(el);
    //             // console.log($(el).val()=="");
    //             if($(el).val()==""){
    //                 $(".create").attr("disabled","true");
    //                 $(".error").css("display","block");
    //                 return;
    //             }else{
    //                 $(".create").removeAttr("disabled","false");
    //                 $(".error").css("display","none");
    //             }
    //         }
    //     });
    // });

    $("#format").change(()=>{
        var str = $("#format>option:selected").val();
        switch(str){
            case "Typing":
            case "marubatu":
            case "Cube":
            case "Effect":
            case "Sorting":
                $(".choices").css("display","none");
                $(".plus-button").css("display","none");
               
                break;
            default:
                $(".choices").css("display","block");
                $(".plus-button").css("display","block");
                
                break;
        }
        
        switch(str){
            case "Association":
                $(".as-statement").css("display","block");
                $(".statement").css("display","none");
                break;
            default:
                $(".as-statement").css("display","none");
                $(".statement").css("display","block");
                break;
        }
    })

    $(".create").on("click touchstart",()=>{
        var flg=false;
        var obj={
            genre:[],
            sub_genre:[],
            format:[],
            level:[],
            choices:[],
            answer:[],
            statement:[]
        };
        $(".form-control").each((index,el)=>{
            if($(el).parent().css("display")!="none"){
                console.log(el);
                // console.log($(el).val()=="");
                if($(el).val()==""){
                    $(".error").css("display","block");
                    flg=false;
                    return;
                }else{
                    $(".error").css("display","none");
                    flg=true;
                    obj[el.name].push($(el).val());
                }
            }
        });

        if(flg===false){
            return;
        }

        console.log(obj);

        $.ajax({
            type: 'POST',
            url: '../php/util/create.php',
            data: obj,
        }).done(function( msg ) {
            console.log(msg);
        });

    });
});




{/* <div class="form-group">
<label for="choices">Choices1</label>
<input type="text" class="form-control" id="choices" placeholder="">
</div>
<div class="form-group">
<label for="answer">Answer1</label>
<input type="text" class="form-control" id="answer" placeholder="">
</div> */}