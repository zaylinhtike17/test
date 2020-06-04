<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname ="role";

	$dbhandle = mysqli_connect($dbhost, $dbuser, $dbpass) or die("could not connect to database");
	$selected =mysqli_select_db($dbhandle,$dbname);

	if(isset($_POST['uname']) && isset($_POST['uemail'])){
		$uname =$_POST['uname'];
		$uemail =$_POST['uemail'];
		$pass =md5($_POST['pass']);
		// $pass=md5($pass);
 		$confirmpass =md5($_POST['confirmpass']);
 		// $confirmpass =md5($confirmpass);
		$query1 ="SELECT * FROM roles WHERE uemail='$uemail'";
		
		$query=mysqli_query($dbhandle,$query1);
	
		if(mysqli_num_rows($query)>0){
			echo "Email already exists!";
		}
		
		else{

		 	$sql = "INSERT INTO roles (uname, uemail, pass, confirmpass) VALUES ('$uname','$uemail','$pass','$confirmpass')";
		 	mysqli_query($dbhandle, $sql);
			header("location: login.php");
		}

	}
?>


<html>

<body>
	
	<form action="new_user.php" method="POST">
		<table align="center">
		<tr>
			<th colspan="2"><h2 align="center">Register</h2></th>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="uname"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="uemail"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" name="confirmpass"></td>
		</tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" value="Register"></td>
		</tr>
	</table>
	</form>
</body>
</html>