$(function(){
    $("#start_button").on("click",()=>{
        var obj={
            genre:[],
            subGenre:[],
            format:[],
            number:[]
        };


        $("input[type='hidden']").map((index,elem)=>{
            
            var type=$(elem).attr("class");
            obj[type][obj[type].length]=$(elem).attr("value");
        });


       


        $.ajax({
            type: 'POST',
            url: '../php/util/index.php',
            data: obj,
        }).done(function( msg ) {
            console.log(JSON.parse(msg));
        });
    });
});