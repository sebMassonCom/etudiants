<?php 

class Database{
    
    const SERVER = 'mysql:server=localhost;dbname=espace_etudiant';
    const USER = 'root';
    const PASS = '';
    public static $db;

    public function __construct(){
        $this->connexion();
    }
    
    private function connexion(){
        try{
            self::$db = new PDO(self::SERVER, self::USER, self::PASS);  
        } catch (Exception $e){
            echo $e->getMessage();
        }
        return self::$db;
    }
}