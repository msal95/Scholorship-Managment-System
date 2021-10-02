<?php

include_once('include/db.php');
$selected_record=$_REQUEST['prg_id'];

$query=mysqli_query($conn, "DELETE FROM `program` Where prg_id='$selected_record' ") or die(mysql_error());

	header('refresh:1, url=degree_program.php');


?>