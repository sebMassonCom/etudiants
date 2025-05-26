<?php

session_start();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

if (filter_input(INPUT_POST, 'ecole')) {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ecole = filter_input(INPUT_POST, 'ecole', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $promotion = filter_input(INPUT_POST, 'promotion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hashpass = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);

    $etudiant = new Etudiant($promotion, $nom, $ecole, $hashpass);

    if ($etudiant && password_verify($mot_de_passe, $etudiant->get_mot_de_passe())) {
        $_SESSION['etudiant'] = $etudiant->get_nom();
        $_SESSION['token'] = uniqid();
        $_SESSION['ecole'] = $ecole;

        echo 'connexion reussie ';
    } else {
        $_SESSION['message'] = "Identifiants et/ou mot de passe incorrect ";
        header('Location: ./assets/inc/header.php');
        exit;
    }
}
?>

<h2>Connexion Étudiant</h2>
<form method="POST">                                                                             
    <select name="ecole" id="ecole" >
        <option disabled selected>nom de l'ecole</option>
        <?php
        foreach($afficherecole AS $e):
            ?>
        <option value="<?=$e['id']?>"><?=$e['nom_ecole']?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <select name="promotion" id="promotion" >
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