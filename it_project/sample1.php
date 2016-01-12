<?php

require'database.php';
require'Users.php';
include_once('simple_html_dom.php');

$url= "http://https://lazada.com.ph/";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_REFERER,  $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	$str = curl_exec($curl);
	curl_close($curl);
$html = new simple_html_dom();
$users = new Users($db);
// $html->load_file($url);
	/*foreach($html->find('img') as $link)
	{
		echo $link->outertext."<br />";
		echo $link->src."<br />";
	}
*/

$html->load($str);		

	foreach($html->find('a') as $link)
	{
		echo $link->href."<br />";
		echo $link->src."<br />";
					
		}

	// foreach($html->find('a') as $newlink)
	// {
		/*echo url_to_absolute($url, $newlink->href."<br />");
		echo $newlink->href."<br />";
		
	}*/

?>

<!DOCTYPE html>
<head><title>trial sa link</title></head>
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type = "text/javascript" src="js/bootstrap.min.js"></script>
<body>
<?php
	if(isset($_POST['save'])){
		
	{
		foreach($html->find('a') as $link)
		echo $link->href .'<br />';
		//header('Location: sample1.php?');
	}
	
}
?>
	 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">  
	 <button type="submit" name = "save" id="submit" class="btn btn-primary" onclick="alert('Hasula Jud')"> SAVE</button>
	 </form>
</body>
</html>

