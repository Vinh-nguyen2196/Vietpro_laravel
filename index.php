<?php
ob_start();
 include_once('config/connect.php'); 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/success.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
<script>
$(document).ready(function(){
	$('#mua-ngay').click(function(){
	$(this).submit();
})

})

</script>
</head>
<body>

<!--	Header	-->
<?php 
include_once('template/header/header.php');
include_once('template/home.php');
include_once('template/footer/footer.php');



 ?>
<!--	End Header	-->

<!--	Body	-->

<!--	End Body	-->


<!--	End Footer	-->













</body>
</html>
