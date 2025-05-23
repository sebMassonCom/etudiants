<?php

if(filter_input(INPUT_POST,'ecole')){
    // if($_POST['ecole'] && $_POST['mot_de_passe']){
        $ecole = filter_input(INPUT_POST,'ecole',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mot_de_passe = filter_input(INPUT_POST,'mot_de_passe',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->connexionetudiant(new Etudiant($ecole,$mot_de_passe));
        echo 'Vous êtes connecté '; // session
    } else {
        echo 'Identifiants et/ou mot de passe incorrect !';// session
    }
// }
?>
<h2>Connexion Étudiant</h2>
<form method="POST">
    <input type="text" name="ecole" placeholder="Indiquer votre ecole"><!-- choix école ET choix promo -->
    <br>
    <input type="password" name="mot_de_passe" placeholder="Indiquer votre Mot de passe"><!-- saisie du mdp -->
    <br>
    <input type="submit" value="Identification">
</form>