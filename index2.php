 <?php
 session_start();
 $auth =isset($_SESSION['auth']);
 ?>

 <?php if ($auth) {?>
  <?php
  require_once("perpage.php");  
  require_once("config.php");
  $db_handle = new DBController();
  
  $name = "";
  $dept = "";
  
  $queryCondition = "";
  if(!empty($_POST["search"])) {
    foreach($_POST["search"] as $k=>$v){
      if(!empty($v)) {

        $queryCases = array("name","dept");
        if(in_array($k,$queryCases)) {
          if(!empty($queryCondition)) {
            $queryCondition .= " AND ";
          } else {
            $queryCondition .= " WHERE ";
          }
        }
        switch($k) {
          case "name":
          $name = $v;
          $queryCondition .= "name LIKE '" . $v . "%'";
          break;
          case "dept":
          $dept = $v;
          $queryCondition .= "dept LIKE '" . $v . "%'";
          break;
        }
      }
    }
  }
  $orderby = " ORDER BY id desc"; 
  $sql = "SELECT * FROM register " . $queryCondition;
  $href = 'index2.php';          

  $perPage = 2; 
  $page = 1;
  if(isset($_POST['page'])){
    $page = $_POST['page'];
    // echo($page);
    // exit();
  }
  $start = ($page-1)*$perPage;
  if($start < 0) $start = 0;

  $query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
  $result = $db_handle->runQuery($query);
  
  if(!empty($result)) {
    $result["perpage"] = showperpage($sql, $perPage, $href);
  }

  // var_dump($query);
  // exit();
  ?>
  <html>
  <head>
    <title>PHP CRUD with Search and Pagination</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <style>
      table,tr,th,td
      {
        border: 1px solid black;
      }
    </style>
  </head>
</head>
<body>
  <h2>PHP CRUD with Search and Pagination</h2>
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <div class="table-responsive" id="dynamic_content">
          <form action="index.php" method="post">
            <label for="uname" style="font-size: 20px; color: blue;">User Name:</label>
            <label  for="username" style="font-size: 20px; color: blue;"><?php echo $_SESSION['user']?></label>
            <a href="new.php" class="new" style="text-align: right; margin-left: 300px;">ADD NEW</a>
            <a href="logout.php" class="new" style="display: inline; text-align: right; margin-left: 30px;">LOG OUT</a><br>
          </form>
        </div>


        <div id="toys-grid">      
          <form name="frmSearch" method="post" action="index2.php">
            <div class="search-box">
              <p><input type="text" placeholder="Name" name="search[name]" class="demoInputBox" value="<?php echo $name; ?>"  /><br><br><input type="text" placeholder="Dept" name="search[dept]" class="demoInputBox" value="<?php echo $dept; ?>" /><br><br><input type="submit" name="go" class="btnSearch" value="Search"><input type="reset" class="btnSearch" value="Reset" onclick="window.location='index2.php'"></p>
            </div>

            <table cellpadding="10" cellspacing="1">
              <thead>
                <tr>
                  <th><strong>Name</strong></th>
                  <th><strong>DOB</strong></th>          
                  <th><strong>Education</strong></th>
                  <th><strong>Skills</strong></th>
                  <th><strong>Gender</strong></th>
                  <th><strong>Department</strong></th>
                  <th><strong>Address</strong></th>

                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($result)) {
                  foreach($result as $k=>$v) {
                    if(is_numeric($k)) {
                      ?>
                      <tr>
                        <td><?php echo $result[$k]["name"]; ?></td>
                        <td><?php echo $result[$k]["dob"]; ?></td>
                        <td><?php echo $result[$k]["education"]; ?></td>
                        <td><?php echo $result[$k]["skill"]; ?></td>
                        <td><?php echo $result[$k]["gender"]; ?></td> 
                        <td><?php echo $result[$k]["dept"]; ?></td> 
                        <td><?php echo $result[$k]["address"]; ?></td> 
                        <td>
                          <a class="btnEditAction" href="edit.php?id=<?php echo $result[$k]["id"]; ?>">Edit</a> <a class="btnDeleteAction" href="delete.php?action=delete&id=<?php echo $result[$k]["id"]; ?>" onClick="return confirm('are you sure you want to delete??');">Delete</a>
                        </td>
                      </tr>

                      <?php
                    }
                  }
                }?>
                <tbody>
                </table>
                <?php 
                if(isset($result["perpage"])) {
                  echo $result["perpage"];
                }
                ?>


              </form> 
            </div>
          </div>
        </div>
      </div> 
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