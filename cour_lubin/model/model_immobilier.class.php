<?php

require_once 'core/Database.php';
new Database;


class Model_immobilier{

    public function ajoutbienimmobilier($s, $p, $l){

        $sql = Database::$db->prepare("INSERT INTO immobilier(surface, prix, localisation) VALUES (:surface, :prix, :localisation)");
        $sql->bindParam(':surface', $s);
        $sql->bindParam(':prix', $p);
        $sql->bindParam(':localisation', $l);
        $sql->execute();
        return $sql;
    }
}
