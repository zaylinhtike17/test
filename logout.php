<?php
	session_start();
	unset($_SESSION['auth']);
	unset($_SESSION['id']);
	header("location:index.php");
?>