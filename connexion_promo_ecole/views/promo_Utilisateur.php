<?php
if (filter_input(INPUT_POST, 'nom_ecole')) {
    $nom_ecole = filter_input(INPUT_POST, 'nom_ecole', FILTER_VALIDATE_INT);
    $nom_promotion = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mdp = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

    $this->afficher_nom_ecole(new Promotion ($nom_ecole));

    $this->afficher_nom_classe(new Promotion($nom_promotion));

    $this->$resultat->verifier_mdp(new Promotion ($hashed_password));

}
?>
<style>
    *{
        padding:0;
        margin:0;
    }
    
    body {
        font-family: Arial, sans-serif;
        background: #f7f7f7;
        margin: 0;
        padding: 20px;
    }

    h3 {
        text-align: center;
        background:rgb(210, 4, 252)
    }

    form {
        background: white;
        width: 300px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    input[type="text"],
    input[type="password"],
    input[type="file"],
    
    select {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid;
        border-radius: 4px;
    }

    input[type="submit"]{
        background-color: #007BFF;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        width: 100%;
    }

    input[type="submit"]{
        background-color:rgb(7, 3, 254);
    }

</style>
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



