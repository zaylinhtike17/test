<h1>Edit</h1>
<?php
	include("config.php");
	$id = $_GET['id'];
	$result = mysqli_query($conn, "SELECT * FROM register WHERE id= $id");
	$row = mysqli_fetch_assoc($result);
	$a=$row['skill'];
	$b=explode(",",$a);

?>

<table>

	<form action="update.php" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id']?>">
	<tr>
		<td><label for="name">Name</label></td>
		<td><input type="text" name="name" id="name" value="<?php echo $row['name']?>"></td>
	</tr>

	<tr>
		<td><label for="birthday">Birthday</label></td>
		<td><input type=" " name="birthday" id="birthday" value="<?php echo $row['dob']?>"></td>
	</tr>
	<tr>
		<td><label for="education">Education</label></td>
		<td><input type="radio" name="education" value="graduated" <?php if($row['education'] =='graduated'){ echo "checked";}?> >Graduated
		<input type="radio" name="education" value="postgraduated" <?php if($row['education'] =='postgraduated'){ echo "checked";}?>>Post Graduated</td>
	</tr>
	<tr>
		<td><label for="skill">IT skill</label></td>
		<td><input type="checkbox"  name="chkl[ ]" value="PHP" <?php if(in_array("PHP",$b)){echo "checked";}?>>PHP
		<input type="checkbox"  name="chkl[ ]" value="Javascript" <?php if(in_array("Javascript",$b)){echo "checked";}?>>Javascript
		<input type="checkbox"  name="chkl[ ]" value="CSS" <?php if(in_array("CSS",$b)){echo "checked";}?>>CSS
		<input type="checkbox"  name="chkl[ ]" value="MySQL" <?php if(in_array("MySQL",$b)){echo "checked";}?>>MySQL</td>
	</tr>
	<tr>
	
		<td><label for="gender">Gender:</label></td>
		<td><input type="radio" name="gender" value="male" <?php if($row['gender'] =='male'){ echo "checked";}?>>Male
		<input type="radio" name="gender" value="female" <?php if($row['gender'] =='female'){ echo "checked";}?>>Female</td>
	</tr>
	<tr>
		<td><label for="department">Department:</label></td>
		<td><select name="department" id="department">
  		<option value="system" <?php if($row['dept']=='system'){ echo "selected";}?>>System Team</option>
  		<option value="design" <?php if($row['dept']=='design'){ echo "selected";}?>>Design Team</option>
  		<option value="photoshop" <?php if($row['dept']=='photoshop'){ echo "selected";}?>>Photoshop Team</option>
  		<option value="autocad" <?php if($row['dept']=='autocad'){ echo "selected";}?>>Autocad Team</option>
		</select></td>
	</tr>
	<tr>
		<td><label for="address">Address:</label></td>
		<td><textarea name="address" id="address"><?php echo $row['address']?></textarea></td>
	</tr>
	<tr>
		<td  colspan="2" align="center"><input type="submit" value="Update"></td>
	</tr>
	</form>
</table>