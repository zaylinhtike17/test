<table>

	<form action="add.php" method="post">
	<tr>
	 	<td><label for="name">Name</label></td>
	 	<td><input type="text" name="name" id="name" required="required"></td>
	</tr>
	<tr>
		<td><label for="birthday">Birthday</label></td>
		<td><input type="date" name="birthday" id="birthday" required="required"></td>
	</tr>
	<tr>
		<td><label for="education">Education</label></td>
		<td><input type="radio" name="education" value="graduated" checked="checked">Graduated
		<input type="radio" name="education" value="postgraduated">Post Graduated</td>
	</tr>
	<tr>
		<td><label for="skill">IT skill</label></td>
		<td><input type="checkbox"  name="chkl[ ]" value="PHP">PHP
		<input type="checkbox"  name="chkl[ ]" value="Javascript">Javascript
		<input type="checkbox"  name="chkl[ ]" value="CSS">CSS
		<input type="checkbox"  name="chkl[ ]" value="MySQL">MySQL</td>
	</tr>
	<tr>
	
		<td><label for="gender">Gender:</label></td>
		<td><input type="radio" name="gender" value="male" checked="checked">Male
		<input type="radio" name="gender" value="female">Female</td>
	</tr>
	<tr>
		<td><label for="department">Department:</label></td>
		<td><select name="department" id="department">
  		<option value="system">System Team</option>
  		<option value="design">Design Team</option>
  		<option value="photoshop">Photoshop Team</option>
  		<option value="autocad">Autocad Team</option>
		</select></td>
	</tr>
	<tr>
		<td><label for="address">Address:</label></td>
		<td><textarea name="address" id="address" required="required"></textarea></td>
	</tr>
	<tr>
		<td  colspan="2" align="center"><input type="submit" value="INSERT"></td>
	</tr>
	</form>
</table>
<style>
	form label{
		
		margin-top: 8px; 
		padding: 5px;
	}
</style>