<?php
foreach (glob("framework/*.php") as $filename){
    include $filename;
}
foreach (glob("db/*.php") as $filename){
    include $filename;
}
Database::connect();
Database::drop();
Database::create();
Database::seed();