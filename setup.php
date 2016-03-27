<?php
include 'vendor/autoload.php';
foreach (glob("framework/*.php") as $filename){
    include $filename;
}
foreach (glob("db/*.php") as $filename){
    include $filename;
}
foreach (glob("models/*.php") as $filename){
    include $filename;
}
ModelFactory::load_all();
Database::connect();
Database::drop();
Database::create();
Database::seed();