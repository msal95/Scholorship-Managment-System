<?php

include 'include/db.php';

$selected_record=$_REQUEST['user_id'];

mysqli_query($conn, "DELETE FROM `user_details` where user_id='$selected_record' ");

header('location:user_detail.php');

?>