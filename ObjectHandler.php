<?php
/*
ObjectHandler is a class that save object in memory file, 
where the object will save as a serialized object. 
ObjectHandler contain two method which are (save) that use to store object on file
and (find) that return object by object key.
*/
class ObjectHandler
{

    function __construct()
    {
        // create folder to save files, folder name "Objects folder"
        if (!is_dir('Objects folder')) {
            // dir doesn't exist, make it
            mkdir('Objects folder');
        }
    }

    public static function save($obj)
    {
        // cnvert object to serialized form.
        $s = serialize($obj);

        // create and initialize key for the received object.
        static $GKey = 0;
        $GKey++;

        // store object and the generated key on the file, then return it to the user.
        file_put_contents('Objects folder/' . $GKey, $s);
        return $GKey;
    }
    public static function find($key)
    {
        //set your own error handler before the call
        set_error_handler(function ($err_severity, $err_msg, $err_file, $err_line, array $err_context) {
            throw new ErrorException($err_msg, 0, $err_severity, $err_file, $err_line);
        }, E_WARNING);
        try {
            // retrive object by object key.
            $s = file_get_contents('Objects folder/' . $key);

            // unserialize object and return it.
            $a = unserialize($s);
            return $a;
        } catch (Exception $e) {
            echo 'object not found';
        }
        //restore the previous error handler
        restore_error_handler();
    }
}


