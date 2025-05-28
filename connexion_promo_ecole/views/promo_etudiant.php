<?php

session_start();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

if (filter_input(INPUT_POST, 'id_ecole')) {
    // $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $id_ecole = filter_input(INPUT_POST, 'id_ecole', FILTER_VALIDATE_INT);
    // $id_promotion = filter_input(INPUT_POST, 'id_promotion', FILTER_VALIDATE_INT);
    $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $hashpass = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
    // $this->connexionetudiant(new Etudiant ($id_promotion, $nom, $id_ecole, $hashpass));
    // $afficheetudiant = $this->afficheretudiant();
    $this->verifmdp($mot_de_passe);
}
?>

<h2>Connexion Étudiant</h2>
<form method="POST">                                                                             
    <select name="id_ecole" id="ecole" >
        <option disabled selected>nom de l'ecole</option>
        <?php
        foreach($afficherecole AS $e):
            ?>
        <option value="<?=$e['id']?>"><?=$e['nom_ecole']?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <select name="id_promotion" id="promotion" >
        <option disabled selected>promotion</option>
        <?php
        foreach($afficherpromotion AS $p):
            ?>
        <option value="<?=$p['id']?>"><?=$p['nom_promotion']?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="text" name="nom" placeholder="Indiquer votre nom">
    <br>
    <input type="password" name="mot_de_passe" placeholder="Indiquer votre Mot de passe">
    <br>
    <input type="submit" value="Identification">
</form>