<?php 
ob_start();
define('SECURITY',true);
include_once('../config/connect.php');
$pro_id=$_GET['pro_id'];
$query=mysqli_query($connect,"DELETE FROM product
	WHERE prd_id = '$pro_id'");

header('location: index.php?template=product');

?>