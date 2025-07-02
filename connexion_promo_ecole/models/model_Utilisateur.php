<?php

require_once 'core/Database.php';

class Model_Utilisateur {

    public function __construct() {
        new Database;
    }

    public function recup_ecole() {
        return Database::$db->query("SELECT * FROM ecole"); 
    }

    public function afficher_nom_ecole() {
        return Database::$db->query("SELECT * FROM promotion INNER JOIN ecole ON promotion.id_ecole = ecole.id");
    }

    public function afficher_nom_classe(Promotion $nom) {
        $n = $nom->get_nom();
        $football = Database::$db->prepare("SELECT * FROM promotion WHERE nom_promotion = :noham");
        $football->bindParam(':noham', $n);
        $football->execute();
        return $football;

    }

    public function verifier_mdp() {
        return Database::$db->query("SELECT * FROM promotion");
    }

    public function recup_categorie(){
        return Database::$db->query("SELECT * FROM categorie");
    }

    public function recup_promotion(){
        return Database::$db->query("SELECT * FROM promotion");
    }


    public function recup_fichier(){
        return Database::$db->query("SELECT * FROM fichier_rendu");
    }

    public function recup_fichier_filtre($id_promotion, $id_categorie) {
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

    public function recupCategorieExamen() {
        $sql = Database::$db->prepare("SELECT * FROM categorie WHERE LOWER(nom_categorie) = 'examen'");
        $sql->execute();
        return $sql->fetch();
    }

    public function examenEstActif($id_promotion) {
        $sql = Database::$db->prepare("SELECT examen_actif FROM promotion WHERE id = :id_promotion");
        $sql->bindParam(':id_promotion', $id_promotion);
        $sql->execute();
        $recup = $sql->fetch();
        return $recup && $recup['examen_actif'] == 1;
    }
    public function insererExamen($id_promotion, $nom_fichier, $taille, $date) {
        $sql = Database::$db->prepare("INSERT INTO examen (id_promotion, nom_fichier, taille, date_envoie) VALUES (:id_promotion, :nom_fichier, :taille, :date_envoie)");
        $sql->bindParam(':id_promotion', $id_promotion);
        $sql->bindParam(':nom_fichier', $nom_fichier);
        $sql->bindParam(':taille', $taille);
        $sql->bindParam(':date_envoie', $date);
        $sql->execute();
    }
}
