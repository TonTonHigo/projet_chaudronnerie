<?php include "../composants/connexion.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
        <div id="corps-dash">
            <table class="table-dash">
                <caption>Galerie</caption>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Descriptif</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        <th>
                            <!-- Button AJOUTER photo -->
                            <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#ajout-photo">
                                Ajouter
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $galerie = $connexion->select("*", "galerie");
                        foreach ($galerie as $cartes) {
                            echo ' 
                            <tr>
                            <form id="formModif'. $cartes["id_galerie"] . '" class="forme-form" method="POST" action="../controller.php">
                                <input class="form" type="hidden" name="form" value="galerieModif">
                                <input class="form" type="hidden" name="id_galerie" value="'. $cartes["id_galerie"] . '">
                                <td>
                                    <!-- image -->
                                    <img src="'. $cartes["photo"] . '" width="150">
                                    <textarea type="text" name="photo">' . $cartes['photo'] . '</textarea>
                                </td>
                                <td>
                                    <!-- descriptif -->
                                    <textarea cols="100" rows="10" type="text" name="descriptif">' . $cartes['descriptif'] . '</textarea>
                                </td>
                                <td>
                                    <!-- modifier -->
                                    <button type="button" class="btn button nico" data-bs-toggle="modal" data-bs-target="#modif-modal'. $cartes["id_galerie"] . '">
                                        Mofifier
                                    </button>
                                </td>
                                <td>
                                    <!-- supprimer -->
                                    <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#supp-modal'. $cartes["id_galerie"] . '">
                                        Supprimer
                                    </button>
                                </td>                  
                            </form>
                            </tr>

                            <!-- Modal MODIF -->
                            <div class="modal fade" id="modif-modal'. $cartes["id_galerie"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modification de photo</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4> Es-tu sûr de vouloir modifier? </h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn enregistrer" form="formModif'. $cartes["id_galerie"] . '">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <!-- Modal SUPP -->
                            <div class="modal fade" id="supp-modal'. $cartes["id_galerie"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de photo</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formSupp'. $cartes["id_galerie"] .'" class="forme-form" method="POST" action="../controller.php">
                                                <input class="form" type="hidden" name="form" value="galerieSupp">
                                                <input name="id_galerie" type="hidden" value="'. $cartes["id_galerie"] .'">
                                            </form>
                                            <h4>Supprimer la photo suivante?</h4>
                                            <img src="'. $cartes["photo"] .'" width="300">
                                            <h4> Et son descriptif? </h4>
                                            <p>'. $cartes["descriptif"] .'</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn enregistrer" form="formSupp'. $cartes["id_galerie"] .'">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                        </div>    

                                        
                        ';
                        }
                        ?>
                    
                    

                </tbody>
            </table>
        

            <!-- Modal -->
            <div class="modal fade" id="ajout-photo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ma nouvelle photo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAjoutGalerie" class="forme-form" method="POST" action="../controller.php">
                                <input class="form" type="hidden" name="form" value="galerie">
                                <div class="validationError photoError">Photo manquante</div>
                                <input type="text" id="ajoutPhoto" name="photo" placeholder="Photo">
                                <div class="validationError descriptifError">Descriptif manquant</div>
                                <textarea id="ajoutDescriptif" cols="30" rows="10" type="text" name="descriptif" placeholder="Descriptif"></textarea>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn color" id="addBtn">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        

            <!-- Contact reçu -->
            <table class="table-dash">
                <caption>Contact</caption>
                <thead>
                    <tr>
                        <th>Pseudonyme</th>
                        <th>Email</th>
                        <th>Sujet</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $contact = $connexion->select("*", "contact");
                    foreach ($contact as $msg) {
                    echo '
                    <tr>
                        <td>'. $msg["pseudonyme"] . '</td>
                        <td>'. $msg["email"] . '</td>
                        <td>'. $msg["sujet"] . '</td>
                        <td>'. $msg["message"] . '</td>
                    </tr>
                    ';
                    }
                ?>
                </tbody>
            </table>


            <!-- Articles archives -->
            <table class="table-dash">
                <caption>Article</caption>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Image</th>
                        <th>
                            <!-- Button AJOUTER article -->
                            <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#ajout-article">
                                Ajouter
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $article = $connexion->select("*", "article");
                    foreach ($article as $msg) {
                    echo '
                    <tr>
                        <td>'. $msg["titre"] . '</td>
                        <td>'. $msg["contenu"] . '</td>
                        <td><img src="'. $msg["image"] . '" width="150"></td>
                    </tr>
                    ';
                    }
                ?>
                </tbody>
            </table>

            <!-- Commentaires articles-->
            <table class="table-dash">
                <caption>Commentaires articles</caption>
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Tutoriel</th>
                        <th>Utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $com_art = $connexion->select("*", "commentaire");
                    foreach ($com_art as $msg) {
                    echo '
                    <tr>
                        <td>'. $msg["message"] . '</td>
                        <td>'. $msg["id_article"] . '</td>
                        <td>'. $msg["id_utilisateur"] . '</td>
                    </tr>
                    ';
                    }
                ?>
                </tbody>
            </table>


            <!-- Tutoriels -->
            <table class="table-dash">
                <caption>Tutoriels</caption>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Image</th>
                        <th>Image2</th>
                        <th>
                            <!-- Button AJOUTER tuto -->
                            <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#ajout-tuto">
                                Ajouter
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $tuto = $connexion->select("*", "tutoriel");
                    foreach ($tuto as $msg) {
                    echo '
                    <tr>
                        <td>'. $msg["titre"] . '</td>
                        <td>'. $msg["contenu"] . '</td>
                        <td><img src="'. $msg["image"] . '" width="150"></td>
                        <td><img src="'. $msg["image2"] . '" width="150"></td>
                    </tr>
                    ';
                    }
                ?>
                </tbody>
            </table>

            <!-- Commentaire tuto -->
            <table class="table-dash">
                <caption>Comentaires Tutoriels</caption>
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Tutoriel</th>
                        <th>Utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $com_tuto = $connexion->select("*", "commentaire_1");
                    foreach ($com_tuto as $msg) {
                    echo '
                    <tr>
                        <td>'. $msg["message"] . '</td>
                        <td>'. $msg["id_tutoriel"] . '</td>
                        <td>'. $msg["id_utilisateur"] . '</td>
                    </tr>
                    ';
                    }
                ?>
                </tbody>
            </table>


            <!-- Utilisateur -->
            <table class="table-dash">
                <caption>Utilisateurs</caption>
                <thead>
                    <tr>
                        <th>Pseudonyme</th>
                        <th>Email</th>
                        <th>
                            <!-- Button AJOUTER photo -->
                            <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#ajout-user">
                                Ajouter
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $user = $connexion->select("*", "utilisateur");
                    foreach ($user as $msg) {
                    echo '
                    <tr>
                        <td>'. $msg["pseudonyme"] . '</td>
                        <td>'. $msg["email"] . '</td>
                    </tr>
                    ';
                    }
                ?>
                </tbody>
            </table>
        
        </div>
        
    </main>

<?php include "../composants/footer.php" ?>


    <!-- fichier js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // galerie
            $('.validationError').hide();

            $('#addBtn').click(function(event) {

            if ($('#ajoutPhoto').val() === '') {
                $('.photoError').show();
            } else {
                $('.photoError').hide();
            }
            if ($('#ajoutDescriptif').val() === '') {
                $('.descriptifError').show();
            } else {
                $('.descriptifError').hide();
            }

            if ($('#ajoutPhoto').val() !== '' && $('#ajoutDescriptif').val() !== '') {
                $('#formAjoutGalerie').submit();
            }
            });

        });
    </script>
</body>
</html>