<?php
 include("config.php");
 $name = $_POST['name'];
 $birthday =$_POST['birthday'];
 $education =$_POST['education'];
 $skill =implode(',',$_POST['chkl']);
 $gender =$_POST['gender'];
 $department =$_POST['department'];
 $address =$_POST['address'];
 $sql = "INSERT INTO register (name, dob, education, skill,gender,dept,address) VALUES ('$name','$birthday','$education','$skill','$gender','$department','$address')";
 mysqli_query($conn, $sql);
header("location:index.php");
 ?>