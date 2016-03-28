<?php
class Model{
    private $table;
    //get table name from child class name
    function __construct(){
        $name=get_called_class();
        preg_match('/Models\\\\(.+)/', $name, $name);
        $this->table=$name[1];
    }
    //get all records
    public function all(){
        $query='SELECT * FROM '.$this->table;
        $res=Database::query($query);
        return $res;
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
    //update a record using an id and associative array [column=>value]
    public function update($id, $params){
        foreach($params as $column=>$value){
            $query='UPDATE '.$this->table.' SET '.$column.'="'.$value.'" WHERE id='.$id.';';
            Database::query($query);
        }
    }
    //update a record using an id and associative array [column, value]
    public function where($params){
        $query='SELECT * FROM '.$this->table.' WHERE '.$params[0].'='.$params[1].';';
        $res=Database::query($query);
        return $res;
    }
    //find a record by id
    public function delete($id){
        $query='DELETE FROM '.$this->table.' WHERE id='.$id.';';
        Database::query($query);
    }
}
class ModelFactory{
    private static $model_names=[];
    //initialize a single model classes and store it in a global variable of the same name
    public static function load($model){
        self::get_names();
        foreach(self::$model_names as $model_name){
            if($model!=$model_name){
                echo 'Unable to load model with the name '.$model;
                return false;
            }
        }
        $model_namespaced='\\Models\\'.$model;
        M::$a[$model]=new $model_namespaced;
    }
    //initialize all model classes and store them in a global variable of the same name
    public static function load_all(){
        self::get_names();
        foreach(self::$model_names as $model){
            $model_namespaced='\\Models\\'.$model;
            M::$a[$model]=new $model_namespaced;
        }
    }
    //get all model names and store them in an array
    private static function get_names(){
        $counter=0;
        foreach (glob("models/*.php") as $filename){
            preg_match('/^.+\/(.+)\.php$/', $filename, $name);
            $name=$name[1];
            self::$model_names[$counter]=$name;
            $counter++;
        }
    }
}
//all model instances are stored here
class M{
    public static $a=[];
}