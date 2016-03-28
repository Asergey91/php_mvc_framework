<?php
class Schema{
    //this array represents the schema of your app with the key being the table name and the value being the rows
    public static $tables=[
        'People'=>[
            'first_name VARCHAR(30)',
            'last_name VARCHAR(30)',
            'email VARCHAR(50)',
            'job_role VARCHAR(50)'
        ],
    ];
}