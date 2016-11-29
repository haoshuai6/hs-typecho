$(document).ready(function(){
    $('.page-navigator').addClass("pagination");
});
$(document).ready(function(){
    $('.page-navigator .current').addClass("active");
});

$('#textarea').focus(
    function(){
        $(".submit").css("border-color","#66afe9");
    }
);

$('#textarea').blur(
    function(){
        $(".submit").removeAttr("style");
    }
);

$(document).ready(function(){
    $("#btn-text").click(function(){
        $(".container-fluid").toggleClass("big-text");
    });
});

$(document).ready(function(){
    $("#btn-theme").click(function(){
        $(".fixed-navbar").toggleClass("night");
    });
});

$(document).ready(function(){
    var now=new Date();
    var hour=now.getHours();
    if( hour>6&&hour<=18){
        $('.fixed-navbar').removeClass('night');
    }
    else {
        $('.fixed-navbar').addClass('night');
    }
});