<?php
//this is a class for seeding the databse
class Seed{
    public static function seed_db(){
        //faker fo seeding
        $faker = Faker\Factory::create();
        //use it like this
        for($i=0; $i<100; $i++){
            M::$a['Test1']->create([
                'field1'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
                'field2'=>$faker->randomNumber($nbDigits = NULL),
                'field3'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true)
            ]);
        }
        for($i=0; $i<200; $i++){
            M::$a['Test2']->create([
                'field1'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
                'field2'=>$faker->randomNumber($nbDigits = NULL),
                'field3'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'test1_id'=>$faker->randomDigit
            ]);
        }
    }
}