<?php 
ob_start();
define('SECURITY',true);
include_once('../config/connect.php');
$user_id=$_GET['user_id'];
$query=mysqli_query($connect,"DELETE FROM user
	WHERE user_id = '$user_id'");

header('location: index.php?template=user');

?>