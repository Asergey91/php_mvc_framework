<?php
//include foreign libraries from composer
require 'vendor/autoload.php';
//load framework files
foreach (glob("framework/*.php") as $filename){
    require $filename;
}
//load files for seeding and generating tables
foreach (glob("db/*.php") as $filename){
    require $filename;
}
//load models
foreach (glob("models/*.php") as $filename){
    require $filename;
}
//load controllers
foreach (glob("controllers/*.php") as $filename){
    require $filename;
}
//database factory
Database::connect();
//model factory
ModelFactory::load_all();
//router factory
Router::load();

