<?php
$servername="localhost";
$username="root";
$password="";

$dbname="axis_project";

//create connection
$conn=mysqli_connect($servername,$username,$password);

//check connection
if(!$conn)
{
	die("Connection failed: ". mysqli_connect_error());
}
//echo "Connected Successfully! ";

$db=mysqli_select_db($conn,$dbname);

if($db)
{
	//echo "Database Selected!";
}
else
{
	echo "Database not Selected!";
}
?>