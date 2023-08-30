<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie</title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">

    <!-- fichier css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include "../composants/header.php" ?>

    <main>
        <div class="image-gallery">
            <div class="image-container" onclick="showExplication(1)">
                <img src="image\image13.jpg" alt="Image 1">
            </div>
            <div class="image-container" onclick="showExplication(2)">
                <img src="image\image14.jpg" alt="Image 2">
            </div>
            <div class="image-container" onclick="showExplication(2)">
                <img src="image\image15.jpg" alt="Image 3">
            </div>
            <div class="image-container" onclick="showExplication(2)">
                <img src="image\image16.jpg" alt="Image 4">
            </div>
            <div class="image-container" onclick="showExplication(2)">
                <img src="image\image18.png" alt="Image 5">
            </div>
            <div class="image-container" onclick="showExplication(2)">
                <img src="image\image11a.jpg" alt="Image 6">
            </div>
        </div>
        <div class="explication">
            <p id="explication-text"></p>
        </div>
    </main>

    <?php include "../composants/footer.php" ?>

    <!-- fichier js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="script.js"></script>


</body>

</html>