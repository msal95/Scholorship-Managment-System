<?php
	include "include/db.php";
	$selected_record=$_REQUEST['s_id'];
	
	$query=mysqli_query($conn, "DELETE FROM `wishlist` where s_id='$selected_record'");
	header('location:mywish_list.php');
?>