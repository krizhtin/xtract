
<?php
require('simple_html_dom.php');
require('Users.php');
require ('database.php');

$users = new Users($db);

mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
  
     
    mysql_select_db("itproject") or die(mysql_error());

         
        $raw_results = mysql_query("SELECT * FROM home_appliances") or die(mysql_error());
         
        if(mysql_num_rows($raw_results) > 0){ 
             
            while($results = mysql_fetch_array($raw_results)){
                
                echo "<p>".$results['links']; 
                echo "<br />";

                /*$sub=$results['links'];
                $a = new SimpleXMLElement($sub);*/
                // $a = $a['href'];
        
                // echo "<br />";
                /*$html = file_get_html($a);
    
                foreach($html->find('img') as $element)
                    
                    echo $element->outertext;
                    echo $element->src;*/
                      }
                }
                else {
                    echo "no results";
                }
?>
