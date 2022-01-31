$(document).ready(function(){

    stateForms = new Array($(".hidden").length-1);
    for(i=0; i<stateForms.length; i++){
        stateForms[i] = true;
        $(".hidden:eq("+i+")").css({
            transform: "scale(0)",
            height: "0"
        });
    }

    $(".arrowDeploy").on("click", function(){
        tmp = $(this).index();

        if(stateForms[tmp] == false){
            $(".hidden:eq("+tmp+")").css({
                transform: "scale(0)",
                height: "0"
            });
            $(this).css({
                transform: "rotate(-90deg)"
            });
            stateForms[tmp] = true;
        } else {
            $(".hidden:eq("+tmp+")").css({
                transform: "scale(1)",
                height: "auto"
            });
            $(this).css({
                transform: "rotate(90deg)"
            });
            stateForms[tmp] = false;
        }
        
    });
});