<?php
class H{
    public static function redirect($url){
        header('Location: '.$url);
        exit();
    }
}