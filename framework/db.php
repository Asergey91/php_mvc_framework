<?php
class Db{
    public $db;
    function __construct(){
        $this->connect();
    }
    private function connect(){
        try{
            $this->db = new PDO('mysql:dbname='.Config::$DB_CRED['db'].';host='.Config::$DB_CRED['host'], Config::$DB_CRED['username'], Config::$DB_CRED['password']);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
}