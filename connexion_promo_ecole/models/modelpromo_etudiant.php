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

    public function espaceecole($p,$n,$e,$mdp) {
        $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

        $sql = Database::$db->prepare("INSERT INTO users(id_promotion,nom,id_ecole,mot_de_passe ) VALUES (:id_promotion,:nom,:id_ecole,:mot_de_passe)");
        $sql->bindParam(':id_promotion', $p);
        $sql->bindParam(':nom', $n);
        $sql->bindParam(':id_ecole', $e);
        $sql->bindParam(':mot_de_passe', $hashed_password);
        $sql->execute();
    }

    public function afficher(){
        return Database::$db->query("SELECT * FROM users INNER JOIN promotion ON users.id_promotion = promotion.id INNER JOIN ecole ON users.id_ecole = ecole.id");
    }

    public function verifierMotDePasse($mdp) {
        $user = Database::$db->query("SELECT * FROM users WHERE nom='$mdp' LIMIT 1");
        $user->execute();

        foreach($user AS $u){
        // var_dump($u); break; exit();
        if(password_verify($mdp, $u['mot_de_passe'])){

        $_SESSION['nom'] = $u['nom'];
        $_SESSION['mot_de_passe'] = $u['mot_de_passe'];
        echo 'connexion reussie';
        header('Location:views/accueil.php');
        exit();
    } else {
        $_SESSION['message'] = "Erreur";
        header('Location:views/404.php');
        exit;
    }
    }
        
    }
}












