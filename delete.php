<?php
require_once("config.php");
$db_handle = new DBController();
if(!empty($_GET["id"])) {
    $query = "DELETE FROM register WHERE id=".$_GET["id"];
    $result = $db_handle->executeQuery($query);
	if(!empty($result)){
		header("Location:index2.php");
	}
}
?>