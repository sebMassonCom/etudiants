<?php

require_once 'model/model_Utilisateur.php';
require_once 'controller/Controlle_Promotion.class.php';

class Controlle_Utilisateur{

    private $_model_Utilisateur;
    public  $recup_ecole;

    public function __construct(){
        $this->_model_Utilisateur = new Model_Utilisateur();
        $this->recup_ecole = $this->_model_Utilisateur->recup_ecole();
        include_once 'views/promo_Utilisateur.php';
    }
    

    public function afficher_nom_ecole(Promotion $ecole){
        $this->model_Admin = new Model_Admin();
        return $this->_model_Utilisateur->afficher_nom_ecole($ecole->get_ecole());
    }

    public function afficher_nom_classe(Promotion $nom){
        $this->model_Admin = new Model_Admin();
        return $this->_model_Utilisateur->afficher_nom_classe($nom->get_nom());
    }

    public function verifier_mdp(Promotion $mdp){
        $this->model_Admin = new Model_Admin();
        return $this->_model_Utilisateur->verifier_mdp($mdp->get_mdp());
    }


}