$(function(){
    $("#start_button").on("click touchstart",()=>{
        var obj={
            genre:[],
            sub_genre:[],
            format:[],
            number:[]
        };

        $("input[type='hidden']").map((index,elem)=>{
            
            var type=$(elem).attr("class");
            obj[type][obj[type].length]=$(elem).attr("value");
        });


        if(obj.genre.length!==0){
            for(var i=0;obj.genre.length<7;i++){
                obj.genre[obj.genre.length]='';
            }
        }
        if(obj.sub_genre.length!==0){
            for(var i=0;obj.sub_genre.length<21;i++){
                obj.sub_genre[obj.sub_genre.length]='';
            }
        }
        if(obj.format.length!==0){
            for(var i=0;obj.format.length<15;i++){
                obj.format[obj.format.length]='';
            }
        }


        $.ajax({
            type: 'POST',
            url: '../php/util/index.php',
            data: obj,
        }).done(function( msg ) {
            console.log(JSON.parse(msg));
            quiz_start(JSON.parse(msg));
        });
    });
    

    function quiz_start(json){
        window.json=json;
        window.resultJson=json.concat();
        window.result=new Array();
        if(!($('#start_button').hasClass("enter"))){
            $('#start_button').text("ENTER");
            $('#start_button').addClass("enter");
            $('#start_button').off("click");
        }
        $('#questions').html('<div class="ready">Ready...</div>');
        setTimeout(()=>{
            $(".ready").text("Go!!!");
            setTimeout(()=>{
                propose(json);
            },1000);
        },2000);

        $('.enter').on('click touchstart',(e)=>{
            SuccessOrFailure();
            setTimeout(()=>{
                propose(window.json)
            },3000);
        })
    }

    function propose(json){
        if(json.length===0){
            finish();
            return;
        }
        $(".ready").remove();
        $(".q-choices").remove();
        $("#questions").children().css("display","inline");
        var question=json[0];
        $("#genre").text(question["genre"]);
        $("#sub").text(question["sub_genre"]);
        $("#format").text(question["questions_format"]);
        var star="";
        for(var i=0;i<=question["level"];i++){star+="☆"}
        $("#level").text(star);

        format_render(question);
    }

    function SuccessOrFailure(){
        var result=format_jadge();
        $("#questions").children().css("display","none");
        switch(result){
            case "text":
                if($(".form-control").val()===window.json[0]["answer"]){
                    
                    $("#questions").append('<div class="ready">Bull\'s Eye!!!</div>');
                    window.result.push(1);
                }
                else{
                    $("#questions").append('<div class="ready">Wrong!!!</div>');
                    window.result.push(0);
                }
                break;
        }
        
        window.json.shift();
        console.log(window.json);
    }

    function format_jadge(){
        if($("#format").text()==="Typing" || $("#format").text()==="Cube" || $("#format").text()==="Effect"){
            return "text";
        }
    }

    function finish(){
        $('.enter').off();
        $(".js-modal").fadeIn();
            window.resultJson.map((obj,index)=>{
                $("#modal-submit").after("<input type=\"hidden\" name=\"result"+index+"[]\" value=\""+obj["answer"]+"\"/>");
                $("#modal-submit").after("<input type=\"hidden\" name=\"result"+index+"[]\" value=\""+obj["statement"]+"\"/>");
                $("#modal-submit").after("<input type=\"hidden\" name=\"result"+index+"[]\" value=\""+obj["level"]+"\"/>");
                $("#modal-submit").after("<input type=\"hidden\" name=\"result"+index+"[]\" value=\""+obj["questions_format"]+"\"/>");
                $("#modal-submit").after("<input type=\"hidden\" name=\"result"+index+"[]\" value=\""+obj["sub_genre"]+"\"/>");
                $("#modal-submit").after("<input type=\"hidden\" name=\"result"+index+"[]\" value=\""+obj["genre"]+"\"/>");
            });
            window.result.map((obj,index)=>{
                $("#modal-submit").after("<input type=\"hidden\" name=\"result"+index+"[]\" value=\""+obj+"\"/>");
            });
    }

    function format_render(question){
        if(question["questions_format"]==="Typing" || question["questions_format"]==="Cube" || question["questions_format"]==="Effect"){
            $("#answer-panel").html('<div></div><div class="choices input-group input-group-lg"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-lg">Answer</span></div><input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" maxlength="8"></div>');
        }
        
        switch(answer_format_jadge(question["answer"])){
            case 1:
                $(".choices").prev().html("<div>"+"ひらがな"+"</div>");
                break;
            case 2:
                $(".choices").prev().html("<div>"+"カタカナ"+"</div>");
                break;
            case 3:
                $(".choices").prev().html("<div>"+"英数字"+"</div>");
                break;
        }
        

        // $("#questions").append(question["statement"]);
        $("#questions").t(question["statement"],{
            delay:0.5, //アニメーションの遅延
            speed:50, //アニメーションの速度
            speed_vary:false, //リアルなタイピングのスピード
            beep:false, //タイピング音の有無
            mistype:false,
            caret:false, //カーソル
            tag:'span'
        });
        
        switch(question["questions_format"]){
            case "Cube":
                $(".t-container").after('<span class="q-choices"></span>');
                
                var a=question[5]["choices"];
                var len=a.length;
                var f="";
                for(var i=0;i<len;i++){
                    f+=a.substr( Math.floor( Math.random() * a.length ),1);
                    a =a.replace(f[i],"");
                }

                $(".q-choices").text(f);
                break;
            case "Effect":
                $(".t-container").after('<span class="q-choices"></span>');
                $(".q-choices").text(question[5]["choices"]);
                break;
            
        }
    }
});

function answer_format_jadge(answer){
    var regexp = /^[ぁ-んー]*$/;//ひらがな
    if(answer.match(regexp)){
        return 1;
    }
    regexp = /^[ァ-ンヴー]*$/;//カタカナ
    if(answer.match(regexp)){
        return 2;
    }
    regexp=/^[0-9a-zA-Z]*$/;
    if(answer.match(regexp)){
        return 3;
    }
}