<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search an entire database with PHP</title>

<style type="text/css">

table {
	width: 100%;
	border-collapse:collapse;
}

table, th, td {
	border: 1px solid black;
	padding: 3px;
}

</style>

</head>

<body>


<?php 

require('simple_html_dom.php');
require('Users.php');
require ('database.php');

$users = new Users($db);

if (isset($_POST["search"]) && ($_POST["search"] != "")) {

	mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
	mysql_select_db($_POST["itproject"]);

	$aryTables = array();
	$aryFields = array();

	$sql = "SHOW TABLES FROM " . $_POST["itproject"];
	$result = mysql_query($sql);

	while ($row = mysql_fetch_row($result)) {
		$aryTables[sizeof($aryTables)] = $row[0];
	}

	for ($i = 0; $i < sizeof($aryTables); $i = $i + 1) {
		$sql = "SHOW COLUMNS FROM " . $aryTables[$i];
		$result = mysql_query($sql);
		while ($row = mysql_fetch_row($result)) {
			$aryFields[sizeof($aryFields)] = $row[0];
		}

		$sql = "SELECT * FROM " . $aryTables[$i] . " WHERE ";
		for ($j = 0; $j < sizeof($aryFields); $j = $j + 1) {
			$sql = $sql . $aryTables[$i] . "." . $aryFields[$j] . " LIKE '%" . $_POST["search"] . "%'";
			if (($j + 1) != sizeof($aryFields)) {
				$sql = $sql . " OR ";
			} else {
				$sql = $sql . ";";
			}
		}

		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0) {
			echo "<p>" . $aryTables[$i] . "</p>";
			echo "<table><tr><thead>";
			foreach ($aryFields as $field => $value) {
				echo "<th>" . $value . "</th>";
			}
			while ($aryData = mysql_fetch_assoc($result)) {
				echo "<tr>";
				for ($j = 0; $j < sizeof($aryFields); $j = $j + 1) {
					echo "<td>" . substr(htmlspecialchars($aryData[$aryFields[$j]], ENT_QUOTES), 0, 150) . "</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}

		$aryFields = array();

	}


} else { ?>

    <form name="details" action="searchdb.php" method="POST">
    	<p>Database: <input type="text" name="database" /></p>
        <p>Username: <input type="text" name="username" /></p>
        <p>Password: <input type="password" name="password" /></p>
        <p>Search term: <input type="text" name="search" /></p>
        <p><input type="submit" value="Search" /> <input type="reset" value="Reset" /></p>
	</form>

<?php } ?>

<?php if (isset($conn)) {mysql_close($conn);} ?>

</body>
</html>