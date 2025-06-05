<?php
if (filter_input(INPUT_POST, 'nom_ecole')) {
    $nom_ecole = filter_input(INPUT_POST, 'nom_ecole', FILTER_VALIDATE_INT);
    $nom_promotion = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mdp = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);
    
}
if (isset($_FILES['fichier_rendu'], $_POST['id_promotion'], $_POST['id_categorie'])) {
    $id_promotion = filter_input(INPUT_POST, 'id_promotion', FILTER_VALIDATE_INT);
    $id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT);
    $fichier = $_FILES['fichier_rendu'];

    if (is_uploaded_file($fichier['tmp_name'])) {
        $nom_fichier = $fichier['name'];
        $taille = $fichier['size'];
        $date_rendu = date('Y-m-d,H:i:s');

        move_uploaded_file($fichier['tmp_name'], 'dossier_etudiant/' . $nom_fichier);

        $fichier_rendu = new Fichier_rendu($nom_fichier, $taille, $date_rendu, $id_promotion, $id_categorie);
        $this->deposer_fichier($fichier_rendu);
    }
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

<h3>Connexion Admin</h3>
<form method="POST">                                                                             
    <select name="nom_ecole" id="ecole" >
        <option disabled selected>nom de l'ecole</option>
        <?php
        foreach($this->afficher_ecole AS $e):
            ?>
        <option value="<?=$e['id']?>"><?=$e['nom_ecole']?></option>
        <?php echo $e["id"]; endforeach; ?>
    </select>
    <br>
    <input type="text" name="nom" placeholder="Indiquer le nom de la classe">
    <br>
    <input type="password" name="mot_de_passe" placeholder="Indiquer le mdp">
    <br>
    <input type="submit" value="Envoyer">
</form>

<h3>Déposer un Fichier</h3>
<form method="POST" enctype="multipart/form-data">
    <select name="id_promotion">
        <option disabled selected>Choisir une classe</option>
        <?php
        $classes = Database::$db->query("SELECT * FROM promotion");
        foreach ($classes as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['nom_promotion'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <select name="id_categorie">
        <option disabled selected>Choisir une categorie</option>
        <?php
        $categorie = Database::$db->query("SELECT * FROM categorie");
        foreach ($categorie as $C): ?>
            <option value="<?= $C['id'] ?>"><?= $C['nom_categorie'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="file" name="fichier_rendu"><br>
    <input type="submit" value="Déposer le fichier">
</form>

