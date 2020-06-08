 <?php
    session_start();
    $auth =isset($_SESSION['auth']);
    include("config.php");
?>

<?php if ($auth) {?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>

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
    <body>
        <form action="index.php" method="post">
            <label for="uname" style="font-size: 20px; color: blue;">User Name:</label>
            <label  for="username" style="font-size: 20px; color: blue;"><?php echo $_SESSION['user']?></label>
            <a href="new.php" class="new" style="text-align: right; margin-left: 300px;">ADD NEW</a>
            <a href="logout.php" class="new" style="display: inline; text-align: right; margin-left: 30px;">LOG OUT</a><br><br>
        <div class="card">
        
        <div class="card-body">
          <div class="form-group">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
          </div>
          <div class="table-responsive" id="dynamic_content">
            
          </div>
        </div>
      </div>
    </body>
</html>
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>
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