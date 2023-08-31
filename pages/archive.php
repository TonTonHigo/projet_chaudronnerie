<?php include "../composants/connexion.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- fichier css -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>

    <?php include "../composants/header.php" ?>

    <main>

        <div class="image-grid-highlight">
            <div class="image-grid">

                <?php
                $archive = $connexion->select("*", "article");
                foreach ($archive as $cartes) {
                    $maxContentLength = 100; // Maximum de caractère a afficher 

                    // Raccourci le contenu trop long pour donner un effet prévu
                    $truncatedContent = (strlen($cartes['titre']) > $maxContentLength) ?
                        substr($cartes['titre'], 0, $maxContentLength) . "..." :
                        $cartes['titre'];

                    echo
                    '<div class="cadre-photo" style="background-image: url(' . $cartes["image"] . ')">
                                   <h2 id="text-galerie' . $cartes["id_article"] . '" class="text-galerie">' . $truncatedContent . '</h2>
                                   </div>';
                }
                ?>


            </div>
        </div>

    </main>

    <?php include "../composants/footer.php" ?>

    <!-- fichier js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            // galerie
            $('.text-galerie').hide();

            $('.cadre-photo').hover(function() {
                $(this).find('.text-galerie').slideDown("slow");
            }, function() {
                $(this).find('.text-galerie').slideUp("slow");
            });
        });
    </script>
</body>

</html>