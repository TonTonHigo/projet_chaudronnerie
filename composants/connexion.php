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

            $dsn = "mysql:host=" . $this-> host . "; dbname=" . $this-> nom_bd . "; charset:=utf8mb4";
            $this-> connexionPDO = new PDO($dsn, $this-> user, $this-> password);
            $this-> connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "<style> body{background-color: lightcyan; color: darkbrown;} </style>";
            // echo "connexion réussi" . "<br>" ."↜(╰ •ω•)╯!" . "<br>";

        } catch (PDOException $e) {

            echo "connexion pas marché!" . "<br>" ."(╥╯⌒╰╥๑)" . "<br>";
            echo "<style> body{background-color: #FB4640; color: white;} </style>";
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
    // INSERTION galerie 
    public function insert_galerie($photo, $descriptif){ 

            try {

                $insert = "INSERT INTO  `galerie`( photo, descriptif)  VALUES (?, ?)";
    
                $requete = $this -> connexionPDO -> prepare($insert);
                $requete->bindValue(1, $photo, PDO::PARAM_STR);
                $requete->bindValue(2, $descriptif, PDO::PARAM_STR);
    
            
                $requete->execute();
    
            } catch (PDOException $e) {
    
                echo "Erreur : " . $e->getMessage();
    
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
    
    
}     
 

        



$connexion = new ma_connexion("localhost", "bdd_chaudronnerie", "root", "");

?>




