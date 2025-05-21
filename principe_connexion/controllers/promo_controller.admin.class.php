<?php 

include_once 'controllers/admin.class.php';
include_once 'models/modelspromo_admin.php';

class ControllerAdmin{
    
    private $_model;
    private $_etudiant;
    
    public function __construct(){
        include_once 'Views/promo_admin.php';
    }

    public function connexionadmin(Admin $_etudiant){
        $this->_model = new Modelpromo_admin();
        $this->_model->checkLogin($etudiant->get_ecole(),$etudiant->get_mot_de_passe());
    }
}
