<?php
class Db{
    public $db;
    function __construct(){
        $this->connect();
    }
    private function connect(){
        try{
            $this->db = new PDO('mysql:dbname='.Config::$DB_CRED['db'].';host='.Config::$DB_CRED['host'], Config::$DB_CRED['username'], Config::$DB_CRED['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function drop(){
        foreach (Schema::$TABLES as $k=>$v) {
            $query='DROP TABLE '.$k.';';
            try{
                $this->db->exec($query);
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }
    public function create(){
        foreach (Schema::$TABLES as $k=>$v) {
            $query='CREATE TABLE '.$k.' (';
            foreach($v as $v2){
                $query=$query.$v2.', ';
            }
            $query=$query.'created_at TIMESTAMP, ';
            $query=$query.'id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY);';
            try{
                $this->db->exec($query);
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }
}