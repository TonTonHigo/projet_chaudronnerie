<?php
// On ouvre notre session
session_start(); 
include "../composants/connexion.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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

        <!-- SI il y une session article alors $articles prend la valeur de la session article
            SINON $articles prend la valeur su post id_article et la session prend la valeur de $articles
            se sera utile quand on commentera pour que la page ne perde pas l'id de l'article afficher -->
        <?php
        if(isset($_SESSION['article'])){
            $article = $_SESSION['article'];

        }else{
            $article = $_POST['id_article'];
            $_SESSION['article'] = $article;
        }

        $archivecontenu = $connexion->select_where($article);
        foreach ($archivecontenu as $cartes) {
            echo '<div class="archive-contenu-grid">';
            echo '<img src="' . $cartes["image"] . '" class="cadre-archive-contenu">';
            echo '<div class="card-body">';
            echo '<h1 class="archive-contenu-titre">' . $cartes["titre"] . '</h1>';
            echo '<div class="archive-contenu-text">';
            echo '<p class="card-text">' . nl2br($cartes["contenu"]) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '

            <!-- Section pour les commentaires -->
            <h3>Commentaires</h3>
            <div class="comment-section">

                ';            

            // On affiche les commentaire
            $commentaires = $connexion->select_where_commentaire("commentaire", "*", $article);
            if ($commentaires != null) {
                foreach ($commentaires as $coms) {
                    if ($coms['id_article'] == $article) {

                        echo '
                            <small>';

                            $comauteur = $connexion->select_where_utilisateur("utilisateur", "*", $coms['id_utilisateur']);
                            foreach ($comauteur as $nomaut) {
                                echo $nomaut['pseudonyme'];
                            }
                            echo ' ' . $coms['date'] . '</small>
                                    <p>' . $coms['message'] . '</p>';

                                // SI une session est en cours alors on fait le switch
                                if(isset($_SESSION['role'])){
                                    // Le switch regarde deux cas différent pour le role de la session
                                    switch ($_SESSION['role']) {
                                        // Si le role est 1(admin) alors un boutton pour SUPPRIMER le commentaire s'affichera
                                        case 1:
            
                                            echo '
                                                    <button type="button" class="button_com" data-bs-toggle="modal" data-bs-target="#delete' . $coms['id_commentaire'] . '"><span>DELETE</span></button>
                                                ';
                                            echo '
                                                <!-- Modal DELETE -->
                                                    <div class="modal fade" id="delete' . $coms['id_commentaire'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un article</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">';
            
                                            echo 'Veut-tu vraiment supprimer le commentaire "' . $coms['message'] . '" id: ' . $coms['id_commentaire'] . ' de '. $nomaut['pseudonyme'] . ' id: '. $coms['id_utilisateur'] .' ?';
                                            echo '
                    
                                                                <!-- form codepen -->
                                                                <div class="login-page">
                                        
                                                                <div class="form">
                                        
                                                                    <form  method="POST" action="../controller.php" id="delete_commentaire' . $coms['id_commentaire'] . '">
                                                                        <input name="form" type="hidden" value="commentaire_delete">                                                   
                                                                        <input name="id_comdelete" type="hidden" value="' . $coms['id_commentaire'] . '">                                                        
                                                                    </form>
                                        
                                                                </div>
                                                            </div>
                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button form="delete_commentaire' . $coms['id_commentaire'] . '" type="submit" class="btn btn-primary">Supprimer le commentaire</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>';
                                            break;
            
                                        // Si le role est 2(abonné) alors un boutton pour UPDATE et SUPPRIMER le commentaire s'affichera
                                        // Seulement si l'id de la session est égale à l'id du commentaire 
                                        case 2:
                                            if (isset($_SESSION['id']) && ($_SESSION['id'] == $coms['id_utilisateur'])) {
                                                echo '
                                                    <div id="mdr">
                                                        <button type="button" class="button_com" data-bs-toggle="modal" data-bs-target="#update' . $coms['id_commentaire'] . '">UPDATE</button>
                                                        <button type="button" class="button_com" data-bs-toggle="modal" data-bs-target="#delete' . $coms['id_commentaire'] . '">DELETE</button>
                                                    </div>      
                                                            ';

                                                    echo '
                                                            <!-- Modal Update -->
                                                                <div class="modal fade" id="update' . $coms['id_commentaire'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un article</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">';
                
                                                    echo 'Veut-tu vraiment changer ton commentaire ' . $coms['message'] . ' ?';
                                                    echo '

                                                                        <div class="login-page">
                                                    
                                                                            <div class="form">
                                                    
                                                                                    <form  method="POST" action="../controller.php" id="update_commentaire' . $coms['id_commentaire'] . '">
                                                                                        <input name="form" type="hidden" value="commentaire_update">                                                        
                                                                                        <input name="id_comdupdate" type="hidden" value="' . $coms['id_commentaire'] . '">
                                                                                        <textarea name="message" placeholder="Votre commentaire" required></textarea>                                                        
                                                                                    </form>
                                                    
                                                                            </div>
                                                                        </div>
                                                    
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                        <button form="update_commentaire' . $coms['id_commentaire'] . '" type="submit" class="btn btn-primary">Changer le commentaire</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                </div>';
                                                
                                                echo '
                                                        <!-- Modal DELETE -->
                                                            <div class="modal fade" id="delete' . $coms['id_commentaire'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un article</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">';
            
                                                echo 'Veut-tu vraiment supprimer ton commentaire ' . $coms['message'] . ' ?';
                                                echo '

                                                                    <div class="login-page">
                                                
                                                                        <div class="form">
                                                
                                                                                <form  method="POST" action="../controller.php" id="delete_commentaire' . $coms['id_commentaire'] . '">
                                                                                    <input name="form" type="hidden" value="commentaire_delete">                                                        
                                                                                    <input name="id_comdelete" type="number" value="' . $coms['id_commentaire'] . '" hidden>                                                        
                                                                                </form>
                                                
                                                                        </div>
                                                                    </div>
                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                    <button form="delete_commentaire' . $coms['id_commentaire'] . '" type="submit" class="btn btn-primary">Supprimer le commentaire</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>';
                                            }
            
                                            break;
                                    }
                                }
                        
                    }
                }
            }
            
            // Enfin on affiche un formulaire pour envoyer un commentaire si il y a une session de lancé
            if (isset($_SESSION['role'])) {
                echo '
                            <form id="com_form" class="comment-form" method="POST" action="../controller.php">
                                <input name="form" type="hidden" value="commentaire_article">
                                <input name="id_article" type="hidden" value="'.$article.'">
                                <input name="id_utilisateur" type="hidden" value="' . $_SESSION['id'] . '">
                                <textarea name="message" placeholder="Votre commentaire" required></textarea>
                                <button type="submit">Poster le commentaire</button>
                            </form>
                            
                            ';
            }

            echo '
                        </div>
                    </div>';
        }
            
            
            
        
        ?>

        <div>
            <a href="#" id="icon"><i class="fa-solid fa-circle-arrow-up fa-3x" style="color: #2C2C2C;"></i></i></a>
        </div>

    </main>

    <?php include "../composants/footer.php" ?>

    <!-- fichier js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
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

            $('#lien_dashboard').click(function(){
            window.location.href = 'dashboard.php';
            });

            $('#logo').hover(function(){
                $(this).css('filter','brightness(2)');
            }, function () {
                $(this).css('filter','none');;
            });
        });
    </script>


</body>

</html>