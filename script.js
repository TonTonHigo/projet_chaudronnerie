$(document).ready(function () {
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

    $('.cachepreload').click(function () {
        $('.preload').fadeOut('slow');
        $('.containerlogo').fadeOut('slow');
    });
});

// archive //

function showExplication(imageNumber) {
    var explicationText = "";

    switch (imageNumber) {
        case 1:
            explicationText = "Explication de l'image 1.";
            break;
        case 2:
            explicationText = "Explication de l'image 2.";
            break;
        case 3:
            explicationText = "Explication de l'image 3.";
            break;
        case 4:
            explicationText = "Explication de l'image 4.";
            break;
        case 5:
            explicationText = "Explication de l'image 5.";
            break;
        case 6:
            explicationText = "Explication de l'image 6.";
        default:
            explicationText = "Aucune explication disponible.";
    }

    document.getElementById("explication-text").textContent = explicationText;
}

