$(document).ready(function(){

    stateForms = new Array($(".hiddenForm").length-1);
    for(i=0; i<stateForms.length; i++){
        stateForms[i] = true;
        $(".hiddenForm:eq("+i+")").css({
            transform: "scale(0)",
            height: "0"
        });
    }

    $(".arrowDeploy").on("click", function(){
        tmp = $(this).index();

        if(stateForms[tmp] == false){
            $(".hiddenForm:eq("+tmp+")").css({
                transform: "scale(0)",
                height: "0"
            });
            stateForms[tmp] = true;
        } else {
            $(".hiddenForm:eq("+tmp+")").css({
                transform: "scale(1)",
                height: "auto"
            });
            stateForms[tmp] = false;
        }
        
    });
});