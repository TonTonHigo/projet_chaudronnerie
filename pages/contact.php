<?php
// On ouvre notre session
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-moi</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
  
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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
        <h2>Merci pour votre message, je vous répondrai au plus vite !!!</h2>
    </div>

    <div>
        <a href="#" id="icon"><i class="fa-solid fa-circle-arrow-up fa-3x" style="color: #2C2C2C;"></i></i></a>
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
            var formData = {
                pseudonyme: encodeURIComponent($('#pseudonyme').val()),
                email: encodeURIComponent($('#email').val()),
                sujet: encodeURIComponent($('#sujet').val()),
                message: encodeURIComponent($('#message').val()),
                form: 'contact'
            };

            $('.validation-error').hide();

            // Regarde si les champs sont vides
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

        $('#lien_dashboard').click(function(){
            window.location.href = 'dashboard.php';
        });

        $('#logo').hover(function(){
            $(this).css('filter','brightness(2)');
        }, function () {
            $(this).css('filter','none');;
        });

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

    });
</script>
</body>
</html>