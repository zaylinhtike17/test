<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname ="role";

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	mysqli_select_db($conn, $dbname);
?>