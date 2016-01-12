<?php

require 'Crawler.php';

$url= "http://https://lazada.com.ph/";
$crawl = new Crawler();
$crawl->crawlLinks($url);


?>
