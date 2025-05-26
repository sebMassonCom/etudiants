<?php 

class Etudiant{

    private $_promotion;
    private $_nom;
    private $_ecole;
    private $_mot_de_passe;
 
    

    public function __construct($p,$n,$e,$mdp){
        $this->set_promotion($p);
        $this->set_nom($n);
        $this->set_ecole($e);
        $this->set_mot_de_passe($mdp);
    }

    public function get_promotion(){
        return $this->_promotion;
    }

    private function set_promotion($p){
        $this->_promotion = $p;
    }

    public function get_nom(){
        return $this->_nom;
    }

    private function set_nom($n){
        $this->_nom = $n;
    }

    public function get_ecole(){
        return $this->_ecole;
    }

    private function set_ecole($e){
        $this->_ecole = $e;
    }

    public function get_mot_de_passe(){
        return $this->_mot_de_passe;
    }

    private function set_mot_de_passe($mdp){
        $this->_mot_de_passe = $mdp;
    }

   
}