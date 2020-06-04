<?php
	session_start();
	$auth =isset($_SESSION['auth']);
?>
<?php
	include("config.php");
	$result = mysqli_query($conn, "SELECT * FROM register");
?>
<?php if ($auth) {?>

<label for="search">Search</label>
<input type="text">
<a href="new.php" class="new" style="text-align: right; margin-left: 300px;">ADD NEW</a>
<a href="logout.php" class="new" style="display: inline; text-align: right; margin-left: 30px;">LOG OUT</a>
<ul>
	<?php while($row = mysqli_fetch_assoc($result)): ?>
	<li>
		[<a href="delete.php?id=<?php echo $row['id']?>" class="delete">Delete</a>]
		[<a href="edit.php?id=<?php echo $row['id']?>">Edit</a>]
		<?php echo $row['name']?>,
		<?php echo $row['dob']?>,
		<?php echo $row['education']?>,
		<?php echo $row['skill']?>,
		<?php echo $row['gender']?>,
		<?php echo $row['dept']?>,
		<?php echo $row['address']?>,
	</li>
<?php endwhile; ?>
</ul>


<?php } else {?>
you need to login
<form action="login.php" method="post">
	<label for="email">Email</label><br>
	<input type="text" name="email" id="email"><br>
	<label for="password">Password</label><br>
	<input type="password" name="password" id="password"><br>
	<input type="submit" value="login">
	<button><a href="register.php" style="text-decoration: none;">Register</a></button>
</form>	
<?php } ?>

