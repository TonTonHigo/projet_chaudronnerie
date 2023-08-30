<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-moi</title>

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
    <form id="contact_form">
      <input name="form" id="form" type="text" value="contact" hidden>
      <input name="pseudonyme" id="pseudonyme" type="text" placeholder="Pseudonyme">
      <input name="email" id="email" type="text" placeholder="Email">
      <input name="sujet" id="sujet" type="text" placeholder="Sujet">
      <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
      <button id="send_contact">Envoyer</button>
    </form>
</main>


<?php include "../composants/footer.php" ?>

 <!-- fichier js -->
 <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>
</html>