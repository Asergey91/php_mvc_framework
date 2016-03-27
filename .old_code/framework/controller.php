<?php
class Controller{
    function __construct(){
    }
    public function render($dir){
        require 'views/templates/header.php';
        preg_match('/^(.+)Controller$/', get_called_class(), $temp);
        $temp=$temp[1];
        require 'views/'.$temp.'/'.$dir;
        require 'views/templates/footer.php';
    }
}