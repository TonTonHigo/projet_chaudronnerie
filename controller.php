<?php
include "composants/connexion.php";

if (isset($_POST["form"])) {
    switch ($_POST["form"]) {
        case "contact":
            $inserted = $connexion->insert_contact($_POST["pseudonyme"], $_POST["email"], $_POST["sujet"], $_POST["message"]);
            if ($inserted) {
                $response = array('success' => true, 'message' => 'Message sent successfully.');
            } else {
                $response = array('success' => false, 'message' => 'Failed to send message.');
            }
            break;

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
                
        default:
            $response = array('success' => false, 'message' => 'Invalid form type.');
            break;
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>