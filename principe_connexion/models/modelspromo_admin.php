<?php
require_once 'core/Database.php';


class Modelpromo_admin{
    private $_db;

    public function __construct() {
        $this->_db = new Database();
    }

    public function connexionadmin($nom, $ecole, $mot_de_passe){
        $sql = Database::$db->prepare("INSERT INTO user(nom,ecole, mot_de_passe) VALUES (:nom,:ecole,:mot_de_passe)");
        $sql->bindParam(':nom',$nom);
        $sql->bindParam(':ecole',$ecole);
        $sql->bindParam(':mot_de_passe',$mot_de_passe);
        $sql->execute();
    }
}