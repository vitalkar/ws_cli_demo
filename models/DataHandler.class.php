<?php

class DataHandler
{

    private static $instance = null;

    function __construct()
    { }

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new DataHandler();
        }
        return self::$instance;
    }

    public function search($content, $str)
    {
        $pattern = "/^$str$/";
        $result = preg_match($pattern, $content);
        return $result;
    }

    public function consume($content)
    { 
        
    }


    public function sanitize($str)
    {
        $str = strip_tags($str);
        $str = stripslashes($str);
        // $str = stripcslashes($str);
        $str = preg_filter("/[a-zA-Z&:;\d\-_=!\'\"\?,\*\/<>\[\]\(\)\{\}\|#@]/", "", $str);
        return $str;
    }

    //
    public function get_valid_words($pattern, array $arr)
    {
        return preg_grep($pattern, $arr);
    }

    //returns an array of words
    public function split($pattern, $str)
    {
        return preg_split($pattern, $str);
    }
    

    public function transform($str)
    {
        //sanitize
        $result = $this->sanitize($str);
        //split
        $result = $this->split("/[\s+\.]/", $result);
        return $result;
    }
}

 
