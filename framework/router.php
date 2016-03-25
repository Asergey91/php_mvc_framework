<?php
class Router{
    private $controller='DefaultController';
    private $action='page';
    function __construct(){
        if(isset($_GET['controller']) && isset($_GET['action'])){
            $this->controller=$_GET['controller'];
            $this->action=$_GET['action'];
        }
        $this->load_controller();
    }
    private function load_controller(){
        $exec=new $this->controller();
        $exec->{$this->action}();
    }
}