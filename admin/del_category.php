<?php 
define('SECURITY',true);
include_once('../config/connect.php');
$cat_id=$_GET['cat_id'];
$query=mysqli_query($connect,"DELETE FROM category
	WHERE cat_id = '$cat_id'");

header('location: index.php?template=category');

?>