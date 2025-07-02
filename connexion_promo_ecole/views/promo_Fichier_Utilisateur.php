<?php
if (isset($_SESSION['id_promotion'])) {
    $id_promotion = $_SESSION['id_promotion'];
    $categorie = $this->categorie ?? [];
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fichiers etudiant</title>
</head>
<body>
    <h1>Ressources</h1>
    <?php if ($this->_model_utilisateur->examenEstActif($id_promotion)): ?>
        <h2>Déposer mon devoir d'examen</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="fichier_examen">
            <button type="submit">Deposer mon examen</button>
        </form>
    <?php endif; ?>
    <?php foreach ($categorie as $C): ?>
        <h2><?= htmlspecialchars($C['nom_categorie']) ?></h2>
    <?php 
        $recup_fichier = $this->afficher_fichier_filtre($id_promotion, $C['id']);
        if (!empty($recup_fichier)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Nom du fichier</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recup_fichier as $fichier): 
                        $nom = $fichier['nom_fichier'];
                        $extension = strtolower(pathinfo($nom, PATHINFO_EXTENSION));
                        $icon = '../assets/img/fichier.png';
                        if ($extension == 'pdf') {
                            $icon = '../assets/img/pdf.png';
                        } elseif (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                            $icon = '../assets/img/image.png';
                        } elseif ($extension == 'zip') {
                            $icon = '../assets/img/zip.png';
                        }
                    ?>
                    <tr>
                        <td><?= date('d-m-Y', strtotime($fichier['date_rendu'])) ?></td>
                        <td><a href="../dossier_etudiant/<?= $nom ?>"><?= htmlspecialchars($nom) ?></a></td>
                        <td><a href="../dossier_etudiant/<?= urlencode($nom) ?>">
                        <img src="<?= $icon ?>" alt="type"></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun fichier</p>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        padding: 20px;
        background: rgb(249, 249, 249);
    }

    h1 {
        margin-bottom: 25px;
        color: rgb(243, 17, 171);
    }

    h2 {
        margin-top: 40px;
        margin-bottom: 10px;
        font-size: 20px;
        color: rgb(39, 39, 154);
        border-left: 4px solid;
        padding-left: 10px;
    }

    table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        display: block;
        max-height: 200px;
        overflow-y: scroll;
        overflow-x: hidden;
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
    padding: 10px;
    border-radius: 4px;
    width: 100%;
    margin-top: 10px;
    }

    thead, tbody, tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    th, td {
        border: 1px solid;
        padding: 12px;
        vertical-align: middle;
    }

    th {
        background-color: rgb(239, 230, 230);
    }

    td img {
        display: block;
        margin: 0 auto;
        width: 60px;
        height: 60px;
    }
</style>







