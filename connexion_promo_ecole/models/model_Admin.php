<?php

require_once 'core/Database.php';

class Model_Admin{

    public function __construct() {
        new Database; 
    }

    public function creer_ecole(){
        return Database::$db->query("SELECT * FROM ecole"); 
    }

    public function creer_classe($ecole, $nom , $mdp){
        $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

        $sql = Database::$db->prepare("INSERT INTO promotion(id_ecole,nom_promotion, mot_de_passe) VALUES (:id_ecole,:nom_promotion ,:mot_de_passe)");
        $sql->bindParam(':id_ecole', $ecole);
        $sql->bindParam(':nom_promotion', $nom);
        $sql->bindParam(':mot_de_passe', $mdp);
        $sql->execute();
        
    }

    public function creer_mdp($mdp){
        $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

        $sql = Database::$db->prepare("INSERT INTO promotion(mot_de_passe) VALUES (:mot_de_passe)");
        $sql->bindParam(':mot_de_passe', $hashed_password);
        $sql->execute();
    }


    public function deposer_fichier($nom_fichier, $taille, $date_rendu, $id_promotion, $id_categorie) {
    
        $sql = Database::$db->prepare("INSERT INTO fichier_rendu(nom_fichier, taille, date_rendu, id_promotion, id_categorie) VALUES (:nom_fichier, :taille, :date_rendu, :id_promotion, :id_categorie)");
        $sql->bindParam(':nom_fichier', $nom_fichier);
        $sql->bindParam(':taille', $taille);
        $sql->bindParam(':date_rendu', $date_rendu);
        $sql->bindParam(':id_promotion', $id_promotion);
        $sql->bindParam(':id_categorie', $id_categorie);
        $sql->execute();
    }
    
    public function recup_categorie(){
        return Database::$db->query("SELECT * FROM categorie");
    }

    public function recup_promotion(){
        return Database::$db->query("SELECT * FROM promotion");
    }

   public function recup_fichier(){
        return Database::$db->query("SELECT * FROM fichier_rendu ORDER BY date_rendu DESC");
    }

    public function recup_fichier_filtre($id_promotion, $id_categorie){
        if ($id_categorie == null) {
            $sql = Database::$db->prepare("SELECT * FROM fichier_rendu WHERE id_promotion = :id_promotion ORDER BY date_rendu DESC");
            $sql->bindParam(':id_promotion', $id_promotion);
        } else {
            $sql = Database::$db->prepare("SELECT * FROM fichier_rendu WHERE id_promotion = :id_promotion AND id_categorie = :id_categorie ORDER BY date_rendu DESC");
            $sql->bindParam(':id_promotion', $id_promotion);
            $sql->bindParam(':id_categorie', $id_categorie);
        }
        $sql->execute();
        return $sql;
    }

    public function supprimer_fichier($id){
        $sql = Database::$db->query("DELETE FROM fichier_rendu WHERE id = $id");
        return $sql;
    }

    public function activer_examen(int $id_promotion) {
        // interroger la base de donnée pour connaitre l'etat du champ examen et du champ promotion
        $sql = Database::$db->query("SELECT * FROM promotion WHERE id = $id_promotion LIMIT 1");
        // $sql->bindParam(':id_promotion', $id_promotion);
        // $reponse = $sql->execute();
        // foreach($sql AS $r){
        //     var_dump($r); exit();
        // }
        $reponse = $sql->fetch();
        // var_dump($reponse); exit();
        // si le champ vaut 0 : 
        if ($reponse["examen_actif"] == 0){
            $position = 1;
        }else {
            $position = 0;
        }
        // var_dump($position); exit();
        $sql = Database::$db->prepare("UPDATE promotion SET examen_actif = $position WHERE id = :id_promotion");
        $sql->bindParam(':id_promotion', $id_promotion);
        $sql->execute();
    }

    public function recup_fichier_examen() {
        return Database::$db->query("SELECT * FROM examen ORDER BY date_envoie DESC");
    }
}





