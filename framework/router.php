<?php
class Router{
    private $controller='DefaultController';
    private $action='page';
    function __construct(){
        if(isset($__GET['controller'])&&isset($__GET['action'])){
            $this->controller=$__GET['controller'];
            $this->action=$__GET['controller'];
        }
        $this->load_controller();
    }
    private function load_controller(){
        $exec=new $this->controller();
        $exec->{$this->action}();
    }
}