#!/usr/bin/php
<?php
// require_once "../autoload.php";
class Scraper
{

    private static $instance = null;

    function __construct()
    { }

    public static function get_instance()
    {
        if (self::$instance === null) 
        {
            self::$instance = new Scraper();
        }
        return self::$instance;
    }

    public function scrape($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}
