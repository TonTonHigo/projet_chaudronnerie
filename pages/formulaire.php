<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-moi</title>

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
    <form id="contact_form">
        <h1 id="titre-contact">Contactez-moi</h1>
        <div id="pseudonymeError" class="validation-error">Pseudonyme manquant</div>
        <input name="pseudonyme" id="pseudonyme" type="text" placeholder="Pseudonyme">
        
        <div id="emailError" class="validation-error">Email manquant</div>
        <input name="email" id="email" type="text" placeholder="Email">
        
        <div id="sujetError" class="validation-error">Sujet manquant</div>
        <input name="sujet" id="sujet" type="text" placeholder="Sujet">
        
        <div id="messageError" class="validation-error">Message manquant</div>
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
        
        <button type="button" id="send_contact">Envoyer</button>
    </form>

    <div id="merci-contact">
        <h2>Merci pour votre message, je vous répondrez au plus vite !!!</h2>
    </div>

</main>

<?php include "../composants/footer.php" ?>

<!-- fichier js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#merci-contact').hide();
        $('.validation-error').hide();

        $('#send_contact').click(function () {
            // Gather form data
            var formData = {
                pseudonyme: $('#pseudonyme').val(),
                email: $('#email').val(),
                sujet: $('#sujet').val(),
                message: $('#message').val(),
                form: 'contact' // Add the form field
            };

            // Reset validation messages
            $('.validation-error').hide();

            // Check if any of the input fields is empty
            var hasErrors = false;
            if (formData.pseudonyme.trim() === '') {
                $('#pseudonymeError').show();
                hasErrors = true;
            }
            if (formData.email.trim() === '') {
                $('#emailError').show();
                hasErrors = true;
            }
            if (formData.sujet.trim() === '') {
                $('#sujetError').show();
                hasErrors = true;
            }
            if (formData.message.trim() === '') {
                $('#messageError').show();
                hasErrors = true;
            }

            if (!hasErrors) {
                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: '../controller.php', // Update the URL to your PHP script
                    data: formData,
                    dataType: 'json', // You can specify the data type based on your server's response
                    success: function (response) {
                        // Hide the form and display the "Thank you" message
                        $("#contact_form").slideUp("slow");
                        $('#merci-contact').show("slide", {direction:"top"},1000);
                        $('#pseudonyme').val("");
                        $('#email').val("");
                        $('#sujet').val("");
                        $('#message').val("");
                    },
                    error: function (xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                        console.log(xhr.responseText); // Log the detailed error message.
                    }
                });
            }
        });

    });
</script>
</body>
</html>