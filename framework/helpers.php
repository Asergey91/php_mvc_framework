<?php
//store elper functions in here
class H{
    public static function redirect($url){
        header('Location: '.$url);
        exit();
    }
}