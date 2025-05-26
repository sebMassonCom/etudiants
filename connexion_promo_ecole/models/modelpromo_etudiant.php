<?php
require_once 'core/Database.php';

class Modelpromo_etudiant {
    private $_db;

    public function __construct() {
        $this->_db = new Database();
    }

    public function afficherecole() {
        return Database::$db->query("SELECT * FROM ecole");
    }

    public function afficherpromotion() {
        return Database::$db->query("SELECT * FROM promotion");
    }

    public function espaceecole($n, $mdp, $p, $e) {
        $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

        $sql = Database::$db->prepare("INSERT INTO users(ecole, promotion, mot_de_passe, nom) VALUES (:ecole, :promotion, :mot_de_passe, :nom )");
        $sql->bindParam(':ecole', $e);
        $sql->bindParam(':nom', $n);
        $sql->bindParam(':promotion', $p);
        $sql->bindParam(':mot_de_passe', $hashed_password);
        $sql->execute();
    }

    public function verifierMotDePasse($n, $mdp) {
        $user = Database::$db->query("SELECT * FROM users WHERE nom='$n' LIMIT 1");
        $user->execute();

        foreach($user AS $u){
        
        if(password_verify($mdp, $u['mot_de_passe']())){

        $_SESSION['nom'] = $u['nom'];
        $_SESSION['mot_de_passe'] = $u['mot_de_passe'];
        echo 'connexion reussie';
    } else {
        $_SESSION['message'] = "Erreur";
        header('Location:./views/404.php');
        exit;
    }
    }
        
    }
}












