<?php
class Config{
    //this var deveines the environment
    public static $env='c9';
    //this array defines the based url in each environment
    public static $base_url=[
        'c9'=>
            'https://technical-test-9xb-asergey91.c9users.io/'
        ];
    //this array defines the db credentials in each environment
    public static $db=[
        'c9'=>[
            'host'=>'127.0.0.1',
            'db'=>'mvc',
            'username'=>'asergey91',
            'password'=>''
        ]
    ];
}