<?php
require_once 'core/Database.php';

class Modelpromo_etudiant{
    private $_db;

    public function __construct() {
        $this->_db = new Database();
    }

    public function connexionetu($nom, $ecole, $mot_de_passe){
        $sql = Database::$db->prepare("INSERT INTO user(ecole, mot_de_passe) VALUES (:ecole,:mot_de_passe)");
        $sql->bindParam(':ecole',$ecole);
        $sql->bindParam(':mot_de_passe',$mot_de_passe);
        $sql->execute();
    }
}




