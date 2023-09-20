<?php include "../composants/connexion.php" ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion-Inscription</title>

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
        $user = $connexion->select("*", "utilisateur");
        foreach ($user as $msg) {
            echo '
                    <tr>
                        <td>' . $msg["pseudonyme"] . '</td>                        
                        <td>' . $msg["mdp"] . '</td>                       
                    </tr>
                    ';
        }
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">pseudonyme</th>
                    <th scope="col">mdp</th>
                </tr>

            </thead>

            <tbody>
                <?php
                foreach ($utilisateurs as $user) {
                    echo '<tr>';
                    echo '<td>' . $user["pseudonyme"] . '</td>';
                    echo '<td>' . $user["mdp"] . '</td>';
                    echo '</tr>';
                }

                ?>

            </tbody>

        </table>

    </main>


    <?php include "../composants/footer.php" ?>

    <!-- fichier js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>





    <!-- script pour gérer la connexion -->

    <script>
        function handleConnexion() {
            const pseudo = document.getElementById('pseudonyme').value;
            const mdp = document.getElementById('mdp').value;

            if (!pseudo || !mdp) {
                alert('Veuillez remplir tous les champs.');
                return;
            }

            const formData = {
                pseudo,
                mdp
            };

            // Envoye les données au serveur pour la connexion

            $.ajax({
                url: '../composants/connexion.php', 
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function(response) {
                    alert('Connexion réussie !');
                    $('#conn-modal').modal('hide');
                },
                error: function(error) {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de la connexion.');
                }
            });
        }

        // Associer la fonction handleConnexion au clic du bouton "Enregistrer" dans le modal de connexion
        $(document).ready(function() {
            $('#conn-modal .enregistrer').click(function() {
                handleConnexion();
            });
        });
    </script>




</body>

</html>