<?php 

include_once 'controllers/admin.class.php';
include_once 'models/modelspromo_admin.php';

class Promo_admin{
    
    private $_model;
    private $_inserer;
    
    public function __construct(){
        $this->_model = new Modelpromo_admin();
        $afficherecole = $this->_model->afficherecole();
        $afficherpromotion = $this->_model->afficherpromotion();


        include_once 'Views/promo_admin.php';
    }

    public function connexionadmin(Admin $admin){
        $this->_inserer = new Modelpromo_admin();
        $this->_inserer->espaceecole(
            $admin->get_promotion(),
            $admin->get_nom(),
            $admin->get_ecole(),
            $admin->get_mot_de_passe()
        );
    }

    public function verifmdp($mdp){
        $this->_inserer = new Modelpromo_admin();
        $this->_inserer->verifierMotDePasse(
            $mdp
        );
    }

    public function afficheradmin(){
        return $this->_model->afficher();
    }

    

}
