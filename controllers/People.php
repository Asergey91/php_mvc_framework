<?php

namespace Controllers;

use Respect\Validation\Validator as v;

class People extends \Controller{
    //C in CRUD
    private function create($person){
        \M::$a['People']->create($person);
    }
    //R in CRUD
    public function read(){
        //so data is accessible by view
        \D::$a['Data']=\M::$a['People']->all();
        
        require 'views/People/templates/header.php';
        require 'views/People/body.php';
        require 'views/People/templates/footer.php';
    }
    //U in CRUD
    private function update($person){
        $id=$person['id'];
        \M::$a['People']->update($id, $person);
    }
    //D in CRUD
    private function destroy($id){
         \M::$a['People']->delete($id);
    }
    
    public function submit(){
        //get user input
        $people=$_POST['people'];
        //for each entry check if update removal or a new entry is needed
        foreach($people as $person){
            
            if($person['delete']==1){
                $this->destroy($person['id']);
            }
            else if(array_key_exists('id', $person)){
                if ($this->validates($person)){
                    $this->update($person);
                }
            }
            else if(!array_key_exists('id', $person)){
                if ($this->validates($person)){
                    $this->create($person);
                }
            }
        }
        //redirect back to home
        \H::redirect(\Config::$base_url[\Config::$env]);
    }
    
    //validator function for input returns true if validations pass
    private function validates($person){
        //escape characters for sql queries
        foreach($person as $k=>$v){
            \Database::$db->quote($k);
            \Database::$db->quote($v);
        }
        //email validation
        if(!v::email()->validate($person['email'])){
            return false;
        }
        //basic string validation
        if(!v::stringType()->notEmpty()->validate($person['first_name'])){
            return false;
        }
        
        if(!v::stringType()->notEmpty()->validate($person['last_name'])){
            return false;
        }
        
        if(!v::stringType()->notEmpty()->validate($person['job_role'])){
            return false;
        }
        //model validation to make sure it fufils the exercise requirement on new submission
        if(!array_key_exists('id', $person)){
            if(!\M::$a['People']->validates($person)){
                return false;
            }
        }
        //if all validations pass return true
        return true;
    }
}