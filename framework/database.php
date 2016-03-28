<?php
class Database{
    //database connection object
    public static $db;
    //connects to the database
    public static function connect(){
        $debug=Config::$db[Config::$env];
        try{
            self::$db = new PDO(
                'mysql:dbname='.Config::$db[Config::$env]['db'].';host='.Config::$db[Config::$env]['host'],
                Config::$db[Config::$env]['username'],
                Config::$db[Config::$env]['password']
            );
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    //a basic query abstraction for DRYness
    public static function query($query){
        try{
            $res=self::$db->query($query);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $res;
    }
    //removes all tables from database
    public static function drop(){
        $query="SHOW TABLES";
        $res=self::query($query);
        $tables=[];
        $counter=0;
        foreach($res as $table){
            $tables[$counter]=$table[0];
            $counter++;
        }
        foreach($tables as $table){
            self::query('DROP TABLE '.$table.';');
        }
    }
    //creates tables based on Schema class
    public static function create(){
        foreach (Schema::$tables as $name=>$columns) {
            $query='CREATE TABLE '.$name.' (';
            foreach($columns as $column){
                $query=$query.$column.', ';
            }
            $query=$query.'created_at TIMESTAMP, ';
            $query=$query.'id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY);';
            self::query($query);
        }
    }
    //seed the database
    public static function seed(){
        Seed::seed_db();
    }
}