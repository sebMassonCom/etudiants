<?php

class BienImmobilier{

    private $_surface;
    private $_prix;
    private $_localisation;

    public function __construct($s, $p, $l){
        $this->set_surface($s);
        $this->set_prix($p);
        $this->set_localisation($l);
    }

    public function get_surface(){
        return $this->_surface;
    }

    public function set_surface($s){
        $this->_surface = $s;
    }

    public function get_prix(){
        return $this->_prix;
    }

    public function set_prix($p){
        $this->_prix = $p;
    }

    public function get_localisation(){
        return $this->_localisation;
    }

    public function set_localisation($l){
        $this->_localisation = $l;
    }
}