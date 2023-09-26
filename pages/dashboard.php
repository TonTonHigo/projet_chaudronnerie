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

            <!-- btn pour choisir le tableau que l'on souhaite travailler dessus -->
            <div id="btndash">
                <h2>Les tableaux</h2>
                <div>
                    <button class="btn btnDashboard btnGal">Galerie</button>
                    <button class="btn btnDashboard btnCont">Contact</button>
                    <button class="btn btnDashboard btnArt">Article</button>
                    <button class="btn btnDashboard btnComArt">Commentaires articles</button>
                    <button class="btn btnDashboard btnTuto">Tutoriels</button>
                    <button class="btn btnDashboard btnComTuto">Comentaires Tutoriels</button>
                    <button class="btn btnDashboard btnUtil">Utilisateurs</button>
                </div>
            </div>
            
            <div class="galerieTable">
                <!-- Galerie -->
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
                                        <textarea cols="50" rows="10" type="text" name="descriptif">' . $cartes['descriptif'] . '</textarea>
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
    
                <!-- Modal galerie -->
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
                                    <input type="text" id="galeriePhoto" name="photo" placeholder="Photo">
                                    <div class="validationError descriptifError">Descriptif manquant</div>
                                    <textarea id="galerieDescriptif" cols="30" rows="10" type="text" name="descriptif" placeholder="Descriptif"></textarea>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                <button type="button" class="btn color" id="addPhoto">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="dashtable contactTable">
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
            </div>

            <div class="dashtable articleTable">
                <!-- Articles archives -->
                <table class="table-dash">
                    <caption>Article</caption>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Image</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
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
                        <form id="articleModif'. $msg["id_article"] . '" action="../controller.php" method="POST">
                        <input name="form" value="articleModif" type="hidden">
                        <input name="id_article" value="'. $msg["id_article"] . '" type="hidden">
                        <tr>
                            <td><textarea name="titreModif">'. $msg["titre"] . '</textarea></td>
                            <td><textarea cols="50" rows="10" type="text" name="contenuModif">'. $msg["contenu"] . '</textarea></td>
                            <td>
                                <img src="'. $msg["image"] . '" width="150">
                                <textarea name="imageModif">
                                <img src="'. $msg["image"] . '" width="150">
                                </textarea>
    
                            </td>
                            <td>
                                <!-- modifier -->
                                <button type="button" class="btn button nico" data-bs-toggle="modal" data-bs-target="#modif-article'. $msg["id_article"] . '">
                                    Mofifier
                                </button>
                            </td>
                            <td>
                                <!-- supprimer -->
                                <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#supp-article'. $msg["id_article"] . '">
                                    Supprimer
                                </button>
                            </td> 
                        </tr>
                        </form>
                        <!-- Modal MODIF -->
                                <div class="modal fade" id="modif-article'. $msg["id_article"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modification de l\'article</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4> Es-tu sûr de vouloir modifier? </h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn enregistrer" form="articleModif'. $msg["id_article"] . '">Enregistrer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
    
                                <!-- Modal SUPP -->
                                <div class="modal fade" id="supp-article'. $msg["id_article"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de l\'article</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="articleSupp'. $msg["id_article"] .'" class="forme-form" method="POST" action="../controller.php">
                                                    <input class="form" type="hidden" name="form" value="articleSupp">
                                                    <input name="id_article" type="hidden" value="'. $msg["id_article"] .'">
                                                </form>
                                                <h4>Supprimer l\'article suivant?</h4>
                                                <p>'. $msg["titre"] .'</p>
                                                <img src="'. $msg["image"] .'" width="300">
                                                <h4> Et son descriptif? </h4>
                                                <p>'. $msg["contenu"] .'</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn enregistrer" form="articleSupp'. $msg["id_article"] .'">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                        ';
                        }
                    ?>
                <!-- modal ajout article -->
                <div class="modal fade" id="ajout-article" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle article</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formAjoutArticle" class="forme-form" method="POST" action="../controller.php">
                                    <input class="form" type="hidden" name="form" value="article">
                                    <div class="validationError titreError">Titre manquant</div>
                                    <input type="text" id="articleTitre" name="titre" placeholder="Titre">
                                    <div class="validationError imageError">Image manquante</div>
                                    <input type="text" id="articleImage" name="image" placeholder="Image">
                                    <div class="validationError contenuError">Contenu manquant</div>
                                    <textarea id="articleContenu" cols="30" rows="10" type="text" name="contenu" placeholder="Contenu"></textarea>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                <button type="button" class="btn color" id="addArticle">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                    </tbody>
                </table>    
            </div>

            <div class="dashtable comArtTable">
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
            </div>

            <div class="dashtable tutorielTable">
                <!-- Tutoriels -->
                <table class="table-dash">
                    <caption>Tutoriels</caption>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Image</th>
                            <th>Image2</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                            <th>
                                <!-- Button AJOUTER tuto -->
                                <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#ajout-tutoriel">
                                    Ajouter
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $tutoriel = $connexion->select("*", "tutoriel");
                        foreach ($tutoriel as $msg) {
                        echo '
                        <form id="tutorielModif'. $msg["id_tutoriel"] . '" action="../controller.php" method="POST">
                        <input name="form" value="tutorielModif" type="hidden">
                        <input name="id_tutoriel" value="'. $msg["id_tutoriel"] . '" type="hidden">
                        <tr>
                            <td><textarea name="titreModif">'. $msg["titre"] . '</textarea></td>
                            <td><textarea cols="50" rows="10" type="text" name="contenuModif">'. $msg["contenu"] . '</textarea></td>
                            <td>
                                <img src="'. $msg["image"] . '" width="150">
                                <textarea name="imageModif">
                                <img src="'. $msg["image"] . '" width="150">
                                </textarea>
    
                            </td>
                            <td>
                                <img src="'. $msg["image2"] . '" width="150">
                                <textarea name="image2Modif">
                                <img src="'. $msg["image2"] . '" width="150">
                                </textarea>
    
                            </td>
                            <td>
                                <!-- modifier -->
                                <button type="button" class="btn button nico" data-bs-toggle="modal" data-bs-target="#modif-tutoriel'. $msg["id_tutoriel"] . '">
                                    Mofifier
                                </button>
                            </td>
                            <td>
                                <!-- supprimer -->
                                <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#supp-tutoriel'. $msg["id_tutoriel"] . '">
                                    Supprimer
                                </button>
                            </td> 
                        </tr>
                        </form>
                        <!-- Modal MODIF -->
                                <div class="modal fade" id="modif-tutoriel'. $msg["id_tutoriel"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modification de l\'article</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4> Es-tu sûr de vouloir modifier? </h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn enregistrer" form="tutorielModif'. $msg["id_tutoriel"] . '">Enregistrer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
    
                                <!-- Modal SUPP -->
                                <div class="modal fade" id="supp-tutoriel'. $msg["id_tutoriel"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de l\'article</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="tutorielSupp'. $msg["id_tutoriel"] .'" class="forme-form" method="POST" action="../controller.php">
                                                    <input class="form" type="hidden" name="form" value="tutorielSupp">
                                                    <input name="id_tutoriel" type="hidden" value="'. $msg["id_tutoriel"] .'">
                                                </form>
                                                <h4>Supprimer le tuto suivant?</h4>
                                                <p>'. $msg["titre"] .'</p>
                                                <img src="'. $msg["image"] .'" width="300">
                                                <img src="'. $msg["image2"] .'" width="300">
                                                <h4> Et son Contenu? </h4>
                                                <p>'. $msg["contenu"] .'</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn enregistrer" form="tutorielSupp'. $msg["id_tutoriel"] .'">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                        ';
                        }
                    ?>
                    </tbody>
                </table>
    
                <!-- modal ajout tutoriel -->
                <div class="modal fade" id="ajout-tutoriel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle article</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formAjoutTutoriel" class="forme-form" method="POST" action="../controller.php">
                                    <input class="form" type="hidden" name="form" value="tutoriel">
                                    <div class="validationError titreError">Titre manquant</div>
                                    <input type="text" id="tutorielTitre" name="titre" placeholder="Titre">
                                    <div class="validationError imageError">Image manquante</div>
                                    <input type="text" id="tutorielImage" name="image" placeholder="Image">
                                    <div class="validationError image2Error">Image2 manquante</div>
                                    <input type="text" id="tutorielImage2" name="image2" placeholder="Image2">
                                    <div class="validationError contenuError">Contenu manquant</div>
                                    <textarea id="tutorielContenu" cols="30" rows="10" type="text" name="contenu" placeholder="Contenu"></textarea>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                                <button type="button" class="btn color" id="addTutoriel">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                    </tbody>
                </table>
            </div>

            <div class="dashtable comTutoTable">                
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
            </div>

            <div class="dashtable utilTable">
                <!-- Utilisateur -->
                <table class="table-dash">
                    <caption>Utilisateurs</caption>
                    <thead>
                        <tr>
                            <th>Pseudonyme</th>
                            <th>Email</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
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
                            <td>
                                <!-- modifier -->
                                <button type="button" class="btn button nico" data-bs-toggle="modal" data-bs-target="#modif-modal'. $msg["id_utilisateur"] . '">
                                    Mofifier
                                </button>
                            </td>
                            <td>
                                <!-- supprimer -->
                                <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#supp-modal'. $msg["id_utilisateur"] . '">
                                    Supprimer
                                </button>
                            </td>        
                        </tr>
                        ';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        
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

            $('.dashTable').hide();

            // btn pour choisir le tableau que l'on veut voir
            $('.btnCont').click(function(){
                $('.galerieTable').hide("slow");
                $('.dashtable').hide("slow");
                $('.contactTable').show("slow");
            });
            $('.btnArt').click(function(){
                $('.galerieTable').hide("slow");
                $('.dashtable').hide("slow");
                $('.articleTable').show("slow");
            });
            $('.btnComArt').click(function(){
                $('.galerieTable').hide("slow");
                $('.dashtable').hide("slow");
                $('.comArtTable').show("slow");
            });
            $('.btnTuto').click(function(){
                $('.galerieTable').hide("slow");
                $('.dashtable').hide("slow");
                $('.tutorielTable').show("slow");
            });
            $('.btnComTuto').click(function(){
                $('.galerieTable').hide("slow");
                $('.dashtable').hide("slow");
                $('.comTutoTable').show("slow");
            });
            $('.btnUtil').click(function(){
                $('.galerieTable').hide("slow");
                $('.dashtable').hide("slow");
                $('.utilTable').show("slow");
            });
            $('.btnGal').click(function(){
                $('.galerieTable').show("slow");
                $('.dashtable').hide("slow");
                $('.dashtable').hide("slow");
            });

            // form galerie
            $('#addPhoto').click(function(event) {

            if ($('#galeriePhoto').val() === '') {
                $('.photoError').show();
            } else {
                $('.photoError').hide();
            }
            if ($('#galerieDescriptif').val() === '') {
                $('.descriptifError').show();
            } else {
                $('.descriptifError').hide();
            }

            if ($('#galeriePhoto').val() !== '' && $('#galerieDescriptif').val() !== '') {
                $('#formAjoutGalerie').submit();
            }
            });

            // form article
            $('#addArticle').click(function(event) {

            if ($('#articleTitre').val() === '') {
                $('.titreError').show();
            } else {
                $('.titreError').hide();
            }
            if ($('#articleImage').val() === '') {
                $('.imageError').show();
            } else {
                $('.imageError').hide();
            }
            if ($('#articleContenu').val() === '') {
                $('.contenuError').show();
            } else {
                $('.contenuError').hide();
            }

            if ($('#articleTitre').val() !== '' && $('#articleImage').val() !== '' && $('#articleContenu').val() !== '') {
                $('#formAjoutArticle').submit();
            }
            });

            // form tutoriel
            $('#addTutoriel').click(function(event) {

            if ($('#tutorielTitre').val() === '') {
                $('.titreError').show();
            } else {
                $('.titreError').hide();
            }
            if ($('#tutorielImage').val() === '') {
                $('.imageError').show();
            } else {
                $('.imageError').hide();
            }
            if ($('#tutorielImage2').val() === '') {
                $('.image2Error').show();
            } else {
                $('.image2Error').hide();
            }
            if ($('#tutorielContenu').val() === '') {
                $('.contenuError').show();
            } else {
                $('.contenuError').hide();
            }

            if ($('#tutorielitre').val() !== '' && $('#tutorielImage').val() !== '' && $('#tutorielContenu').val() !== ''&& $('#tutorielImage2').val() !== '') {
                $('#formAjoutTutoriel').submit();
            }
            });
        });
    </script>
</body>
</html>