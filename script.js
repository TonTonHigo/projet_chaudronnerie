$(document).ready(function () {

    var url = window.location.pathname.split('/').pop();

    if (url = 'index.php') {
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
        $(this).animate({ width: '400px' }, 400);
    }, function () {
        $(this).animate({ width: '350px' }, 400);
    });

    $('.textintro').css('font-size', '70px');
    $('.textintro').hover(function () {
        $(this).animate({ fontSize: '75px' }, 400);
    }, function () {
        $(this).animate({ fontSize: '70px' }, 400);
    });

    $('main').hide();
    $('.cachepreload').click(function () {
        $('.preload').fadeOut('slow');
        $('.containerlogo').fadeOut('slow');
        $('main').show();
    });
});

