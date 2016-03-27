<?php
class Router{
    public static $controller;
    
    public static $action;
    
    public static function load(){
        self::$controller=Config::$default_controller;
        self::$action=Config::$default_action;
        if (isset($_GET['controller']) && isset($_GET['action'])){
            self::$controller=$_GET['controller'];
            self::$action=$_GET['action'];
        }
        ControllerFactory::load(self::$controller, self::$action);
    }
}