<?php
class Model{
    
    private $table;
    
    function __construct(){
        $this->table=get_called_class();
    }
    //find a record by id
    public function find($id){
        $query='SELECT * FROM '.$this->table.' WHERE id='.$id.';';
        $res=Database::query($query);
        return $res;
    }
    //create a record using an associative array [column=>value]
    public function create($params){
        $insert=['columns'=>'', 'values'=>''];
        //format params for the query
        foreach($params as $column=>$value){
            $insert['columns']=$insert['columns'].$column.',';
            $insert['values']=$insert['values']."'".$value."', ";
        }
        //remove trailing commas
        $insert['columns']=substr($insert['columns'], 0, -1);
        $insert['values']=substr($insert['values'], 0, -2);
        //form the query
        $query='INSERT INTO '.$this->table.' ('.$insert['columns'].') VALUES ('.$insert['values'].');';
        //do the actual query
        Database::query($query);
    }
}