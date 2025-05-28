<?php

class Database{
    
    const SERVER = 'mysql:server=localhost;dbname=agence';
    const USER = 'root';
    const PASSWORD = '';
    public static $db;

    public function __construct(){
        $this->connexion();
    }

    private function connexion(){
        try{
            self::$db = new PDO(self::SERVER, self::USER, self::PASSWORD);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        return self::$db;
    }
}
