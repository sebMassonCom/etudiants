<?php

if(filter_input(INPUT_POST,'nom')){
    // if($_POST['nom'] && $_POST['ecole'] && $_POST['mot_de_passe']){
        $nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ecole = filter_input(INPUT_POST,'ecole',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mot_de_passe = filter_input(INPUT_POST,'mot_de_passe',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $hashpass = password_hash($_POST['mot_de_passe'],PASSWORD_BCRYPT);
        $this->connexionadmin(new Admin($nom,$ecole,$hashpass));
        echo 'Création de la promo effectuer ';// session !
    } else {
        echo 'Identifiants et/ou mot de passe incorrect !';// idem session
    }
// }
?>
<h2>Création d'une promo</h2>
<form method="POST">
    <input type="text" name="nom" placeholder="Indiquer le nom de la promo">
    <br>
    <input type="text" name="ecole" placeholder="Indiquer l'ecole">
    <br>
    <input type="password" name="mot_de_passe" placeholder="Indiquer le Mot de passe">
    <br>
    <input type="submit" value="Creation de la promo">
</form>