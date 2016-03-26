<?php
//LOAD FRAMEWORK FILES
foreach (glob("framework/*.php") as $filename){
    require $filename;
}
//LOAD CONTROLLER FILES
foreach (glob("controllers/*.php") as $filename){
    require $filename;
}
//INITIALIZE DB CLASS
$db=new Db();
$db=$db->db;
//LOAD MODEL FILES
foreach (glob("models/*.php") as $filename){
    require $filename;
    //CREATE MODEL INSTANCES
    preg_match('/^.+\/(.+)\.php$/', $filename, $temp);
    $temp=ucfirst($temp[1]);
    $$temp=new $temp();
}
//INITIALIZE ROUTER
new Router();
