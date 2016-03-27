<?php
class Schema{
    //this array represents the schema of your app with the key being the table name and the value being the rows
    public static $tables=[
        'Test'=>[
            'field1 VARCHAR(30)',
            'field2 INT(6)',
            'field3 TEXT'
        ],
        'Test2'=>[
            'field1 VARCHAR(30)',
            'field2 INT(6)',
            'field3 TEXT'
        ],
    ];
}