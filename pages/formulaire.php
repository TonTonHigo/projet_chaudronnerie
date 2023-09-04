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

<h1 id="titre-contact">Contactez-moi</h1>

<main>
    <form id="contact_form">
        <input name="pseudonyme" id="pseudonyme" type="text" placeholder="Pseudonyme">
        <input name="email" id="email" type="text" placeholder="Email">
        <input name="sujet" id="sujet" type="text" placeholder="Sujet">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
        <button type="button" id="send_contact">Envoyer</button>
    </form>

    <div id="merci-contact">
        <h2>Merci pour votre message, je vous répondrez au plus vite!!!</h2>
    </div>
</main>


<?php include "../composants/footer.php" ?>

 <!-- fichier js -->
 <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script>
    
    $(document).ready(function () {
        $('#merci-contact').hide();

        $('#send_contact').click(function () {
            // Gather form data
            var formData = {
                pseudonyme: $('#pseudonyme').val(),
                email: $('#email').val(),
                sujet: $('#sujet').val(),
                message: $('#message').val(),
                form: 'contact' // Add the form field
            };

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: '../controller.php', // Update the URL to your PHP script
                data: formData,
                dataType: 'json', // You can specify the data type based on your server's response
                success: function (response) {
                    // Hide the form and display the "Thank you" message
                    $("#titre-contact").slideUp("slow");
                    $("#contact_form").slideUp("slow");
                    $('#merci-contact').show("slide", {direction: "top"},1000);
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                }
            });
        });
    });

  </script>
</body>
</html>