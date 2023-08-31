$(document).ready(function () {

    var url = window.location.pathname.split('/').pop();

    if (url = 'index.php') {
        $('#logo').attr('src', 'image/Logo.png');
        $('#lien_index').attr('href', 'index.php');
        $('#lien_archive').attr('href', 'pages/archive.php');
        $('#lien_tutoriel').attr('href', 'pages/tutoriel.php');
        $('#lien_galerie').attr('href', 'pages/galerie.php');
        $('#lien_formulaire').attr('href', 'pages/formulaire.php');
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

    $('.cachepreload').click(function () {
        $('.preload').fadeOut('slow');
        $('.containerlogo').fadeOut('slow');
    });


    // AJAX 
    $('#send_contact').click(function(){
         // récupère les valeurs des inputs
         var formData = {
            form: $("#form").val(),
            pseudonyme: $("#pseudonyme").val(),
            email: $("#email").val(),
            sujet: $("#sujet").val(),
            message: $("#message").val(),
        };

        // vide les inputs
        $('#pseudonyme').val('');
        $('#email').val('');
        $('#sujet').val('');
        $('#message').val('');

        var type = "POST";
        var ajaxurl = "controller.php";

        $.ajax({
            type: type,
            // en minuscule url
            url: ajaxurl,
            dataType: 'json',
            data: formData,
            success: function (data) {
                alert("Votre message a bien été envoyé!\nNous vous répondrons au plus vite.");
            },
            error: function (xhr, status, error) {
                console.log("Erreur AJAX : " + error);
                console.log("Erreur AJAX : " + status);
                console.log("Erreur AJAX : " + xhr);
            },
        });
    });
});


// Fonction pour afficher les détails de l'article
function showArticleDetails(imageContainer) {
    var title = imageContainer.getAttribute("data-title");
    var content = imageContainer.getAttribute("data-content");
    var imageSrc = imageContainer.querySelector("img").getAttribute("src");

    // Afficher les détails de l'article dans une boîte modale
    var modalContent = '<h2>' + title + '</h2>' +
        '<p>' + content + '</p>' +
        '<img src="' + imageSrc + '" alt="Image de l\'article">';

    // Créer une boîte modale et ajouter le contenu
    var modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = modalContent;

    // Ajouter la boîte modale à la page
    document.body.appendChild(modal);

    // Ajouter un écouteur pour fermer la boîte modale lorsqu'on clique dessus
    modal.addEventListener('click', function () {
        document.body.removeChild(modal);
    });
}

// Associer la fonction aux éléments d'article
$(".article.image-container").click(function () {
    showArticleDetails(this);
});

