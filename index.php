<?php
foreach (glob("framework/*.php") as $filename){
    require $filename;
}
foreach (glob("controllers/*.php") as $filename){
    require $filename;
}
foreach (glob("models/*.php") as $filename){
    require $filename;
}
foreach (glob("views/*.php") as $filename){
    require $filename;
}
$db=new Db();
$router=new Router();