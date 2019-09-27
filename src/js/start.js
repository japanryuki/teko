$(function(){
    $("#start_button").on("click",()=>{
        var obj={
            main:[],
            sub:[],
            format:[],
            number:[]
        };

        $("input[type='hidden']").map((index,elem)=>{
            var type=$(elem).attr("class");
            obj[type][obj[type].length]=$(elem).attr("value");
        });


        var mainlen=obj.main.length;
        var sublen=obj.sub.length;
        var formatlen=obj.format.length;
        for(var i=0;i<8-mainlen;i++){
            obj.main.push(null);
        }
        for(var i=0;i<21-sublen;i++){
            obj.sub.push(null);
        }
        for(var i=0;i<16-formatlen;i++){
            obj.format.push(null);
        }


        $.ajax({
            type: 'POST',
            url: '../php/util/dbconnect.php',
            data: obj,
        }).done(function( msg ) {
            console.log( "データ保存: " + msg );
        });
    });
});