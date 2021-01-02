<?php 
	include('connect.php') ;
	if(isset($_GET['them']))
		include('them.php');
	else
		include('dsbenhnhan.php');
?>

