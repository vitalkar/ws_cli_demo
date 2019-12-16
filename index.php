<?php
require_once "autoload.php";
header('Content-Type: application/json');

// $url = "https://rothfarb.info/ronen/arabic/";
// $url = "https://he.wikipedia.org/wiki/עברית";
$url = "https://www.onexone.co.il/excersize/68374-2/";


$scraper = Scraper::get_instance();
$content = $scraper->scrape($url);

// echo ($content);
// var_dump(($content));
echo json_encode($content);

