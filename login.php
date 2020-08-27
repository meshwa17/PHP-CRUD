<?php
require 'dbconnect.php';
if(isset($_COOKIE['email']))
{
  $email=$_COOKIE['email'];
  $password=$_COOKIE['password'];
  
}
else
{
  $email="";
  $password="";
}

?>

<!DOCTYPE html>
<html>
<title>Login</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;width: 500px;margin-left: 400px;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;

}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<center><h2>Login Form</h2></center>

<form action="checkedlogin.php" name="login" method="post">
 <!--  <div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
  </div> -->

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="txt_email" value="<?php echo $email;?>"  required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="txt_password" value="<?php echo $password;?>" required>
        
    <button type="submit" name="btn_sb">Login</button>
    <label>
      <input type="checkbox" name="remember" id="remember_me"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
  <div class="pull-center container" style="background-color:#f1f1f1">
      <center><a href="registration.php">Create a new Account</a></center>
  </div>
</form>

</body>
</html>
