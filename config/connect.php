<?php 
$connect=mysqli_connect('localhost','root','','dien_thoai_173');
if($connect){
	mysqli_query($connect,"SET NAMES 'UTF8'");
	
}
else{
	echo $erro;
}


 ?>
