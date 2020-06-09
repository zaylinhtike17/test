<?php
 include("config.php");
 $db_handle = new DBController();
 $name = $_POST['name'];
 $birthday =$_POST['birthday'];
 $education =$_POST['education'];
 $skill =implode(',',$_POST['chkl']);
 $gender =$_POST['gender'];
 $department =$_POST['department'];
 $address =$_POST['address'];
 $sql = "INSERT INTO register (name, dob, education, skill,gender,dept,address) VALUES ('$name','$birthday','$education','$skill','$gender','$department','$address')";
$result = $db_handle->executeQuery($sql);
header("location:index2.php");
 ?>