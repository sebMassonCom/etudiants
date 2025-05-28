<?php

require_once 'model/model_immobilier.class.php';
require_once 'controllers/BienImmobilier.class.php';

class Immobilier{
    private $_model;

    public function __construct(){
        include 'views/view_immobilier.php';
    }
    
    public function appelmodel(BienImmobilier $immobilier){
        $this->_model = new Model_immobilier;
        $this->_model->ajoutbienimmobilier($immobilier->get_surface(), $immobilier->get_prix(), $immobilier->get_localisation());

    }
}