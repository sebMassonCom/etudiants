<?php

require_once 'model/model_Admin.php';
require_once 'controller/Controlle_Promotion.class.php';
require_once 'controller/Controlle_Fichier_rendu.class.php';


class Controlle_Admin {

    private $_model_Admin;
    public $afficher_ecole;

    public function __construct() {
        $this->_model_Admin = new Model_Admin();
        $this->afficher_ecole = $this->_model_Admin->creer_ecole();

        include_once 'views/promo_admin.php';
    }

    public function creer_ecole(Promotion $ecole){
        $this->model_Admin = new Model_Admin();
        return $this->_model_Admin->creer_ecole($ecole->get_ecole());
    }

    public function creer_classe(Promotion $nom) {
        $this->_model_Admin = new Model_Admin();
        return $this->_model_Admin->creer_classe($nom->get_ecole(), $nom->get_nom(), $nom->get_mdp());
    }

    public function creer_mdp(Promotion $mdp) {
        $this->_model_Admin = new Model_Admin();
        return $this->_model_Admin->creer_mdp($mdp->get_mdp());
    }

    public function deposer_fichier(Fichier_rendu $fichier) {
    return $this->_model_Admin->deposer_fichier(
        $fichier->get_nom_fichier(),
        $fichier->get_taille(),
        $fichier->get_date_rendu(),
        $fichier->get_id_promotion(),
        $fichier->get_id_categorie(),
    );
}
    public function afficher_categorie(){
        return $this->_model_Admin->recup_categorie();
    }

    public function afficher_promotion(){
        return $this->_model_Admin->recup_promotion();
    }

    public function recup_fichier() {
        return $this->_model_Admin->recup_fichier();
    }

    public function recup_fichier_filtre($id_promotion, $id_categorie) {
        return $this->_model_Admin->recup_fichier_filtre($id_promotion, $id_categorie);
    }

    public function supprimer_fichier($id) {
        return $this->_model_Admin->supprimer_fichier($id);
    }

    public function activer_examen($id_promotion) {
        return $this->_model_Admin->activer_examen($id_promotion);
    }

    public function recup_fichier_examen(){
        return $this->_model_Admin->recup_fichier_examen();
    }  
}
