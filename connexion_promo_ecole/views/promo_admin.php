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
        $date_rendu = date('d-m-Y');

        move_uploaded_file($fichier['tmp_name'], 'dossier_etudiant/' . $nom_fichier);

        $fichier_rendu = new Fichier_rendu($nom_fichier, $taille, $date_rendu, $id_promotion, $id_categorie);
        $this->deposer_fichier($fichier_rendu);
    }
}
?>
<h3>Création classe</h3>
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
        $classes = $this->afficher_promotion();
        foreach ($classes as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['nom_promotion'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <select name="id_categorie">
        <option disabled selected>Choisir une categorie</option>
        <?php
        $categorie = $this->afficher_categorie();
        foreach ($categorie as $C): ?>
            <option value="<?= $C['id'] ?>"><?= $C['nom_categorie'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="file" name="fichier_rendu"><br>
    <input type="submit" value="Déposer le fichier">
</form>






<?php
if (filter_input(INPUT_POST, "id")){
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $this->supprimer_fichier($id);
}
if (isset($_POST['id_promotion'], $_POST['id_categorie'])) {
    $id_promotion = filter_input(INPUT_POST, 'id_promotion', FILTER_VALIDATE_INT);
    $id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT);
    $recup_fichier = $this->recup_fichier_filtre($id_promotion, $id_categorie);
} else {
    $recup_fichier = $this->recup_fichier();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Partie admin</title>
</head>
<body>
    <h2>Liste des fichiers</h2>

    <form method="POST" enctype="multipart/form-data">
    <select name="id_promotion">
        <option disabled selected>Choisir une classe</option>
        <?php
        $classes = $this->afficher_promotion();
        foreach ($classes as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['nom_promotion'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <select name="id_categorie">
        <option disabled selected>Choisir une categorie</option>
        <?php
        $categorie = $this->afficher_categorie();
        foreach ($categorie as $C): ?>
            <option value="<?= $C['id'] ?>"><?= $C['nom_categorie'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Filtrer</button>
    </form>
    <br>
    <table border="1">
    <thead>
        <tr>
            <th>Date de dépôt</th>
            <th>Nom du fichier</th>
            <th>Taille en ko</th>
            <th>Type</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($recup_fichier) && $recup_fichier): ?>
            <?php foreach ($recup_fichier as $fichier): 
                
                    $nom = $fichier['nom_fichier'];
                    $extension = strtolower(pathinfo($nom, PATHINFO_EXTENSION));
                    $icon = '../assets/img/fichier.png';

                    if ($extension == 'pdf') {
                        $icon = '../assets/img/pdf.png';
                    } elseif (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                        $icon = '../assets/img/image.png';
                    } elseif (in_array($extension, ['zip'])) {
                        $icon = '../assets/img/zip.png';
                    }
                ?>
                <tr>
                    <td><?= date('d-m-Y', strtotime($fichier['date_rendu'])) ?></td>
                    <td><a href="../dossier_etudiant/<?= $nom ?>"><?= htmlspecialchars($nom) ?></a></td>
                    <td><?= htmlspecialchars($fichier['taille']) ?></td>
                    <td><a href="../dossier_etudiant/<?= urlencode($nom) ?>">
                    <img src="<?= $icon ?>" alt="type"></a>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $fichier["id"]?>">
                            <input type="image" src="../assets/img/delete.png" alt="supprimer" name="supprimer" width="30px">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>Aucun fichier disponible</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>




<?php
if (isset($_POST['activer_examen'])) {
    $id_promotion = filter_input(INPUT_POST, 'activer', FILTER_VALIDATE_INT);
    if ($id_promotion) {
        $this->activer_examen($id_promotion);
    }
}
?>
<h3>Activer un examen</h3>
<form method="POST">
    <?php
    $classes = $this->afficher_promotion();
    foreach ($classes as $c):
        $checked = !empty($c['examen_actif']) ? 'checked' : '';?>
        <label>
            <input type="checkbox" name="activer" value="<?= $c['id'] ?>" <?= $checked ?>>
            <?= htmlspecialchars($c['nom_promotion']) ?>
        </label>
        <br>
    <?php endforeach; ?>
    <button type="submit" name="activer_examen">Activer l'examen</button>
</form>



<?php
if (filter_input(INPUT_POST, "id")) {
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $this->supprimer_fichier_examen($id);
}
$recup_fichier_examen = $this->recup_fichier_examen();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fichiers Examen</title>
</head>
<body>
    <h2>fichier rendu d'examen</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Date d'envoie</th>
                <th>Nom du fichier</th>
                <th>Taille en ko</th>
                <th>Type</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($recup_fichier_examen) && $recup_fichier_examen): ?>
                <?php foreach ($recup_fichier_examen as $fichier): 
                    $nom = $fichier['nom_fichier'];
                    $extension = strtolower(pathinfo($nom, PATHINFO_EXTENSION));
                    $icon = '../assets/img/fichier.png';

                    if ($extension == 'pdf') {
                        $icon = '../assets/img/pdf.png';
                    } elseif ($extension == 'zip') {
                        $icon = '../assets/img/zip.png';
                    }
                ?>
                <tr>
                    <td><?= date('d-m-Y H:i:s', strtotime($fichier['date_envoie'])) ?></td>
                    <td><a href="../dossier_etudiant/<?= $nom ?>"><?= htmlspecialchars($nom) ?></a></td>
                    <td><?= htmlspecialchars($fichier['taille']) ?></td>
                    <td><a href="../dossier_etudiant/<?= urlencode($nom) ?>">
                    <img src="<?= $icon ?>" alt="type" width="30"></a></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $fichier["id"] ?>">
                            <input type="image" src="../assets/img/delete.png" alt="supprimer" width="30">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td>Aucun fichier</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>





















<style>
* {
    margin: 0;
    padding: 0;
}

body {
    background: rgb(249, 242, 242);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h2, h3 {
    text-align: center;
    margin: 20px;
    background: rgb(210, 4, 252);
    color: white;
    padding: 10px;
    border-radius: 8px;
    width: 100%;
    max-width: 1000px;
}

form {
    width: 320px;
    margin: 20px auto;
    padding: 20px 30px;
    border: 1px solid;
    border-radius: 12px;
    background: white;
    display: flex;
    flex-direction: column;
    align-items: center;
}

form label {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 18px;
    margin-bottom: 10px;
    font-family: sans-serif;
    width: 100%;
}

form input[type="checkbox"] {
    width: 18px;
    height: 18px;
    border-radius: 4px;
    border: 1.5px solid #555;
    background-color: white;
    position: relative;
    cursor: pointer;
    margin: 0;
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

input[type="submit"],
button {
    background-color: rgb(7, 3, 254);
    color: white;
    padding: 12px;
    border-radius: 6px;
    width: 100%;
    margin-top: 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s;
}
button:active,
input[type="submit"]:active {
    transform: scale(0.98);
    background-color: rgb(3, 0, 180);
}


input[type="submit"]:hover,
button:hover {
    background-color: rgb(5, 0, 200);
}

button:disabled {
    background-color: gray;
    cursor: not-allowed;
}

table {
    margin-top: 30px;
    width: 100%;
    max-width: 1000px;
    background: white;
    border-collapse: collapse;
}

th, td {
    border: 1px solid;
    padding: 10px;
    text-align: left;
}

th {
    background-color: rgb(242, 242, 242);
}

img {
    width: 64px;
    height: 64px;
}

form input[type="image"] {
    width: 64px;
    height: 64px;
}
</style>

