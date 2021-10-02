<?php
	
	
	include "include/db.php";
	
	
	
		$selected_record = $_REQUEST['id'];
		
		
		mysqli_query($conn, "UPDATE `record` set status = '0' where r_id = '$selected_record'");
		
		
		header("location: record.php");
	
	
	
?>