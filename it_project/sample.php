<?php

require('url_to_absolute.php');
require('simple_html_dom.php');
require('Users.php');
require ('database.php');
$html = new simple_html_dom();
$users = new Users($db);


$date = date('Y-m-d');
echo $date .'<br />';

$html = file_get_html('http://onestopshopmarket.com/all-categories');

    foreach($html->find('a') as $link){
    	$a= $link->href .'<br />';
    	// echo $a;
         if (strpos($a,'home-appliances') !== false) {
         echo 'true';
     }
    	// $users->add_link($a);
        /*foreach($html->find($a) as $sub)
        {
            $b=$sub->href.'<br>';
            echo $b;
        }*/

}
/*$html = file_get_html('http://onestopshopmarket.com/home-appliances/');

    foreach($html->find('a') as $link){
        $a= $link->href .'<br />';
        // echo $a;

        if($next=$html->find('a[class=pagination]',1)){
            $URL=$next->href;
             $html->clear();
                unset($html);
 
            getArticles($URL);
            // echo $URL;
        }
        // $users->add_link($a);

}*/
/*
    if (strpos($a,'home-appliances') !== false) {
    echo 'true';
}
*/
       /* $div=$html->find('h5',0)->parent();
        	echo $div;*/
    /*foreach($name as $name)
        $name=$name->find('h5 a',0)->plaintext;*/
      
 
/*   
}*/

?>
