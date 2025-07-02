<?php

require_once 'model/model_Utilisateur.php';
require_once 'controller/Controlle_Promotion.class.php';

class Controlle_Utilisateur {

    private $_model_Utilisateur;
    public $recup_ecole;

    public function __construct() {
        $this->_model_Utilisateur = new Model_Utilisateur();
        $this->recup_ecole = $this->_model_Utilisateur->recup_ecole();
        include_once 'views/promo_Utilisateur.php';
    }

    public function afficher_nom_ecole(Promotion $ecole) {
        return $this->_model_Utilisateur->afficher_nom_ecole($ecole->get_ecole());
    }

    public function afficher_nom_classe(Promotion $nom) {
        return $this->_model_Utilisateur->afficher_nom_classe($nom->get_nom());
    }

    public function verifier_mdp($mdp) { 
        $resultat = $this->_model_Utilisateur->verifier_mdp();
        foreach ($resultat as $promotion) { 
            if (password_verify($mdp, $promotion["mot_de_passe"])) {
                session_start();
                $_SESSION['id_promotion'] = $promotion['id'];
                header("Location: index.php?page=Controlle_Recup_Fichier");
                exit();
            }
        } 
    }
}
