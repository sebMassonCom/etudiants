<?php

class Fichier_rendu {
    private $_nom_fichier;
    private $_taille;
    private $_date_rendu;
    private $_id_promotion;
    private $_id_categorie;

    public function __construct($nom_fichier, $taille, $date_rendu, $id_promotion, $id_categorie) {
        $this->set_nom_fichier($nom_fichier);
        $this->set_taille($taille);
        $this->set_date_rendu($date_rendu);
        $this->set_id_promotion($id_promotion);
        $this->set_id_categorie($id_categorie);
    }

    public function get_nom_fichier(){
        return $this->_nom_fichier;
    } 

    public function set_nom_fichier($nom_fichier) {
        if (strlen($nom_fichier) < 3 || strlen($nom_fichier) > 255) {
            return;
        }
        $this->_nom_fichier = $nom_fichier;
    }

    public function get_taille() {
        return $this->_taille;
    }

    public function set_taille($taille){
        $this->_taille = $taille;
    }

    public function get_date_rendu() {
        return $this->_date_rendu;
    }

    public function set_date_rendu($date_rendu){
    try {
        $date = new DateTime($date_rendu);  
        $date->modify('+2 hours');          
        $this->_date_rendu = $date->format('Y-m-d H:i:s'); 
    } catch (Exception $e) {
        $this->_date_rendu = nulL; 
    }
}

    public function get_id_promotion() {
        return $this->_id_promotion;
    }

    public function set_id_promotion($id_promotion){
        $this->_id_promotion = $id_promotion;
    }

    public function get_id_categorie() {
        return $this->_id_categorie;
    }

    public function set_id_categorie($id_categorie){
        $this->_id_categorie = $id_categorie;
    }
}














































