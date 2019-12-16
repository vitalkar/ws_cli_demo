#!/usr/bin/php
<?php 
//if using app via terminal add '#!/usr/bin/php' in the start of any relevant file
if (php_sapi_name() !== 'cli')
{
    die;
}

if ($argc === 1)
{
    die("too few arguments, please provide a valid URL and a SEARCH keyword");
}

require_once "autoload.php";

// $url = "https://rothfarb.info/ronen/arabic/";
$url = $argv[1];

$search = $argv[2];

$scraper = Scraper::get_instance();
$d_handler = DataHandler::get_instance();
$content = $scraper->scrape($url);
$result = $d_handler->search($search, $content);
echo $result;
