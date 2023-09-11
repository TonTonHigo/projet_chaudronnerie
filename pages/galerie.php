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

            <!-- Button AJOUTER photo -->
            <button type="button" class="btn button-galerie" data-bs-toggle="modal" data-bs-target="#ajout-photo">
                Ajouter une photo
            </button>

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


        <div class="grid-galerie">
            <?php
            $galerie = $connexion->select("*", "galerie");
            foreach ($galerie as $cartes) {
                echo '                   
            <div class="carte-ordonne">
                <div class="cadre-photo" style="background-image: url(' . $cartes["photo"] . ')">
                    <p id="text-galerie' . $cartes["id_galerie"] . '" class="text-galerie">' . $cartes['descriptif'] . '</p>          
                </div>
                <div>
                    <!-- Button MODIFIER SUPPRIMER photo -->
                    <button type="button" class="btn button-galerie nico" data-bs-toggle="modal" data-bs-target="#modif-modal'. $cartes["id_galerie"] . '">
                        Mofifier une photo
                    </button>
                    <button type="button" class="btn button-galerie" data-bs-toggle="modal" data-bs-target="#supp-modal'. $cartes["id_galerie"] . '">
                        Supprimer une photo
                    </button>
                </div>

                <!-- Modal MODIF -->
                <div class="modal fade" id="modif-modal'. $cartes["id_galerie"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modification de photo</h1>
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

                <!-- Modal SUPP -->
                <div class="modal fade" id="supp-modal'. $cartes["id_galerie"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de photo</h1>
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
            $('.validation-error').hide();

            $('.cadre-photo').hover(function() {
                $(this).find('.text-galerie').slideDown("slow");
            }, function() {
                $(this).find('.text-galerie').slideUp("slow");
            });

           $('.enregistrer').click(function(){

            if($('#photo').val() === ''){
                $('#photoError').show("slow");
            }else{
                $('#photoError').hide("slow");
            }
            if($('#descriptif').val() === ''){
                $('#descriptifError').show("slow");
            }else{
                $('#descriptifError').hide("slow");
            }

            if($('#photo').val()!== '' && $('#descriptif').val() !== ''){
                $('.crud').submit();
            }

           });

        });
    </script>
</body>

</html>