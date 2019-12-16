<?php
require_once "autoload.php";
class Scraper
{

    private static $instance = null;
    private $curl = null;

    function __construct()
    {
        $this->curl = curl_init();
    }

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new Scraper();
        }
        return self::$instance;
    }

    private function init()
    {
        curl_setopt($this->curl, CURLOPT_HTTPGET, true);
        curl_setopt($this->curl, CURLOPT_HEADER, true);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
    }

    public function scrape($url, $referer = null)
    {
        //
        $this->init();
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_REFERER, $referer);


        $result = curl_exec($this->curl);
        curl_close($this->curl);
        
        $dh = DataHandler::get_instance();
        $result = $dh->transform($result);
        return $result;
    }
}
