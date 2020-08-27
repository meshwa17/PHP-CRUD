<?php
require 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>ViewProfile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Book Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Books <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
     <!--  <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
  </div>
</nav>

<br><br>
<div class="card">
				<div class="card-body">
   <table class="table table-bordered table-hover table-striped" style="width: 400px;margin-left: 500px;">
    <?php 
 	
  $qry = "SELECT * FROM user_table";
  $rs=mysqli_query($conn,$qry);
  $row=mysqli_fetch_assoc($rs);
  	$user_id=$row['user_id'];
  ?>
  
  
   <!--    <tr>
    <td>id</td>
    <td><?php echo $row["user_id"];?></td>
  </tr>   -->
    <tr>
    <td>First Name</td>
    <td><?php echo $row["user_fn"];?></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><?php echo $row["user_ln"];?></td>
  </tr>

   <tr>
    <td>Email</td>
    <td><?php echo $row["user_email"];?></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><?php echo $row["user_password"];?></td>
  </tr>
  
   </table>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>