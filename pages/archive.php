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

    <!-- fichier css -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>

    <?php include "../composants/header.php" ?>

    <main>

        <?php

        $articles = $connexion->select("*", "article");

        if (!empty($articles)) {
            foreach ($articles as $article) {
                echo '<div class="image-container" onclick="showArticleDetails(this)">
                            <h2>' . $article["titre"] . '</h2>
                            <p>' . $article["contenu"] . '</p>
                            <img src="' . $article["image"] . '">
                          </div>';
            }
        } else {
            echo "Aucun article trouvé.";
        }
         ?>
        <!--
        <div class="image-grid image-grid-highlight">
            <div class="image-container" onclick="showArticleDetails(this)">
                <img src="../image/image13.jpg" alt="Image 1">
            </div>
            <div class="image-container" onclick="showArticleDetails(this)">
                <img src="../image/image14.jpg" alt="Image 2">
            </div>
            <div class="image-container" onclick="showArticleDetails(this)">
                <img src="../image/image15.jpg" alt="Image 3">
            </div>
            <div class="image-container" onclick="showArticleDetails(this)">
                <img src="../image/image16.jpg" alt="Image 4">
            </div>
            <div class="image-container" onclick="showArticleDetails(this)">
                <img src="../image/image18.png" alt="Image 5">
            </div>
            <div class="image-container" onclick="showArticleDetails(this)">
                <img src="../image/image11a.jpg" alt="Image 6">
            </div>
        </div>
         -->

    </main>

    <?php include "../composants/footer.php" ?>

    <!-- fichier js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        
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


    </script>


</body>

</html>