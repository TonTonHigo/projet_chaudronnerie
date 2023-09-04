<?php

include "composants/connexion.php";

if(isset($_POST["form"])){
    switch($_POST["form"]){
        case "contact":
            // Pour envoyer un mail
            // if($_POST["message"]) {
    
    
            // mail("your@email.address", "Here is the subject line",
    
    
            // $_POST["insert your message here"]. "From: an@email.address");
    
    
            // }
            break;
        case "galerie":
            $connexion -> insert_galerie($_POST["photo"],$_POST['descriptif']);
            header("location: pages/galerie.php");
            break;
    }
    
}



?>