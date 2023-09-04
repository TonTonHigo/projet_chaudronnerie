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
            if ($inserted) {
                // Retrieve the updated gallery data
                $updatedGallery = $connexion->select("*", "galerie");

                $response = array('success' => true, 'message' => 'Image added to the gallery.', 'gallery' => $updatedGallery);
            } else {
                $response = array('success' => false, 'message' => 'Failed to add image to the gallery.');
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