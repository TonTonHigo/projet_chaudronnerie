<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
</head>

<body>


    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .logo {
            float: left;
        }

        .navbar .spacer {
            flex-grow: 1;
        }

        .navbar .contact {
            float: right;
        }
    </style>
    </head>

    <body>

        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="logo.png" alt="Logo"></a>
            </div>
            <a href="#">Archive</a>
            <a href="#">Tutoriel</a>
            <a href="#">Galerie</a>
            <div class="spacer"></div>
            <a href="#" class="contact">Contact</a>
        </div>

    </body>

</html>


</body>

</html>