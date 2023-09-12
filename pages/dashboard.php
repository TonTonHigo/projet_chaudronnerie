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
    <main>

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
                        <button type="button" class="btn button-galerie" data-bs-toggle="modal" data-bs-target="#ajout-photo">
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
                            <td>
                                <!-- image -->
                                <img src="'. $cartes["photo"] . '" width="50">
                            </td>
                            <td>
                                <!-- descriptif -->
                                <p class="text-galerie">' . $cartes['descriptif'] . '</p> 
                            </td>
                            <td>
                                <!-- modifier -->
                                <button type="button" class="btn button-galerie nico" data-bs-toggle="modal" data-bs-target="#modif-modal'. $cartes["id_galerie"] . '">
                                    Mofifier
                                </button>
                            </td>
                            <td>
                                <!-- supprimer -->
                                <button type="button" class="btn button-galerie" data-bs-toggle="modal" data-bs-target="#supp-modal'. $cartes["id_galerie"] . '">
                                    Supprimer
                                </button>
                            </td>                  

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
                                        <form class=" forme-form" method="POST" action="../controller.php">
                                            <input class="form" type="hidden" name="form" value="galerie">
                                            <div class="validation-error photoError">Photo manquante</div>
                                            <input type="text" id="photo" name="photo" placeholder="Photo">
                                            <div class="validation-error descriptifError">Descriptif manquant</div>
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

                        <!-- Modal SUPP -->
                        <div class="modal fade" id="supp-modal'. $cartes["id_galerie"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de photo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class=" forme-form" method="POST" action="../controller.php">
                                            <input class="form" type="hidden" name="form" value="galerie">
                                            <div class="validation-error photoError">Photo manquante</div>
                                            <input type="text" id="photo" name="photo" placeholder="Photo">
                                            <div class="validation-error descriptifError">Descriptif manquant</div>
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
                        <form class="crud forme-form" method="POST" action="../controller.php">
                            <input class="form" type="hidden" name="form" value="galerie">
                            <div class="validation-error photoError">Photo manquante</div>
                            <input type="text" id="photo" name="photo" placeholder="Photo">
                            <div class="validation-error descriptifError">Descriptif manquant</div>
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
        <!-- Contact reçu -->
        
    </main>

    <!-- fichier js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // galerie
            $('.validation-error').hide();

           $('.enregistrer').click(function(){

            if($('#photo').val() === ''){
                $('.photoError').show("slow");
            }else{
                $('.photoError').hide("slow");
            }
            if($('#descriptif').val() === ''){
                $('.descriptifError').show("slow");
            }else{
                $('.descriptifError').hide("slow");
            }

            if($('#photo').val()!== '' && $('#descriptif').val() !== ''){
                $('.crud').submit();
            }

           });

        });
    </script>
</body>
</html>