<?php
session_start();
require 'dbconnect.php';
var_dump($_POST);

if(isset($_POST['updatedata']))
{
	$id=$_POST['update_id'];
	$title=$_POST['title'];
	$publication_date=$_POST['publication'];
	$author=$_POST['author'];
	$price=$_POST['price'];
	$page=$_POST['page'];
	$book_type=$_POST['book_type'];
	echo $title."<br>".$publication_date."<br>".$author."<br>".$price."<br>".$page."<br>".$book_type;

		$save="UPDATE `book_table` SET user_id='".$_SESSION['uid']."',`Title`='".$title."',`Publication_Date`='".$publication_date."',`Author`='".$author."',`Price`='".$price."',`Pages`='".$page."',`Book_Type`='".$book_type."' WHERE `book_id`='".$id."'";
		echo $save;
		$rs=mysqli_query($conn,$save);
		if($rs)
		{
			echo '<script>alert("Data Updated")</script>';
			header("location:index.php?msg=Updated");
			exit();
		}
		else
		{
			echo '<script>alert("Data Not Updated")</script>';
			header("location:index.php");
		}
}

?>