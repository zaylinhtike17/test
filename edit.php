<?php
require_once("config.php");
$db_handle = new DBController();

if(!empty($_POST["submit"])) {
	$name = $_POST['name'];
 	$dob =$_POST['dob'];
	$education =$_POST['education'];
 	$skill =implode(',',$_POST['skill']);
 	$gender =$_POST['gender'];
 	$dept =$_POST['department'];
 	$address =$_POST['address']; 

    $query = "UPDATE register set name ='$name',dob='$dob', education='$education', skill='$skill',gender='$gender',dept='$dept', address='$address' WHERE  id=".$_GET["id"];
    $result = $db_handle->executeQuery($query);
	if(!$result){
		$message = "Problem in Editing! Please Retry!";
	} else {
		header("Location:index2.php");
	}
}
$result = $db_handle->runQuery("SELECT * FROM register WHERE id='" . $_GET["id"] . "'");
$a=$result[0]['skill'];
$b=explode(",",$a);
?>

<link href="style.css" type="text/css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
// function validate() {
// 	var valid = true;	
// 	$(".demoInputBox").css('background-color','');
// 	$(".info").html('');
	
// 	if(!$("#name").val()) {
// 		$("#name-info").html("(required)");
// 		$("#name").css('background-color','#FFFFDF');
// 		valid = false;
// 	}
// 	if(!$("#dob").val()) {
// 		$("#dob-info").html("(required)");
// 		$("#dob").css('background-color','#FFFFDF');
// 		valid = false;
// 	}
// 	if(!$("#education").val()) {
// 		$("#education-info").html("(required)");
// 		$("#education").css('background-color','#FFFFDF');
// 		valid = false;
// 	}
// 	if(!$("#skill").val()) {
// 		$("#skill-info").html("(required)");
// 		$("#skill").css('background-color','#FFFFDF');
// 		valid = false;
// 	}	
// 	if(!$("#gender").val()) {
// 		$("#gender-info").html("(required)");
// 		$("#gender").css('background-color','#FFFFDF');
// 		valid = false;
// 	}	
// 	if(!$("#dept").val()) {
// 		$("#dept-info").html("(required)");
// 		$("#dept").css('background-color','#FFFFDF');
// 		valid = false;
// 	}	
// 	return valid;
// }
</script>
<form name="frmToy" method="post" action="" id="frmToy" onClick="return validate();">
<div id="mail-status"></div>
<div>
<label style="padding-top:20px;">Name</label>
<span id="name-info" class="info"></span>
<input type="text" name="name" id="name" class="demoInputBox" value="<?php echo $result[0]['name']; ?>">
</div>
<div>
<label>DOB</label>
<span id="dob-info" class="info"></span>
<input type="text" name="dob" id="dob" class="demoInputBox" value="<?php echo $result[0]['dob']; ?>">
</div>
<div>
<label>Education</label> 
<span id="education-info" class="info"></span>
<input type="radio" name="education" id="education"  value="graduated" <?php if($result[0]["education"] =='graduated'){ echo "checked";}?> >Graduated
		<input type="radio" name="education" value="postgraduated" <?php if($result[0]["education"] =='postgraduated'){ echo "checked";}?>>Post Graduated
</div>
<div>
<label>Skills</label> 
<span id="skill-info" class="info"></span>
<input type="checkbox" name="skill[]" id="skill" class="demoInputBox" value="PHP" <?php if(in_array("PHP",$b)){ echo "checked";}?> >PHP
<input type="checkbox" name="skill[]" id="skill" class="demoInputBox" value="Javascript" <?php if(in_array("Javascript",$b)){ echo "checked";}?> >Javascript
<input type="checkbox" name="skill[]" id="skill" class="demoInputBox" value="CSS" <?php if(in_array("CSS",$b)){ echo "checked";}?> >CSS
<input type="checkbox" name="skill[]" id="skill" class="demoInputBox" value="MySQL" <?php if(in_array("MySQL",$b)){ echo "checked";}?> >MySQL
</div>
<div>
<label>Gemder</label> 
<span id="gender-info" class="info"></span>
<input type="radio" name="gender" id="gender"  value="male" <?php if($result[0]["gender"] =='male'){ echo "checked";}?> >male
		<input type="radio" name="gender" value="femlae" <?php if($result[0]["gender"] =='female'){ echo "checked";}?>>female
</div>
<div>
<label>Department</label> 
<span id="department-info" class="info"></span>
<select name="department" id="department">
  		<option value="system" <?php if($result[0]['dept']=='system'){ echo "selected";}?>>System Team</option>
  		<option value="design" <?php if($result[0]['dept']=='design'){ echo "selected";}?>>Design Team</option>
  		<option value="photoshop" <?php if($result[0]['dept']=='photoshop'){ echo "selected";}?>>Photoshop Team</option>
  		<option value="autocad" <?php if($result[0]['dept']=='autocad'){ echo "selected";}?>>Autocad Team</option>
		</select>
</div>
<div>
<label style="padding-top:20px;">Address</label>
<span id="address-info" class="info"></span>
<textarea name="address" id="address"><?php echo $result[0]['address']?></textarea>
</div>
<div>
<div>
<input type="submit" name="submit" id="btnAddAction" value="Save" />
</div>
</div>