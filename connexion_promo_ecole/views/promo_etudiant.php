<?php

if(filter_input(INPUT_POST,'ecole',FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
    if($_POST['ecole'] && $_POST['mot_de_passe']){
        $ecole = filter_input(INPUT_POST,'ecole',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mot_de_passe = filter_input(INPUT_POST,'mot_de_passe',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->connexionetudiant(new Etudiant($ecole,$mot_de_passe));
        echo 'Vous êtes connecté ';
    } else {
        echo 'Identifiants et/ou mot de passe incorrect !';
    }
}
?>
<h2>Connexion Étudiant</h2>
<form method="POST">
    <input type="text" name="ecole" placeholder="Indiquer votre ecole">
    <br>
    <input type="password" name="mot_de_passe" placeholder="Indiquer votre Mot de passe">
    <br>
    <input type="submit" value="Identification">
</form>