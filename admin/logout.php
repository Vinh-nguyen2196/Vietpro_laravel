<?php 
session_start();
if(isset($_SESSION['tai_khoan']) && isset($_SESSION['mat_khau'])){
	session_destroy();
 	header('location: index.php');

 }
 ?>