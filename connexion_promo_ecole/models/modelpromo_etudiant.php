<?php
require_once 'core/Database.php';

class Modelpromo_etudiant{
    private $_db;

    public function __construct() {
        $this->_db = new Database();
    }

    /**
     * function to log the student in
     * @param $ecole
     * @param $prom
     * @param mdp
     * return bool
     */
    public function espaceecole($ecole, $mot_de_passe){
        $sql = Database::$db->prepare("INSERT INTO users(ecole, mot_de_passe) VALUES (:ecole,:mot_de_passe)");// insert => password_verify
        $sql->bindParam(':ecole',$ecole);
        $sql->bindParam(':mot_de_passe',$mot_de_passe);
        $sql->execute();
    }
}




