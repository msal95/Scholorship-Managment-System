<?php

include 'include/db.php';

$selected_record=$_REQUEST['r_id'];

mysqli_query($conn, "DELETE FROM `record` where r_id='$selected_record' ");

header('location:record.php');

?>