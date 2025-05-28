<?php 

include_once 'controllers/etudiant.class.php';
include_once 'models/modelpromo_etudiant.php';

class Promo_etudiant{
    
    private $_model;
    private $_inserer;
    
    public function __construct(){
        $this->_model = new Modelpromo_etudiant();
        $afficherecole = $this->_model->afficherecole();
        $afficherpromotion = $this->_model->afficherpromotion();


        include_once 'Views/promo_etudiant.php';
    }

    public function connexionetudiant(Etudiant $etudiant){
        $this->_inserer = new Modelpromo_etudiant();
        $this->_inserer->espaceecole(
            $etudiant->get_promotion(),
            $etudiant->get_nom(),
            $etudiant->get_ecole(),
            $etudiant->get_mot_de_passe()
        );
    }

    public function verifmdp($mdp){
        $this->_inserer = new Modelpromo_etudiant();
        $this->_inserer->verifierMotDePasse(
             $mdp
        );
    }

    public function afficheretudiant(){
        return $this->_model->afficher();
    }

    

}