<?php


//file index check quyền admin:nếu có tài khoản và mật khẩu thì ms cho vào
 session_start();
 define('SECURITY',true);
 include_once('../config/connect.php');
 if(isset($_SESSION['tai_khoan']) && isset($_SESSION['mat_khau'])){
 	include_once('admin.php');
 }
 else{
 	include_once('login.php');
 }

 ?>