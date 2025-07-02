<?php
session_start();
require_once 'model/model_Utilisateur.php';
require_once 'controller/Controlle_Fichier_rendu.class.php';

class Controlle_Recup_Fichier {

    private $_model_utilisateur;
    public $fichier;
    public $categorie;

    public function __construct() {
    $this->_model_utilisateur = new Model_Utilisateur();

    $id_promotion = $_SESSION['id_promotion'];
    $this->categorie = [];
    $this->fichier = [];

    if ($id_promotion != null && $this->_model_utilisateur->examenEstActif($id_promotion)) {
        if (!empty($_FILES['fichier_examen']['name'])) {
            $nom = $_FILES['fichier_examen']['name'];
            $chemin = 'dossier_etudiant/' . $nom;
            $taille = $_FILES['fichier_examen']['size'];

            if (move_uploaded_file($_FILES['fichier_examen']['tmp_name'], $chemin)) {
                $date = date('Y-m-d H:i:s');
                $this->_model_utilisateur->insererExamen($id_promotion, $nom, $taille , $date);
            }
        }

        $categorie_examen = $this->_model_utilisateur->recupCategorieExamen();
        if ($categorie_examen) {
            $this->categorie = [$categorie_examen];
            $this->fichier = $this->_model_utilisateur->recup_fichier_filtre($id_promotion, $categorie_examen['id']);
        }
    }else if ($id_promotion != null) {
        $this->categorie = $this->_model_utilisateur->recup_categorie();
        $this->fichier = $this->_model_utilisateur->recup_fichier_filtre($id_promotion, null);
    }
    include_once 'views/promo_Fichier_Utilisateur.php';
}


    public function afficher_fichier() {
        return $this->_model_utilisateur->recup_fichier();
    }

    public function afficher_categorie() {
        return $this->_model_utilisateur->recup_categorie();
    }

    public function afficher_promotion() {
        return $this->_model_utilisateur->recup_promotion();
    }

    public function afficher_fichier_filtre($id_promotion, $id_categorie) {
        return $this->_model_utilisateur->recup_fichier_filtre($id_promotion, $id_categorie);
    }

    private function examenactif($id_promotion) {
        $categorie = $this->_model_utilisateur->examenactif($id_promotion);
        return $categorie['examen_actif'] == 1;
    }

    private function recupCategorieExamen() {
        return $this->_model_utilisateur->recupCategorieByNom("examen");
    }
}
