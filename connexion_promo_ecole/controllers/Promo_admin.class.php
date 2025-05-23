<?php 

include_once 'controllers/admin.class.php';
include_once 'models/modelspromo_admin.php';

class Promo_admin{
    
    private $_model;
    private $admin;
    
    public function __construct(){
        $this->_model = new Modelpromo_admin();
        include_once 'Views/promo_admin.php';
    }

    public function connexionadmin(Admin $admin){
        $this->_model->creationpromo($admin->get_nom(),$admin->get_ecole(),$admin->get_mot_de_passe());
    }
}
