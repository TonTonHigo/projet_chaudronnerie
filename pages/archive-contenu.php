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

        <?php

        $post = $_POST['resume'];
        $archivecontenu = $connexion->select_where($post);
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