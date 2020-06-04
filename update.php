<?php
 include("config.php");
 $id = $_POST['id'];
 $name = $_POST['name'];
 $birthday =$_POST['birthday'];
 $education =$_POST['education'];
 $skill =implode(',',$_POST['chkl']);
 $gender =$_POST['gender'];
 $department =$_POST['department'];
 $address =$_POST['address'];
 $sql = "UPDATE register SET name='$name', dob='$birthday', education='$education',skill='$skill', gender='$gender',dept='$department',address='$address' WHERE id=$id";
 mysqli_query($conn, $sql);
header("location:index.php");
 ?>