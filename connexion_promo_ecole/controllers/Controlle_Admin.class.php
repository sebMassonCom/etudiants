<?php

require_once 'model/model_Admin.php';
require_once 'controller/Controlle_Promotion.class.php';
require_once 'controller/Controlle_Fichier_rendu.class.php';


class Controlle_Admin {

    private $model_Admin;
    public $afficher_ecole;

    public function __construct() {
        $this->model_Admin = new Model_Admin();
        $this->afficher_ecole = $this->model_Admin->creer_ecole();

        include_once 'views/promo_admin.php';
    }

    // public function creer_ecole(Promotion $ecole){
    //     $this->model_Admin = new Model_Admin();
    //     return $this->model_Admin->creer_ecole($ecole->get_ecole());
    // }

    public function creer_classe(Promotion $nom) {
        $this->model_Admin = new Model_Admin();
        return $this->model_Admin->creer_classe($nom->get_ecole(), $nom->get_nom(), $nom->get_mdp());
    }

//     public function creer_mdp(Promotion $mdp) {
//         $this->model_Admin = new Model_Admin();
//         return $this->model_Admin->creer_mdp($mdp->get_mdp());
// }

    public function deposer_fichier(Fichier_rendu $fichier) {
    return $this->model_Admin->deposer_fichier(
        $fichier->get_nom_fichier(),
        $fichier->get_taille(),
        $fichier->get_date_rendu(),
        $fichier->get_id_promotion(),
        $fichier->get_id_categorie(),
    );
}
}