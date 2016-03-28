<?php
class Controller{
    
}
class ControllerFactory{
    //stores names of all the controllers
    private static $controller_names=[];
    //gets the names of controller that currently exist
    private static function get_names(){
        $counter=0;
        foreach (glob("controllers/*.php") as $filename){
            preg_match('/^.+\/(.+)\.php$/', $filename, $name);
            $name=$name[1];
            self::$controller_names[$counter]=$name;
            $counter++;
        }
    }
    //loads the controller and executes the action;
    public static function load($controller, $action){
        self::get_names();
        foreach(self::$controller_names as $controller_name){
            if($controller!=$controller_name){
                echo 'Unable to load controller with the name '.$controller;
                return false;
            }
        }
        $controller_namespaced='\\Controllers\\'.$controller;
        $actions=get_class_methods($controller_namespaced);
        foreach($actions as $act){
            if($act==$action){
                C::$a[$controller]=new $controller_namespaced;
                C::$a[$controller]->{$action}();
                return true;
            }
        }
        echo 'Unable to load action with the name '.$action;
        return false;
    }
}
//this class stores all the instances of controllers
class C{
    public static $a;
}