<?php

include 'include/db.php';

$selected_record=$_REQUEST['u_id'];

mysqli_query($conn, "DELETE FROM `user` where u_id='$selected_record' ");

header('location:reg_user.php');

?>