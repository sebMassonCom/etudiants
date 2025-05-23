<?php 

include_once 'controllers/etudiant.class.php';
include_once 'models/modelpromo_etudiant.php';

class Promo_etudiant{
    
    private $_model;
    
    public function __construct(){
        $this->_model = new Modelpromo_etudiant();
        include_once 'Views/promo_etudiant.php';
    }

    public function connexionetudiant(Etudiant $etudiant){
        $this->_model->espaceecole($etudiant->get_ecole(),$etudiant->get_mot_de_passe());
    }
}