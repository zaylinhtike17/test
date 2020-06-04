<?php
	session_start();
	$email =$_POST['email'];
	$password=$_POST['password'];
	if($email =="admin@gmail.com" && $password="12345"){
		$_SESSION['auth'] =true;
		
	}
	header("location:index.php");

?>