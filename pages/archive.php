<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoriel</title>

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
        <div class="image-grid">
            <div class="image-container" onclick="showExplication(1)">
                <img src="../image/image13.jpg" alt="Image 1">
            </div>
            <div class="image-container" onclick="showExplication(2)">
                <img src="../image/image14.jpg" alt="Image 2">
            </div>
            <div class="image-container" onclick="showExplication(3)">
                <img src="../image/image15.jpg" alt="Image 3">
            </div>
            <div class="image-container" onclick="showExplication(4)">
                <img src="../image/image16.jpg" alt="Image 4">
            </div>
            <div class="image-container" onclick="showExplication(5)">
                <img src="../image/image18.png" alt="Image 5">
            </div>
            <div class="image-container" onclick="showExplication(6)">
                <img src="../image/image11a.jpg" alt="Image 6">
            </div>

            <div class="explication">
                <p id="explication-text"></p>
            </div>
    </main>

    <?php include "../composants/footer.php" ?>

    <!-- fichier js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        function showExplication(imageNumber) {
            var explicationText = "";

            switch (imageNumber) {
                case 1:
                    explicationText = "Explication de l'image 1.";
                    break;
                case 2:
                    explicationText = "Explication de l'image 2.";
                    break;
                case 3:
                    explicationText = "Explication de l'image 3.";
                    break;
                case 4:
                    explicationText = "Explication de l'image 4.";
                    break;
                case 5:
                    explicationText = "Explication de l'image 5.";
                    break;
                case 6:
                    explicationText = "Explication de l'image 6.";
                    break;
                default:
                    explicationText = "Aucune explication disponible.";
            }

            document.getElementById("explication-text").textContent = explicationText;
        }
    </script>
</body>

</html>