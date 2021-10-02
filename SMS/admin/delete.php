<?php

include 'include/db.php';

$selected_record=$_REQUEST['g_id'];

mysqli_query($conn, "DELETE FROM `gallery` where g_id='$selected_record' ");

header('refresh:1; url=edit_gallery.php');

?>