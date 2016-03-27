<?php
class Model{
    private $table;
    function __construct(){
        preg_match('/^(.+)$/', get_called_class(), $temp);
        $this->table=$temp[1];
    }
    public function find($id){
        global $db;
        try{
            $query='SELECT * FROM '.$this->table.' WHERE id='.$id.';';
            $res=$db->query($query);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $res;
    }
    public function create($params){
        global $db;
        $temp=['', ''];
        foreach($params as $k=>$v){
            $temp[0]=$temp[0].$k.',';
            $temp[1]=$temp[1]."'".$v."', ";
        }
        $temp[0]=substr($temp[0], 0, -1);
        $temp[1]=substr($temp[1], 0, -2);
        $query='INSERT INTO '.$this->table.' ('.$temp[0].') VALUES ('.$temp[1].');';
        try{
            $db->query($query);
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function update($id, $params){
        global $db;
        foreach($params as $k=>$v){
            try{
                $query='UPDATE '.$this->table.' SET '.$k.'='.$v.' WHERE id='.$id;
                $db->query($query);
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }
    public function where($params){
        global $db;
        try{
            $query='SELECT * FROM '.$this->table.' WHERE '.$params[0].'='.$params[1].';';
            $res=$db->query($query);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $res;
    }
    public function delete($id){
        global $db;
        try{
            $query='DELETE FROM '.$this->table.' WHERE id='.$id.';';
            $db->query($query);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
}