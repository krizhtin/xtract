<?php

require('url_to_absolute.php');
require('simple_html_dom.php');
require('Users.php');
require ('database.php');
$html = new simple_html_dom();
$users = new Users($db);


$date = date('Y-m-d');
echo $date .'<br />';

$html = file_get_html('http://onestopshopmarket.com/home-appliances/audio/turntables');
$article = $html->find('div[class=product_list]', 0);

foreach($article->find('a[class=thumbnail]') as $link){

    //if the href contains singer then echo this link
    // if(strstr($link, 'singer')){
        echo $link->href.'<br />';
        /*$name = $html->find('div[class=product-list]');
             foreach($name as $name) {*/
    
         $name = $name->find('h1 a', 0)->plaintext;
             // }
        // $users->add_link($link);
    // }
}

?>

</*?php
require('simple_html_dom.php');
$url = "http://onestopshopmarket.com/home-appliances/aircon/";

// Start from the main page
$nextLink = $url;

// Loop on each next Link as long as it exsists
while ($nextLink) {
    echo "nextLink: $nextLink<br>";
    //Create a DOM object
    $html = new simple_html_dom();
    // Load HTML from a url
    $html->load_file($nextLink);

    ////////////////////////////////////////////////
    /// Get phone blocks and extract useful info ///
    ////////////////////////////////////////////////
    $phones = $html->find('div[class=product-list]');

    foreach($phones as $phone) {
        // Get the link
        $linkas = "http://onestopshopmarket" . $phone->find('div[class=product_box]', 0)->href;

        // Get the name
        $pavadinimas = $phone->find('h5 a', 0)->plaintext;

        // If price not found, find() returns FALSE, then return 000
        if ( $tempPrice = $phone->find('span[class=price-reg] strong', 0) ) {
            // Get the name price and extract the useful part using regex
            $kaina = $tempPrice->plaintext;
            // This captures the integer part of decimal numbers: In "123,45" will capture "123"... Use @([\d,]+),?@ to capture the decimal part too
            preg_match('@(\d+),?@', $kaina, $matches);
            $kaina = $matches[1];
        }
        else
            $kaina = "000";


        echo $pavadinimas, " #----# ", $kaina, " #----# ", $linkas, "<br>";

    }
    ////////////////////////////////////////////////
    ////////////////////////////////////////////////

    // Extract the next link, if not found return NULL
    $nextLink = ( ($temp = $html->find('div#pagination a[rel="next"]', 0)) ? "http://onestopshopmarket".$temp->href : NULL );

    // Clear DOM object
    $html->clear();
    unset($html);

    echo "<hr>";
}
?>*/