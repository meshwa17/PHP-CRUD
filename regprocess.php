<?php
require 'dbconnect.php';
//var_dump($_POST);
 if(!isset($_POST["btn_sb"]))
 {
 	echo "direct url called";
 	header("location:registration.php");
 	exit();
 }

$fn=$_POST["fname"];
$ln=$_POST["lname"];
$email=$_POST["email"];
$password=$_POST["password"];
// $usertype=$_POST["usertype"];
echo $fn."<br>".$ln."<br>".$email."<br>".$password."<br>";


$qry="INSERT INTO user_table(`user_fn`, `user_ln`, `user_email`, `user_password`) VALUES ('".$fn."','".$ln."','".$email."','".$password."')";


echo $qry;
$rs=mysqli_query($conn,$qry);

if($rs)
{
	echo "Insert Success!";
	header("location:login.php?msg=Success registration");
}
else
{
	echo "Insert Error!";
	header("location:login.php?msg=UnSuccess registration");
}


?>