<?php
//LOAD FRAMEWORK FILES
foreach (glob("framework/*.php") as $filename){
    require $filename;
}
//LOAD SCHEMA MIGRATION
require 'db/schema.php';
//INITIALIZE DB CLASS
$db=new Db();
$db->drop();
echo 'APP TABLES DROPPED'.PHP_EOL;
$db->create();
echo 'APP TABLES CREATED'.PHP_EOL;
//CHANGE DB VAR FOR OTHER CLASSES
$db=$db->db;
//LOAD MODELS
foreach (glob("models/*.php") as $filename){
    require $filename;
    //CREATE MODEL INSTANCES
    preg_match('/^.+\/(.+)\.php$/', $filename, $temp);
    $temp= ucfirst($temp[1]);
    $$temp=new $temp();
}
//LOAD DB SETUP FILES
require 'db/seed.php';
echo 'APP TABLES SEEDED'.PHP_EOL;
