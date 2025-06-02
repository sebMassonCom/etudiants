<?php

require_once 'core/Database.php';

class Model_Admin{

    // private $_sql;

    public function __construct() {
        // $this->_sql = new Database();
        new Database; 
    }

    public function creer_ecole(){
        return Database::$db->query("SELECT * FROM ecole"); 
    }

    public function creer_classe($ecole, $nom , $mdp){
        // $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

        
        $sql = Database::$db->prepare("INSERT INTO promotion(id_ecole,nom_promotion, mot_de_passe) VALUES (:id_ecole,:nom_promotion ,:mot_de_passe)");
        $sql->bindParam(':id_ecole', $ecole);
        $sql->bindParam(':nom_promotion', $nom);
        $sql->bindParam(':mot_de_passe', $mdp);
        $sql->execute();
        
    }

    // public function creer_mdp($mdp){
    //     $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

    //     $sql = Database::$db->prepare("INSERT INTO promotion(mot_de_passe) VALUES (:mot_de_passe)");
    //     $sql->bindParam(':mot_de_passe', $hashed_password);
    //     $sql->execute();
    // }
}