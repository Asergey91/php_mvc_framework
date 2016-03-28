<?php
//to avoid conflicts with controllers
namespace Models;

class People extends \Model{
    function __construct(){
        parent::__construct();
    }
    //Validator function which deals with db requests
    //Checks if the current state of the table supports this entry according to the exercise requirments
    public function validates($person){
        $people=$this->all();
        //check that there are less then 10 entries
        if (10<=$people->rowCount()){
            return false;   
        }
        //check that there are 4 or less of the same job
        $same_job=0;
        foreach($people as $p){
            if($p['job_role']==$person['job_role']){
                $same_job++;
            }
        }
        if (4<=$same_job){
            return false;   
        }
        //return true if validation passes
        return true;
    }
}