<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #6C6C6C;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            
        }

        .navbar a {
            color: #FF6347;
            text-align: center;
            text-decoration: none;
            font-family: 'Wallpoet', cursive;
            font-size: 18px;
            
            padding: 10px 20px;
           
        }

        

        .navbar .logo {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            max-width: 30%;
        }

        .navbar .centered-links {
            flex: 2;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .navbar .contact {
            flex: 1;
            text-align: right;
            padding-right: 20px;
            
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">
            <a href="#"><img src="image\Logo.png" alt="Logo"></a>
        </div>
        <div class="centered-links">
            <a href="archive.html">Archive</a>
            <a href="tutoriel.html">Tutoriel</a>
            <a href="galerie.html">Galerie</a>
        </div>
        <div class="contact">
            <a href="#">Contact</a>
        </div>
    </div>

</body>

</html>