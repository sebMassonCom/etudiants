<?php 

class Admin{

    private $_ecole;
    private $_mot_de_passe;
 
    

    public function __construct($ecole,$mot_de_passe){
        $this->set_ecole($ecole);
        $this->set_mot_de_passe($mot_de_passe);
    }

    public function get_ecole(){
        return $this->_ecole;
    }

    public function get_mot_de_passe(){
        return $this->_mot_de_passe;
    }

    public function set_ecole($ecole){
        $this->_ecole = $ecole;
    }

    public function set_mot_de_passe($_mot_de_passe){
        $this->_mot_de_passe = $_mot_de_passe;
    }
}