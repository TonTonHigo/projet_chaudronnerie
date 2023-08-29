$(document).ready(function(){ 
    $('.logowow').hover(function(){
        $(this).animate({width:'400px'},400);
    },function(){
        $(this).animate({width:'350px'},400);
    });

    $('.textintro').css('font-size','70px');
    $('.textintro').hover(function(){
        $(this).animate({ fontSize: '75px' }, 400);
    }, function(){
        $(this).animate({ fontSize: '70px' }, 400);
    });

    $('.cachepreload').click(function(){
        $('.preload').fadeOut('slow');
        $('.containerlogo').fadeOut('slow');
    });
});