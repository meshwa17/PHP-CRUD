<?php
require "dbconnect.php";
var_dump($_POST);

if(isset($_POST['deletedata']))
{
			$id=$_POST['delete_id'];
			 $qry1="DELETE FROM `book_table` WHERE book_id=$id";

			echo $qry1;


			$rs1=mysqli_query($conn,$qry1);
			if($rs1)
			{
				echo "Deleted";
				header("location:index.php?msgdelete=DATA IS DELETED.");
				
			}
			else
			{
				echo "Error";
				header("location:index.php?msgdelete=DATA IS DELETED.");
			}
}
?>