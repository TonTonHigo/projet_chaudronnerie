<?php

class ma_connexion{

    private $host;
    private $nom_bd;
    private $user;
    private $password;
    private $connexionPDO;

    public function __construct($host, $nom_bd, $user, $password)
    {
        $this -> host = $host;
        $this -> nom_bd = $nom_bd;
        $this -> user = $user;
        $this -> password = $password;

        try {

            $dsn = "mysql:host=" . $this-> host . "; dbname=" . $this-> nom_bd . "; charset:=utf8mb4_unicode_ci";
            $this-> connexionPDO = new PDO($dsn, $this-> user, $this-> password);
            $this-> connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    // SECLECT
    public function select( $colonne, $table){
        try {

            $select = "SELECT $colonne FROM $table";
            $requete = $this -> connexionPDO -> prepare($select);
            $requete -> execute();
            $afficher = $requete -> fetchAll(PDO::FETCH_ASSOC);

            return $afficher;

        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();

        }
    }
    public function select_where($id){
        try {

            $select = "SELECT * FROM article WHERE id_article=$id";

            $requete = $this -> connexionPDO -> prepare($select);
            $requete -> execute();
            $afficher = $requete -> fetchAll(PDO::FETCH_ASSOC);

            return $afficher;

        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();

        }
    }

    public function select_where_commentaire($table, $column, $id) {
        try {
            $requete = "SELECT $column FROM $table WHERE id_article = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); // Fetch the result of the query into an associative array

            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function select_where_utilisateur($table, $column, $id) {
        try {
            $requete = "SELECT $column FROM $table WHERE id_utilisateur = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); // Fetch the result of the query into an associative array

            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    // INSERTION contact 
    public function insert_contact($pseudonyme, $email, $sujet, $message) { 
        try {
            $insert = "INSERT INTO `contact` (pseudonyme, email, sujet, message) VALUES (?, ?, ?, ?)";
            $requete = $this->connexionPDO->prepare($insert);
            $requete->bindValue(1, $pseudonyme, PDO::PARAM_STR);
            $requete->bindValue(2, $email, PDO::PARAM_STR);
            $requete->bindValue(3, $sujet, PDO::PARAM_STR);
            $requete->bindValue(4, $message, PDO::PARAM_STR);
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        } 
    }
    // INSERTION article 
    public function insert_article($titre, $contenu ,$image) { 
        try {
            $insert = "INSERT INTO `article` (titre, contenu, image) VALUES (?, ?, ?)";
            $requete = $this->connexionPDO->prepare($insert);
            $requete->bindValue(1, $titre, PDO::PARAM_STR);
            $requete->bindValue(2, $contenu, PDO::PARAM_STR);
            $requete->bindValue(3, $image, PDO::PARAM_STR);
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        } 
    }
    // INSERTION galerie 
    public function insert_galerie($photo, $descriptif){ 

            try {

                $insert = "INSERT INTO  `galerie` ( photo, descriptif)  VALUES (?, ?)";
    
                $requete = $this -> connexionPDO -> prepare($insert);
                $requete->bindValue(1, $photo, PDO::PARAM_STR);
                $requete->bindValue(2, $descriptif, PDO::PARAM_STR);
    
            
                $requete->execute();
    
            } catch (PDOException $e) {
    
                echo "Erreur : " . $e->getMessage();
    
            }
    }
    // INSERTION tutoriel 
    public function insert_tutoriel($titre, $contenu, $image, $image2){ 

            try {

                $insert = "INSERT INTO  `tutoriel` (titre, contenu, image, image2)  VALUES (?, ?, ?, ?)";
    
                $requete = $this -> connexionPDO -> prepare($insert);
                $requete->bindValue(1, $titre, PDO::PARAM_STR);
                $requete->bindValue(2, $contenu, PDO::PARAM_STR);
                $requete->bindValue(3, $image, PDO::PARAM_STR);
                $requete->bindValue(4, $image2, PDO::PARAM_STR);
    
            
                $requete->execute();
    
            } catch (PDOException $e) {
    
                echo "Erreur : " . $e->getMessage();
    
            }
    }

    public function insert_com($id_utilisateur, $id_article, $message)
    {
        try {
            $requete = "INSERT INTO `commentaire`(id_utilisateur, id_article, message) VALUES ( ?, ?, ?)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $id_utilisateur);
            $requete_preparee->bindValue(2, $id_article);
            $requete_preparee->bindValue(3, $message);

            $requete_preparee->execute();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // UPDATE 
    public function update($id, $nom, $prenom, $email , $age) {

        try {
            $update = "UPDATE `contacts` SET nom = ?, prenom = ?, email = ?, age = ? WHERE `id_contacts` = ?";
    
            $requete = $this->connexionPDO->prepare($update);
            $requete->bindValue(1, $nom, PDO::PARAM_STR);
            $requete->bindValue(2, $prenom, PDO::PARAM_STR);
            $requete->bindValue(3, $email, PDO::PARAM_STR);
            $requete->bindValue(4, $age, PDO::PARAM_INT);
            $requete->bindValue(5, $id, PDO::PARAM_INT);
    
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    // UPDATE GALERIE
    public function update_galerie($id, $photo, $descriptif) {

        try {
            $update = "UPDATE `galerie` SET photo = ?, descriptif = ? WHERE `id_galerie` = ?";
    
            $requete = $this->connexionPDO->prepare($update);
            $requete->bindValue(1, $photo, PDO::PARAM_STR);
            $requete->bindValue(2, $descriptif, PDO::PARAM_STR);
            $requete->bindValue(3, $id, PDO::PARAM_INT);
    
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    // UPDATE article
    public function update_article($id, $titre, $contenu, $image) {

        try {
            $update = "UPDATE `article` SET titre = ?, contenu = ?, image = ? WHERE `id_article` = ?";
    
            $requete = $this->connexionPDO->prepare($update);
            $requete->bindValue(1, $titre, PDO::PARAM_STR);
            $requete->bindValue(2, $contenu, PDO::PARAM_STR);
            $requete->bindValue(3, $image, PDO::PARAM_STR);
            $requete->bindValue(4, $id, PDO::PARAM_INT);
    
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    // UPDATE tutoriel
    public function update_tutoriel($id, $titre, $contenu, $image, $image2) {

        try {
            $update = "UPDATE `tutoriel` SET titre = ?, contenu = ?, image = ?, image2 = ? WHERE `id_tutoriel` = ?";
    
            $requete = $this->connexionPDO->prepare($update);
            $requete->bindValue(1, $titre, PDO::PARAM_STR);
            $requete->bindValue(2, $contenu, PDO::PARAM_STR);
            $requete->bindValue(3, $image, PDO::PARAM_STR);
            $requete->bindValue(4, $image2, PDO::PARAM_STR);
            $requete->bindValue(5, $id, PDO::PARAM_INT);
    
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    // UPDATE commentaire
    public function update_com($id, $message) {

        try {
            $update = "UPDATE `commentaire` SET message = ? WHERE `id_commentaire` = ?";
    
            $requete = $this->connexionPDO->prepare($update);
            $requete->bindValue(1, $message, PDO::PARAM_STR);
            $requete->bindValue(2, $id, PDO::PARAM_STR);    
            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }



    // DELETE
    public function delete($id) {

        try {
            $delete = "DELETE FROM `contacts` WHERE `id_contacts` = ?";
    
            $requete = $this->connexionPDO->prepare($delete);
            $requete->bindValue(1, $id);

            $requete->execute();

        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    // DELETE
    public function delete_user($id) {
        try {
            $delete = "DELETE FROM `utilisateur` WHERE `id_utilisateur` = ?";
    
            $requete = $this->connexionPDO->prepare($delete);
            $requete->bindValue(1, $id);

            $requete->execute();

        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    // DELETE GALERIE
    public function delete_galerie($id) {

        try {
            $delete = "DELETE FROM `galerie` WHERE `id_galerie` = ?";
    
            $requete = $this->connexionPDO->prepare($delete);
            $requete->bindValue(1, $id);

            $requete->execute();

        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    // DELETE article
    public function delete_article($id) {

        try {
            $delete = "DELETE FROM `article` WHERE `id_article` = ?";
    
            $requete = $this->connexionPDO->prepare($delete);
            $requete->bindValue(1, $id);

            $requete->execute();

        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    // DELETE tutoriel
    public function delete_tutoriel($id) {

        try {
            $delete = "DELETE FROM `tutoriel` WHERE `id_tutoriel` = ?";
    
            $requete = $this->connexionPDO->prepare($delete);
            $requete->bindValue(1, $id);

            $requete->execute();

        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    public function delete_com($cond){
        try {
            $requete = "DELETE FROM `commentaire` WHERE id_commentaire = ?";
            $resultat = $this->connexionPDO->prepare($requete);
            $resultat->bindValue(1, $cond);

            $resultat->execute();

            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }

     // connexion
     public function connexion($colonne, $table){
        try {

            $select = "SELECT $colonne FROM $table";

            $requete = $this -> connexionPDO -> prepare($select);
            $requete -> execute();
            $afficher = $requete -> fetchAll(PDO::FETCH_ASSOC);

            return $afficher;

        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();

        }
    }
     // inscription
     public function inscription($pseudonyme, $email, $mdp){ 

        try {

            $insert = "INSERT INTO  `utilisateur` (pseudonyme, email, mdp, id_role)  VALUES (?, ?, ?, ?)";

            $requete = $this -> connexionPDO -> prepare($insert);
            $requete->bindValue(1, $pseudonyme, PDO::PARAM_STR);
            $requete->bindValue(2, $email, PDO::PARAM_STR);
            $requete->bindValue(3, $mdp, PDO::PARAM_STR);
            $requete->bindValue(4, "2", PDO::PARAM_INT);

        
            $requete->execute();

        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();

        }
}
    
    
}   


$connexion = new ma_connexion("localhost", "bdd_chaudronnerie", "root", "");

?>




