$(document).ready(function(){
    $(".arrowDeploy").on("click", function(){
        tmp = $(this).index();

        $(".hiddenForm:eq("+tmp+")").css({
            transform: "scale(1)",
            height: "auto"
        });
    });
});