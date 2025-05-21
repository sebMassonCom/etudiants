<?php

if(filter_input(INPUT_POST,'nom',FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
    if($_POST['nom'] && $_POST['ecole'] && $_POST['mot_de_passe']){
        $nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ecole = filter_input(INPUT_POST,'ecole',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mot_de_passe = filter_input(INPUT_POST,'mot_de_passe',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $hashpass = password_hash($_POST['mot_de_passe'],PASSWORD_BCRYPT);
        $this->ajouterEtudiant(new Etudiant($nom,$ecole,$hashpass));
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