<?php
// $path="localhost";
// $user="root";
// $password=null;
// $database="tomdeals";
// $port=3306;


$path="localhost";
$user="root";
$password="";
$database="tomdeals";

$conn=mysqli_connect($path,$user,$password,$database);

if (!$conn){
	echo "database connection is not ok";
}

?>