<?php 

include_once 'controllers/etudiant.class.php';
include_once 'models/modelspromo_etudiant.php';

class ControllerEtudiant{
    
    private $_model;
    private $_etudiant;
    
    public function __construct(){
        include_once 'Views/promo_etudiant.php';
    }

    public function connexionetudiant(Etudiant $_etudiant){
        $this->_model = new Modelpromo_etudiant();
        $this->_model->connexionetudiant($etudiant->get_nom(),$etudiant->get_ecole(),$etudiant->get_mot_de_passe());
    }

}