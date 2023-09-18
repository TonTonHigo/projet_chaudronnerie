<?php include "../composants/connexion.php" ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutoriel</title>

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

    <div class="image-tutoriel">
      
      <?php

      $tutoriel = $connexion->select("*", "tutoriel");
      foreach ($tutoriel as $cartes) {
        echo '<div class="image-tutoriel-">';
        echo '<img src="' . $cartes["image"] . '" class="cadre-tutoriel">';
        echo '<div class="card-body">';
        echo '<h1 class="tutoriel-contenu-titre">' . $cartes["titre"] . '</h1>';
        echo '<div class="tutoriel-contenu-text">';
        echo '<p class="card-text">' . nl2br($cartes["contenu"]) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>

    </div>









  </main>


  <?php include "../composants/footer.php" ?>

  <!-- fichier js -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script>

  </script>
</body>

</html>