<?php


class Photo extends Db_object{
    protected static $db_table = "photos";
    protected static $db_table_field = array('title', 'description', 'filename','last_name', 'type','size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory= "images";
    public $custom_errors= array();
    public $upload_error_array = array(

        UPLOAD_ERR_OK =>  "There is no error",
        UPLOAD_ERR_INI_SIZE => "The upload file exceed the upload_filesize allocated",
        UPLOAD_ERR_FROM_SIZE => "The upload file exceed the MAX_FILE_SIZE allocated",
        UPLOAD_ERR_PARTIAL => "The upload was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TEM_DIR => "Mising a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A PHP extention stopped the file upload",
    );


}
