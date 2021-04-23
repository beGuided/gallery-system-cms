<?php

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_field = array('username', 'password', 'first_name','last_name','user_image');
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;
    public $user_image;
    public $tmp_path;
    public $upload_directory = "images";
    public $images_placeholder = "http://placehold.it/400*400&text=image";


    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
           echo  "There was no uploaded file here!";

        } else {
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
//            $this->type = $file['type'];
//            $this->size = $file['size'];

        }

    }

    public function upload_photo(){

            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->user_image) || empty($this->tmp_path)) {
                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
            // $target_path = "admin/images/{$this->filename}";
            if (file_exists($target_path)) {
                $this->errors[] = "the file {$this->user_image} already exist";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {
                    unset($this->tmp_path);
                    return true;

            } else {
                $this->errors[] = "the file directory probably does not have permission";
                return false;
            }


    }

    public function image_path_and_placeholder(){

        return empty($this->user_image)? $this->images_placeholder : $this->upload_directory.DS.$this->user_image;
    }





    public static function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " .self::$db_table." WHERE ";
        $sql .= "username = '$username'";
        $sql .= " AND password = '$password'";
       // $sql .= "LIMIT 1";

        $the_result_array = self:: find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }




} //END OF USER CLASS

