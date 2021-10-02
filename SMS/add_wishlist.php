<?php
ob_start();
session_start();
include_once 'include/db.php';
$u_id = $_SESSION['u_id'];
if(!isset($_SESSION['u_id']) & empty($_SESSION['u_id'])){
		header('location: account.php');
	}
if(isset($_GET['s_id']) & !empty($_GET['s_id'])){
	$s_id = $_GET['s_id'];
	echo $sql = "INSERT INTO `wishlist` SET s_id='$s_id', u_id='$u_id', timestamp=NOW()";
	$res = mysqli_query($conn, $sql) or die(mysqli_error($sql));
	if($res){
		header('location: mywish_list.php');
		//echo "redirect to wish list page";
	}
}else{
	echo "There  Is An Error In The File";
}

?>