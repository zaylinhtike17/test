<?php
 include("config.php");
 $id = $_GET['id'];
 $sql = "DELETE FROM register WHERE id =$id";
 mysqli_query($conn, $sql);
 header("location: list.php");
 ?>