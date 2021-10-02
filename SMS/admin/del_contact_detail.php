<?php

include 'include/db.php';

$selected_record=$_REQUEST['contact_id'];

mysqli_query($conn, "DELETE FROM `contact` where contact_id='$selected_record' ");

header('location:contact_detail.php');

?>