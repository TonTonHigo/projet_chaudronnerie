<?php include "../composants/connexion.php"; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">

    <!-- fichier css -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <?php include "../composants/header.php" ?>

    <main>
        <div class="modal-galerie">

            <!-- Button trigger modal -->
            <button type="button" class="btn ajout-photo" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter une photo
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ma nouvelle photo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="send-photo">
                                <input type="hidden" name="form" value="galerie">
                                <div id="photoError" class="validation-error">Photo manquante</div>
                                <input type="text" id="photo" name="photo" placeholder="Photo">
                                <div id="descriptifError" class="validation-error">Descriptif manquant</div>
                                <textarea id="descriptif" cols="30" rows="10" type="text" name="descriptif" placeholder="Descriptif"></textarea>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn enregistrer">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid-galerie">
            <?php
            $galerie = $connexion->select("*", "galerie");
            foreach ($galerie as $cartes) {
                // $maxContentLength = 100; // Maximum de caractère a afficher 

                // Raccourci le contenu trop long pour donner un effet prévu
                // $truncatedContent = (strlen($cartes['descriptif']) > $maxContentLength) ?
                // substr($cartes['descriptif'], 0, $maxContentLength) . "..." :
                // $cartes['descriptif'];

                echo '                   
                
            <div class="cadre-photo" style="background-image: url(' . $cartes["photo"] . ')">
                <p id="text-galerie' . $cartes["id_galerie"] . '" class="text-galerie">' . $cartes['descriptif'] . '</p>
            </div>                 
            ';
            }
            ?>
        </div>

    </main>


    <?php include "../composants/footer.php" ?>

    <!-- fichier js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // galerie
            $('.text-galerie').hide();

            $('.cadre-photo').hover(function() {
                $(this).find('.text-galerie').slideDown("slow");
            }, function() {
                $(this).find('.text-galerie').slideUp("slow");
            });



            $('.enregistrer').click(function() {
                // Gather form data
                var formData = {
                    photo: $('#photo').val(),
                    descriptif: $('#descriptif').val(),
                    form: 'galerie' // Add the form field
                };

                // Reset validation messages
                $('.validation-error').hide();

                // Check if any of the input fields is empty
                var hasErrors = false;
                if (formData.photo.trim() === '') {
                    $('#photoError').show();
                    hasErrors = true;
                }
                if (formData.descriptif.trim() === '') {
                    $('#descriptifError').show();
                    hasErrors = true;
                }

                if (!hasErrors) {
                    // Send AJAX request
                    $.ajax({
                        type: 'POST',
                        url: '../controller.php',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            // Append the updated gallery content based on the response
                            for (var i = 0; i < response.gallery.length; i++) {
                                $('.grid-galerie').append(`
                                    <div class="cadre-photo" style="background-image: url(${response.gallery[i]['photo']})">
                                        <p id="text-galerie${response.gallery[i]['id_galerie']}" class="text-galerie">${response.gallery[i]['descriptif']}</p>
                                    </div> 
                                `);
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>