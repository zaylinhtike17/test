<!DOCTYPE html>
<html>
<head>
	<title>Pagination</title>
</head>
<body>
	<?php
		include("config.php");
		$result_per_page = 5;
		$sql="SELECT * FROM register";
		$result=mysqli_query($conn,$sql);
		$number_of_result=mysqli_num_rows($result);
		
		$number_of_pages = ceil($number_of_result/$result_per_page);
		if(!isset($_GET['page'])){
			$page= 1;
		}
		else{
			$page =$_GET['page'];
		}
		$page_first_result =($page-1)*$result_per_page;

		$sql = "SELECT * FROM register LIMIT " . $page_first_result . ",". $result_per_page;
		$result = mysqli_query($conn, $sql);
		while($row =mysqli_fetch_array($result)){
			 echo $row['id'].' '. $row['name'] .'<br>';
		}
		for($page=1;$page<=$number_of_pages;$page++){
			echo '<a href ="test.php?page='. $page. '">'.$page. "</a>";
		}
	?>
</body>
</html>