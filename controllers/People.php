<?php

namespace Controllers;

use Respect\Validation\Validator as v;

class People extends \Controller{
    private function create($person){
        \M::$a['People']->create($person);
    }
    public function read(){
        
        \D::$a['Data']=\M::$a['People']->all();
        
        require 'views/People/templates/header.php';
        require 'views/People/body.php';
        require 'views/People/templates/footer.php';
    }
    private function update($person){
        $id=$person['id'];
        \M::$a['People']->update($id, $person);
    }
    
    private function destroy($id){
         \M::$a['People']->delete($id);
    }
    
    public function submit(){
        
        $people=$_POST['people'];
        
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
        \H::redirect(\Config::$base_url[\Config::$env]);
    }
    private function validates($person){
        
        foreach($person as $k=>$v){
            \Database::$db->quote($k);
            \Database::$db->quote($v);
        }
        
        if(!v::email()->validate($person['email'])){
            return false;
        }
        if(!v::stringType()->notEmpty()->validate($person['first_name'])){
            return false;
        }
        
        if(!v::stringType()->notEmpty()->validate($person['last_name'])){
            return false;
        }
        
        if(!v::stringType()->notEmpty()->validate($person['job_role'])){
            return false;
        }
        
        if(!\M::$a['People']->validates($person)){
            return false;
        }
        return true;
    }
}