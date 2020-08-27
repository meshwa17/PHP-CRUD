<?php
session_start();
require 'dbconnect.php';
var_dump($_SESSION);
if(!isset($_POST['insertdata']))
{
	header("location:index.php");
}
var_dump($_POST);

if(isset($_POST['insertdata']))
{
	$uid=$_SESSION['uid'];
	echo($uid);
	$title=$_POST['title'];
	$publication_date=$_POST['publication'];
	$author=$_POST['author'];
	$price=$_POST['price'];
	$page=$_POST['page'];
	$book_type=$_POST['book_type'];
	echo $title."<br>".$publication_date."<br>".$author."<br>".$price."<br>".$page."<br>".$book_type;

		$save="INSERT INTO `book_table`(`user_id`,`Title`, `Publication_Date`, `Author`, `Price`, `Pages`, `Book_Type`) VALUES ('".$uid."','".$title."','".$publication_date."','".$author."','".$price."','".$page."','".$book_type."')";
		echo $save;
		$rs=mysqli_query($conn,$save);
		if($rs)
		{
			echo '<script>alert("Data Saved")</script>';
			header("location:index.php");
			exit();
		}
		else
		{
			echo '<script>alert("Data Not Saved")</script>';
			header("location:index.php");
		}
}
?>