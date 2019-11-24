#!/usr/bin/php
<?php

class DataHandler
{ 
    private static $instance = null;
    function __construct()
    {}

    public static function get_instance()
    {
        if (self::$instance === null)
        {
            self::$instance = new DataHandler();
        }
        return self::$instance;
    }

    function search($content, $str)
    {
        $pattern = "/^$str$/";
        $result = preg_match($pattern, $content);
        return $result;
    }
}
