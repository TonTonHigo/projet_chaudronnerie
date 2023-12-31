
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

    var currentURL = window.location.href;
    console.log(currentURL);

    // Extract the path from the URL
    var path = currentURL.substring(currentURL.lastIndexOf('/') + 1);
    console.log(path);
    
    // Check if the path matches your desired path
    if (path === '' || path === 'index.php') {
        $('#form-co').attr('action','controller.php');
        $('#form-ins').attr('action','controller.php');
        $('#form-deco').attr('action','controller.php');
        $('#lienMention').attr('href','pages/mention-legal.php');
        $('#logo').attr('src', 'image/Logo.png');
        $('#logoburger').attr('src', 'image/Logo.png');
        $('#lien_index').attr('href', 'index.php');
        $('#lien_indexburger').attr('href', 'index.php');
        $('#lien_archive').attr('href', 'pages/archive.php');
        $('#lien_archiveburger').attr('href', 'pages/archive.php');
        $('#lien_tutoriel').attr('href', 'pages/tutoriel.php');
        $('#lien_tutorielburger').attr('href', 'pages/tutoriel.php');
        $('#lien_galerie').attr('href', 'pages/galerie.php');
        $('#lien_galerieburger').attr('href', 'pages/galerie.php');
        $('#lien_formulaire').attr('href', 'pages/contact.php');
        $('#lien_formulaireburger').attr('href', 'pages/contact.php');
        $('#lien_dashboard').click(function(){
            window.location.href = 'pages/dashboard.php';
        });
        $('#lien_dashboardburger').click(function(){
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

