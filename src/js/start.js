$(function(){
    $("#start_button").on("click",()=>{
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

        $('.enter').on('click',(e)=>{
            SuccessOrFailure();
            setTimeout(propose(window.json),2000);
        })
    }

    function propose(json){
        $(".ready").remove();
        if(json.length===0){
            finish();
            return;
        }
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
        $("#questions").html('<div class="ready">Bull\'s Eye!!!</div>');
        $("#questions").html('<div class="ready">Wrong!!!</div>');
        window.json.shift();
    }

    function finish(){

    }

    function format_render(question){
        if(question["questions_format"]==="Typing" || question["questions_format"]==="Cube" || question["questions_format"]==="Effect"){
            $("#answer-panel").html('<div class="choices input-group input-group-lg"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-lg">Answer</span></div><input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" maxlength="8"></div>');
        }
        switch(question["questions_format"]){
            case "Cube":
                
                break;
            case "Effect":
                
                break;
            
        }

        $("#questions").text(question["statement"]);
        $("#questions").t({
            delay:0.5, //アニメーションの遅延
            speed:50, //アニメーションの速度
            speed_vary:false, //リアルなタイピングのスピード
            beep:false, //タイピング音の有無
            mistype:false,
            caret:false, //カーソル
        });
        
    }
});