<?php
class MysqlDatabase extends database{
    protected $connect;

    public function __construct()
    {
        global $db_host,$db_user,$db_password,$db_database;

        $this->connect = new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_database
        );

        if($this->connect->connect_error) {
            die("Kết Nối Thất Bại" );
        }
    }


    public function table($tableName){
        $this->table = $tableName;
        return $this;
    }

    public function get($limit = 15,$offset =0){
        $sql ="select * from $this->table limit ? offset ?";
        $query = $this->connect->prepare($sql);
        $query->bind_param('ii',$limit,$offset);
        $query->execute();
        $result = $query->get_result();
        $data = [];
        while($each = $result->fetch_object()){
            $data[] = $each;
        }
        return $data;
    }




    public function getID($id){
        $sql ="select * from $this->table where id = ?";
        $query = $this->connect->prepare($sql);
        $query->bind_param('i',$id);
        $query->execute();
        $result = $query->get_result();
        $data = [];
        while($each = $result->fetch_object()){
            $data[] = $each;
        }
        return $data;
    }

     public function insert($data){
        $sql ="insert into $this->table ";
        $sql .= "(".implode(",", array_keys($data)) .")values";
        $questionMarks = array_fill(0,count($data),'?');
        $sql .= "(".implode(",", array_values($questionMarks)) .")";
        $query = $this->connect->prepare($sql);
        $values = array_values($data);
        $query->bind_param(str_repeat('s',count($data)), ...$values);
        $result = $query->execute();
        header('location:index.php');
        return $result;
    }
     public function update($id, $data = []){
        $keyValues = [];
        foreach($data as $key => $value){
             $keyValues[] = $key.'=?';
        }
        $setFields = implode(',',$keyValues);


        $sql = "Update $this->table set $setFields where id = ?";
        $query = $this->connect->prepare($sql);
        

        //get values
        $values = array_values($data);
        $values[] = $id;

        $dataTypes = str_repeat('s',count($data)).'i';

        $query->bind_param($dataTypes,...$values);
        $result = $query->execute();
        header('location:index.php');
        return $this->connect->affected_rows;
    }
     public function delete($id){
        $sql = "delete from $this->table where id = ?";
        $query = $this->connect->prepare($sql);
        $query->bind_param('i',$id);
        $query->execute();
        header('location:index.php');
        return $this->connect->affected_rows;
    }
}