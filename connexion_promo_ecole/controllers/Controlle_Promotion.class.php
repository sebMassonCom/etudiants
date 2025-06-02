<?php

class Promotion {
    private $_ecole;
    private $_nom;
    private $_mdp;

    public function __construct($ecole, $nom, $mdp) {
        $this->set_ecole($ecole);
        $this->set_nom($nom);
        $this->set_mdp($mdp);  
    }

    public function get_nom() {
        return $this->_nom;
    }

    public function set_nom($nom) {
        if (strlen($nom) < 3 || strlen($nom) > 40) {
            return;
        }
        $this->_nom = $nom;
    }

    public function get_ecole() {
        return $this->_ecole;
    }

    public function set_ecole($ecole) {
        $this->_ecole = $ecole;
    }

    public function get_mdp() {
        return $this->_mdp;
    }

    public function set_mdp($mdp) {
        if (strlen($mdp) < 5) { 
            return;
        }
        $this->_mdp = password_hash($mdp, PASSWORD_BCRYPT);
    }
}
