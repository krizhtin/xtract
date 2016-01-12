<!DOCTYPE html>
<html lang="en">
  <head>
 <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/style_light.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">


  </head>

  <body>
  <div class="container">
<?php

require('simple_html_dom.php');
require('Users.php');
require ('database.php');

$users = new Users($db);
$html = new simple_html_dom();

mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
  
     
    mysql_select_db("thesis") or die(mysql_error());

    $query = $_GET['link']; 
         // $query="footwear";
        $raw_results = mysql_query("SELECT * FROM day1
                     WHERE (`links` LIKE '%".$query."%')") or die(mysql_error());
         

        if(mysql_num_rows($raw_results) > 0){ 

            echo "ONESTOPSHOPMARKET" .'<br />';
             
            while($results = mysql_fetch_array($raw_results)){

                $sub=$results['links'];
                echo $sub .'<br>';
                $html = file_get_html($sub);
                $article = $html->find('div[class=product_list]');

                foreach($article as $link)
                {

                if(!empty($link)){
?>
          <div class="row">
            <div class="col">
              <div class="thumbnail">
                 <?php } echo $link->outertext; }?>
                </div>
            
            </div>
            </div>
         
     
<?php
            }
                }
                else {
                    echo "no results";
                }
?>
 </div>
</body>
</html>
