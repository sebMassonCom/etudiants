<?php
if(filter_input(INPUT_POST, 'surface')){
    $surface = filter_input(INPUT_POST, 'surface', FILTER_VALIDATE_INT);
    $prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_INT);
    $localisation = filter_input(INPUT_POST, 'localisation', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $this->appelmodel(new BienImmobilier($surface, $prix, $localisation));
}

?>


<form method="post">
    <input type="number" name="surface" id="surface" placeholder="indiquez la surface">
    <br>
    <input type="number" name="prix" id="prix" placeholder="indiquez le prix">
    <br>
    <input type="text" name="localisation" id="localisation" placeholder="indiquez la locaisation">
    <input type="submit" value="enregistrer">
</form>