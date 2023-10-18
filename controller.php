<?php
include "composants/connexion.php";

if (isset($_POST["form"])) {
    switch ($_POST["form"]) {

        // contact
        case "contact":
            $inserted = $connexion->insert_contact($_POST["pseudonyme"], $_POST["email"], $_POST["sujet"], $_POST["message"]);
            if ($inserted) {
                $response = array('success' => true, 'message' => 'Message sent successfully.');
            } else {
                $response = array('success' => false, 'message' => 'Failed to send message.');
            }
            break;

        // galerie
        case "galerie":
            $inserted = $connexion->insert_galerie($_POST["photo"], $_POST['descriptif']);
            header('location: pages/dashboard.php');
            break;
        case "galerieModif":
            $inserted = $connexion->update_galerie($_POST["id_galerie"], $_POST["photo"], $_POST["descriptif"]);
            header('location: pages/dashboard.php');
            break;
        case "galerieSupp":
            $inserted = $connexion->delete_galerie($_POST["id_galerie"]);
            header('location: pages/dashboard.php');
            break;

        // article
        case "article":
            $inserted = $connexion->insert_article($_POST["titre"], $_POST["contenu"], $_POST["image"]);
            header('location: pages/dashboard.php');
            break;
        case "articleModif":
            $inserted = $connexion->update_article($_POST['id_article'], $_POST["titreModif"], $_POST["contenuModif"], $_POST["imageModif"]);
            header('location: pages/dashboard.php');
            break;
        case "articleSupp":
            $inserted = $connexion->delete_article($_POST["id_article"]);
            header('location: pages/dashboard.php');
            break;
         
            
        // tutoriel
        case "tutoriel":
            $inserted = $connexion->insert_tutoriel($_POST["titre"], $_POST["contenu"], $_POST["image"], $_POST["image2"]);
            header('location: pages/dashboard.php');
            break;
        case "tutorielModif":
            $inserted = $connexion->update_tutoriel($_POST['id_tutoriel'], $_POST["titreModif"], $_POST["contenuModif"], $_POST["imageModif"], $_POST["image2Modif"]);
            header('location: pages/dashboard.php');
            break;
        case "tutorielSupp":
            $inserted = $connexion->delete_tutoriel($_POST["id_tutoriel"]);
            header('location: pages/dashboard.php');
            break;

        // inscription
        case "inscription":
            $pseudo = $_POST["pseudoins"];            
            $email = $_POST["emailins"];
            $mdp = $_POST["mdpins"];
            $confmdp = $_POST["confirmins"];

            $pattern = '/^[a-zA-Z0-9_]+$/';

            if(preg_match($pattern, $pseudo)){
    
                if($mdp === $confmdp){
                    $mdp_hash = password_hash($mdp, PASSWORD_ARGON2I);
                
                    $inserted = $connexion->inscription($pseudo, $email, $mdp_hash);
                    header("Location: pages/contact.php");
                    exit();
                }
            }      
            
            // RENVOYE JSON AU AJAX
            // if ($inserted) {
            //     $response = array('success' => true, 'message' => 'Message sent successfully.');
            // } else {
            //     $response = array('success' => false, 'message' => 'Failed to send message.');
            // }
            break;

        // connexion
        case "connexion":
            $pseudo = $_POST["pseudoco"];
            $mdp = $_POST["mdpco"];
            $inserted = $connexion->connexion("*", "utilisateur");
            foreach($inserted as $compare){
                if($pseudo === $compare["pseudonyme"] && password_verify($mdp,$compare["mdp"])){
                    header('location: pages/tutoriel.php');
                    // $response = array('success' => true, 'message' => 'Message sent successfully.');
                }else{
                    header('location: index.php');
                    // $response = array('success' => false, 'message' => 'Failed to send message.');
                }
            }
            break;


        default:
            $response = array('success' => false, 'message' => 'Invalid form type.');
            break;
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>