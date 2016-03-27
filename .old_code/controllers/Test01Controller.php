<?php
class Test01Controller extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function create (){
        
    }
    public function read (){
        global $Test01;
        $data=$Test01->find($_GET['Test01']['id']);
        $this->render('read.php');
    }
    public function update (){
        
    }
    public function delete (){
        
    }
}