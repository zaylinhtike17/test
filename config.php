<?php
 	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname ="crud";

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	mysqli_select_db($conn, $dbname);
	if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>