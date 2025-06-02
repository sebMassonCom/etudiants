<?php
if (filter_input(INPUT_POST, 'nom_ecole')) {
    $nom_ecole = filter_input(INPUT_POST, 'nom_ecole', FILTER_VALIDATE_INT);
    $nom_promotion = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mdp = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

    $this->afficher_nom_ecole(new Promotion ($nom_ecole));

    $this->afficher_nom_classe(new Promotion($nom_promotion));

    $this->verifier_mdp(new Promotion ($hashed_password));


}
?>

<h3>Connexion Utilisateur</h3>
<form method="POST">                                                                             
    <select name="id_ecole" id="ecole" >
        <option disabled selected>nom de l'ecole</option>
        <?php
        foreach($creer_ecole AS $e):
            ?>
        <option value="<?=$e['id']?>"><?=$e['nom_ecole']?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="text" name="nom" placeholder="Indiquer le nom de la classe">
    <br>
    <input type="password" name="mot_de_passe" placeholder="Indiquer le mdp">
    <br>
    <input type="submit" value="Envoyer">
</form>