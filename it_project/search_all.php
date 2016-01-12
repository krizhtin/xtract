<!DOCTYPE html>
<head><title>trial sa link</title></head>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script type = "text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
<body>

<?php
require('simple_html_dom.php');
require('Users.php');
require ('database.php');

$users = new Users($db);

mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
  
     
    mysql_select_db("itproject") or die(mysql_error());

    $query = $_GET['link']; 
         
        $raw_results = mysql_query("SELECT * 
                                    FROM `INFORMATION_SCHEMA`.`COLUMNS` 
                                    WHERE `TABLE_NAME` LIKE "%".$query."%" ") 
                                    or die(mysql_error());
         
        if(mysql_num_rows($raw_results) > 0){ 
             
            while($results = mysql_fetch_array($raw_results)){
                
                echo "<p>".$results['LINKS']; 
                // echo "<br />";
               
                // $sub=$results['links'];
                // $a = new SimpleXMLElement($sub);
                // $a = $a['href'];
                // echo $a;
                // echo "<br />";
                // $html = file_get_html($a);
    
                // foreach($html->find('img') as $element)
                    
                //     echo $element->outertext;
                //     // echo $element->src;
                //       }
                }
            }
                else {
                    echo "no results";
                }
?>
</body>
                    
            

<!-- 
    else {
        echo "no results";
    }
 -->
