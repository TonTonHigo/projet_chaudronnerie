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
    <div>
                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter une image à la galerie
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input name="image" type="text" placeholder="image">
                    <textarea name="descriptif" id="" cols="30" rows="10" placeholder="descriptif"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary">Envoyer</button>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container-sandy">
        <div class="fond-sandy">
            <div id="grid-galerie">
            <?php
                $galerie = $connexion -> select("*","galerie");
                foreach($galerie as $cartes){
                    $maxContentLength = 100; // Maximum de caractère a afficher 

                    // Raccourci le contenu trop long pour donner un effet prévu
                    $truncatedContent = (strlen($cartes['descriptif']) > $maxContentLength) ?
                    substr($cartes['descriptif'], 0, $maxContentLength) . "..." :
                    $cartes['descriptif'];
                        
                    echo '                   
                        
                    <div id="id-photo'. $cartes["id_galerie"] .'">
                        <h2 id="text-galerie'. $cartes["id_galerie"] .'" class="text-galerie">' . $truncatedContent . '</h2>
                    </div>                 
                     
                    <style>
                        #id-photo'. $cartes["id_galerie"] .'{
                            background: url("'. $cartes["photo"] .'");
                            background-repeat: no-repeat;
                            background-size: cover;
                            background-position:center;
                            width:300px;
                            height: 571px;
                            display: flex;
                            align-items: end;
                        }
                    </style>
                    ';
                }
            ?>
            </div>
        </div>

    </div>
</main>


<?php include "../composants/footer.php" ?>
    
    <!-- fichier js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            // galerie
            $('.text-galerie').hide();

            $('#id-photo1').hover(function(){
                $('#text-galerie1').slideDown("slow");

            }, function(){
                $('#text-galerie1').slideUp("slow");

            });

        });
    </script>
</body>
</html>