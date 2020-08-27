<?php
session_start();
require 'dbconnect.php';
var_dump($_POST);
if(!isset($_POST['btn_sb']))
 {
 	header("location:login.php");
 	exit();
 }
$email=$_POST['txt_email'];
$ps=($_POST['txt_password']);

echo $email."<br>".$password;

$qry="SELECT * FROM user_table WHERE user_email='".$email."' AND user_password='".$ps."'";
echo $qry;
$rs=mysqli_query($conn,$qry);

if(mysqli_num_rows($rs)>0)
{   
	$row=mysqli_fetch_assoc($rs);
	$user_id=$row['user_id'];
	$fn=$row['user_fn'];
	$ln=$row['user_ln'];
	//$email=$row['user_email'];
	$password=$row['user_password'];
	// $usertype=$row['usertype'];
	$_SESSION["fn"]=$fn;
	$_SESSION["uid"]=$user_id;
	$_SESSION["email"]=$email;
	$_SESSION["password"]=$ps;
	echo($_SESSION["email"])."<br>";
	echo($_SESSION["password"])."<br>";
	echo($_SESSION["uid"])."<br>";
	echo $fn."<br>".$ln."<br>";

	if(isset($_POST['remember']))
	{		setcookie("email",$email,time()+(86400*30),"/");	
			setcookie("password",$ps,time()+(86400*30),"/");
	}
	echo("success");
	header("location:index.php?msgsuccess=user LOGIN SUCCESSFULLY!");
	exit();
}
else
{
	echo "invalid username or password";
	header("location:login.php?msgfail=INVALID Email OR PASSWORD!");
	exit();
}

?>