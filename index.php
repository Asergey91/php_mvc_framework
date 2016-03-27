<?php
require 'vendor/autoload.php';

foreach (glob("framework/*.php") as $filename){
    require $filename;
}
foreach (glob("db/*.php") as $filename){
    require $filename;
}
foreach (glob("models/*.php") as $filename){
    require $filename;
}
foreach (glob("controllers/*.php") as $filename){
    require $filename;
}
Database::connect();
ModelFactory::load_all();
Router::load();

