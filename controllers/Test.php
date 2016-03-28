<?php

namespace Controllers;

class Test extends \Controller{
    
    public function index(){
        $all=\M::$a['Test1']->all();
        foreach($all as $row){
            echo var_dump($row);
        }
    }
    
}