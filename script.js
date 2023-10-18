
$(document).ready(function () {
    
    $('#icon').hide();
    // quand on scroll vers le bas la petite flêche apparaît
    $(document).scroll(function(){
        if ($(this).scrollTop() > 0) {
            $('#icon').fadeIn("slow");
            $('#icon').hover(function(){
                $(this).css("bottom","60px");
            },function(){
                $(this).css("bottom","50px");
            });          
        } else {           
            $('#icon').fadeOut("slow");            
        }
        
    });

    $('.validation-error').hide();

    var url = window.location.pathname;

    if (url === '/projet_chaudronnerie/') {
        $('#lienMention').attr('href','pages/mention-legal.php');
        $('#logo').attr('src', 'image/Logo.png');
        $('#lien_index').attr('href', 'index.php');
        $('#lien_archive').attr('href', 'pages/archive.php');
        $('#lien_tutoriel').attr('href', 'pages/tutoriel.php');
        $('#lien_galerie').attr('href', 'pages/galerie.php');
        $('#lien_formulaire').attr('href', 'pages/formulaire.php');
        $('#lien_dashboard').click(function(){
            window.location.href = 'pages/dashboard.php';
        });
    }   

    $('.logowow').hover(function () {
        $(this).animate({ width: '250px' }, 400);
        $(this).css('filter','brightness(2)');
    }, function () {
        $(this).animate({ width: '150px' }, 400);
        $(this).css('filter','none');
    });

    $('.textintro').css('font-size', '50px');
    $('.textintro').hover(function () {
        $(this).animate({ fontSize: '65px' }, 400);
    }, function () {
        $(this).animate({ fontSize: '50px' }, 400);
    });

    $('main').hide();
    $('.cachepreload').click(function () {
        $('.preload').fadeOut('slow');
        $('.containerlogo').fadeOut('slow');
        $('main').show();
    });

    $('#logo').hover(function(){
        $(this).css('filter','brightness(2)');
    }, function () {
        $(this).css('filter','none');
    });
    
});

