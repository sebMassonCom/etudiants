<?php

require_once 'core/Database.php';

class Model_Utilisateur{

    // private $_sql;

    public function __construct() {
        // $this->_sql = new Database();
        new Database;
    }

    public function recup_ecole(){
        return Database::$db->query("SELECT * FROM ecole"); 
    }

    public function afficher_nom_ecole($ecole){
        return Database::$db->query("SELECT * FROM promotion INNER JOIN id_ecole ON promotion.id_ecole = ecole.id");

    }

    public function afficher_nom_classe($nom){
        return Database::$db->query("SELECT * FROM promotion INNER JOIN nom ON promotion.id_nom = nom.id");

    }

    public function verifier_mdp($mdp){
        $sql = Database::$_sql->query("SELECT * FROM promotion WHERE nom='$mdp' LIMIT 1");
        $sql->execute();
 
    }
}