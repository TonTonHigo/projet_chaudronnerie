<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLOG</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">

  <!-- fichier css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="preload"></div>
  <div class="containerlogo">
    <div id="logopreload">
      <img class="cachepreload logowow" src="image/Logo.png" alt="">
      <h1 class="cachepreload textintro">Blog<br>Chaudronnerie</h1>
    </div>
  </div>

  <?php include "composants/header.php"; ?>

  <main>

    <section id="propos">

      <div class="introduction">
        <p>
          <strong> Dans le monde fascinant de la chaudronnerie, un art ancien qui a façonné notre histoire depuis des siècles.
        </p>
        <p>
          Imaginez un atelier empli du doux crépitement de la forge, où le métal chaud prend forme sous les mains habiles d'un chaudronnier passionné.
        </p>
        <br>
        <p>
          C'est ici que commence notre histoire.</strong>
        </p>
        <br>
      </div>
      <div class="histoire">
        <p>
          <strong>La Naissance de l'Art :</strong><br>
          La chaudronnerie, c'est l'art de donner vie au métal. Elle a vu le jour bien avant nos machines modernes, lorsque les chaudronniers utilisaient le feu, le marteau et l'enclume pour créer des objets magiques.
        </p>
        <p>
          <strong>Le Métal en Transformation :</strong><br>
          La chaudronnerie, c'est la transformation du métal en quelque chose de plus grand, de plus utile, de plus beau. Chaque pièce forgée est une œuvre d'art en soi, une symphonie de formes et de textures métalliques.
        </p>
        <br>
        <p>
          <strong>L'Héritage du Passé :</strong><br>
          De génération en génération, cet art précieux a été transmis. Les secrets de la chaudronnerie, les techniques et le savoir-faire se sont perpétués.
        </p>
        <br>
        <p class="citation">
          "Chaque pièce de métal a une histoire à raconter, un rêve à réaliser."
        </p>
        <br>
        <p>
          <strong>Un Art Vivant Aujourd'hui :</strong><br>
          Le chaudronnier est un artisan qui maîtrise les techniques de traçage, de découpe, de mise en forme et d’assemblage des métaux en feuilles, des tubes et des profilés. Il réalise des pièces variées, allant du chaudron domestique au réservoir industriel, en passant par la charpente métallique, la tuyauterie ou le mobilier.
        </p>
        <br>
        <p>
          <strong>La Chaudronnerie :</strong><br>
         Une branche industrielle qui regroupe plusieurs secteurs d’activité, tels que l’alimentaire, la chimie, l’énergie, l’aéronautique, la navale, l’automobile ou la menuiserie. La chaudronnerie s’adapte en permanence aux évolutions technologiques et aux besoins du marché. Elle utilise des matériaux divers, comme l’acier, l’inox, le cuivre, l’aluminium, le titane ou les matières plastiques.
        </p>
        <br>
        <p>
          <a href=".\pages\formulaire.php" class="btn-contact">Message ici</a>
        </p>
      </div>
    </section>

  </main>

  <?php include "composants/footer.php"; ?>

  <!-- fichier js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>