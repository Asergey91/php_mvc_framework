<?php
//this is a class for seeding the databse
class Seed{
    public static function seed_db(){
        //faker fo seeding
        $faker = Faker\Factory::create();
        
    
        M::$a['People']->create([
            'first_name'=>'Jo',
            'last_name'=>'Strummer',
            'email'=>'mail_j_strummer@9xb.com',
            'job_role'=>'Developer'
        ]);
        M::$a['People']->create([
            'first_name'=>'Mick',
            'last_name'=>'Jones',
            'email'=>'mail_m_jones@9xb.com',
            'job_role'=>'Project Manager'
        ]);
        M::$a['People']->create([
            'first_name'=>'Pauline',
            'last_name'=>'Black',
            'email'=>'mail_p_black@9xb.com',
            'job_role'=>'Developer'
        ]);
        M::$a['People']->create([
            'first_name'=>'Topper',
            'last_name'=>'Headon',
            'email'=>'mail_t_headon@9xb.com',
            'job_role'=>'Developer'
        ]);
    }
}