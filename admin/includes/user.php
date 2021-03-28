<?php

class User{

    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;



    public static function find_all_users(){
      $sql= "SELECT * FROM users";
      return self:: find_this_query($sql);
    }

    public static function find_user_by_id($user_id){
        global $database;
        $sql= "SELECT * FROM users WHERE id =$user_id LIMIT 1";
        $the_result_array = self:: find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    //help us het the mysqli_connect method from database class

    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while ($row= mysqli_fetch_array($result_set)){

            $the_object_array[] = self::instantiation($row);
        }
        return $the_object_array;
    }

    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '$username'";
        $sql .= " AND password = '$password'";
       // $sql .= "LIMIT 1";

        $the_result_array = self:: find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


        public static function instantiation($the_record){
        $the_object = new self;
//
//        $the_object->id= $found_user['id'];
//        $the_object->first_name= $found_user['first_name'];
//        $the_object->last_name= $found_user['last_name'];
//        $the_object->user_name= $found_user['user_name'];
//        $the_object->user_password= $found_user['user_password'];

        foreach ($the_record as $the_array_index => $value){
            if($the_object-> has_the_property($the_array_index)){
                $the_object->$the_array_index = $value;
            }
        }
        return $the_object;
    }

    private function has_the_property($the_array_index){
   $object_properties=get_object_vars($this);
   return array_key_exists($the_array_index, $object_properties);

    }


    public function create(){
        global $database;

        $sql = "INSERT INTO users(username,first_name, last_name, password)";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->username) . "', '";
        $sql .= $database->escape_string($this->first_name) . "', '";
        $sql .= $database->escape_string($this->last_name) . "', '";
        $sql .= $database->escape_string($this->password) . "')";

        if($database->query($sql)){
            $this->id = $database->the_insert_id();
           return "true";
        }else{
            return "false";
        }
    } //create method

    public  function update(){
        global $database;
        $sql = "UPDATE users SET ";
        $sql .= "username= '". $database->escape_string($this->username)   ."', ";
        $sql .= "password= '". $database->escape_string($this->password)   ."', ";
        $sql .= "first_name='". $database->escape_string($this->first_name) ."', ";
        $sql .= "last_name='" . $database->escape_string($this->last_name) ."' ";
        $sql .= " WHERE id=". $database->escape_string($this->id);
    
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) ==1) ?true : false;
    
    }

    public function delete(){
        global $database;
        $sql="DELETE FROM users ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) ==1) ?true : false;



    }




} //END OF USER CLASS

