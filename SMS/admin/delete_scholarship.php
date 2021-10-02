<?php
	include "include/db.php";
	$selected_record=$_REQUEST['s_id'];
	
	$query=mysqli_query($conn, "DELETE FROM `scholarship` where s_id='$selected_record'");
	header('refresh:1; url = scholarship.php');
?>