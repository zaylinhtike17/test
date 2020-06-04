 <?php
    session_start();
    $auth =isset($_SESSION['auth']);
?>
<?php
include("config.php");
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `register` WHERE CONCAT(`name`, `dob`, `education`,`skill`,`gender`,`department`, `address`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `register`";
    $search_result = filterTable($query);

}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "crud");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<?php if ($auth) {?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="index.php" method="post">
            <label for="uname">User Name:</label>
            <?php echo $_SESSION['user']?>
            <a href="new.php" class="new" style="text-align: right; margin-left: 300px;">ADD NEW</a>
            <a href="logout.php" class="new" style="display: inline; text-align: right; margin-left: 30px;">LOG OUT</a><br><br>
            <input type="text" name="valueToSearch" placeholder="search">
            <input type="submit" name="search" value="Filter">
            
			<br><br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>DoB</th>
                    <th>Education</th>
                    <th>Skill</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Address</th>
                    <th></th>
                    <th></th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['education'];?></td>
                    <td><?php echo $row['skill'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['dept'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <th>[<a href="delete.php?id=<?php echo $row['id']?>" class="delete">Delete</a>]</th>
                    <th>[<a href="edit.php?id=<?php echo $row['id']?>">Edit</a>]</th>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
<?php } else {?>
<h1>Login</h1>
<form action="login.php" method="post">
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="login">
    <button><a href="register.php" style="text-decoration: none;">Register</a></button>
</form> 
<?php } ?>