<?php 
class Users{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	
	 

	public function add_link($link){
		
		global $bcrypt; // making the $bcrypt variable global so we can use here
 
		$query = $this->db->prepare("INSERT INTO `day1` (`links`) VALUES (?)");
		 
		$query->bindValue(1, $link);
		
		try{
		$query->execute();
		 
		// mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://www.example.com/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team");
		}catch(PDOException $e){
		die($e->getMessage());
		}		
	}

	public function add_category($categories){
		$query = $this->db->prepare("INSERT INTO `home_appliances` (`categories`) WHERE `categories` LIKE ? ");
		
		$query->bindValue(1, $categories);
		
		try{
		$query->execute();
		 
		}catch(PDOException $e){
		die($e->getMessage());
		}		

	}

	public function get_links() {

		$query = $this->db->prepare("SELECT * FROM `home_appliances` ");
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

		return $query->fetchAll();

	}

	public function search($link){

		$query = $this->db->prepare("SELECT * FROM `home_appliances` WHERE `links` LIKE ? ");
		$query->bindValue(1, $link);

		try{

			$query->execute();

		} catch(PDOException $e){

			die($e->getMessage());
		}

		return $query->fetchAll();

	}

	public function strip_selected_tags($str, $tags = "", $stripContent = false)
		{
		    preg_match_all("/<([^>]+)>/i", $tags, $allTags, PREG_PATTERN_ORDER);
		    $replace = "%(<$tag.*?>)(.*?)(<\/$tag.*?>)%is";
		    foreach ($allTags[1] as $tag) {
		        if ($stripContent) {
		            $str = preg_replace($replace,'',$str);
		        }
		            $str = preg_replace($replace,'${2}',$str);
		    }
		    return $str;
		}

	public function _toString($text){
		return $this->text=$text;
	}
}