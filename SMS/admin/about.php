<?php error_reporting (E_ALL ^ E_NOTICE); ?>


<?php include 'include/db.php'; ?>



<?php
 session_start(); 

  if (!isset($_SESSION['admin_id'])) {
  	header('location: login.php');
  }
?>


<?php
$target_dir = "images/";
$target_file = $target_dir . basename(rand(1, 999).rand(1000,9999 ).rand(1, 999)."_".$_FILES["about_img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$query="SELECT * FROM `about` where about_id=1" or die(mysqli_error()) ;
$result=mysqli_query($conn, $query);
$data=mysqli_fetch_array($result);
	$about_img=$data['about_img'];
	$heading=$data['heading'];
	$about_name=$data['about_name'];
	$description=$data['description'];
	$ceo_msg=$data['ceo_msg'];
if(isset($_POST['submit'])){
	$description=$_POST['description'];
	$ceo_msg=$_POST['ceo_msg'];
	$heading=$_POST['heading'];
	$about_name=$_POST['about_name'];
}
// Check file size
if ($_FILES["about_img"]["size"] > 5000000000000) {
   $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif"   && $imageFileType != "rtf" ) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["about_img"]["tmp_name"], $target_file)) {
   $query="UPDATE `about` set description='$description', ceo_msg='$ceo_msg', heading='$heading', about_name='$about_name', about_img = '$target_file' where about_id = 1 ";
   
	header("refresh: 1; url=about.php");

		
	mysqli_query($conn, $query) or die(mysqli_error());
    } else {
         }
}

?>

<?php

// if(isset($_POST["submit"])){
// $filename = $_FILES['img']['name'];
// $file_tmp = $_FILES['img']['tmp_name'];
// $filetype = $_FILES['img']['type'];
// $filesize = $_FILES['img']['size'];
// for($i=0; $i<=count($file_tmp); $i++){
// if(!empty($file_tmp[$i])){
// $name = addslashes($filename[$i]);
// $temp = addslashes(file_get_contents($file_tmp[$i]));
// if(mysqli_query("UPDATE `about`(name,image) values('$name','$temp') where about_id=1 ")){
// }
// else{
// echo "failed";
// echo "<br />";
// }
// }
// }
// }


 ?>


<?php include_once('include/header_script.php'); ?>

	<div id="theme-wrapper">
		
		<?php include_once('include/header.php'); ?>
		
		<div id="page-wrapper" class="container">
			<div class="row">
			
				<?php include_once('include/sidebar.php'); ?>
				
				<div id="content-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<ol class="breadcrumb">
										<li><a href="#">Home</a></li>
										<li class="active"><span>About Us</span></li>
									</ol>
									
									<h1>About Us</h1>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix" style="min-height: 1020px;">
										<header class="main-box-header clearfix">
										</header>
										<div class="main-box-body clearfix">
											<form method="POST" action="" enctype="multipart/form-data">
												<div class="form-group">
													<textarea class="form-control ckeditor" name="description" id="exampleTextarea" ><?php echo $description; ?> </textarea>
												</div>
												<div class="form-group">
													<textarea class="form-control ckeditor" name="ceo_msg" id="exampleTextarea"><?php echo $ceo_msg; ?> </textarea>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" name="about_name" value="<?php echo $about_name; ?>">
												</div>
												<div class="form-group">
													<input type="text" class="form-control" name="heading" style="text-transform: uppercase " value="<?php echo $heading; ?>">
												</div>
												<div class="form-group">
													<input type="file" class="form-control" name="about_img" multiple>
													<img src="<?php echo $about_img; ?>" width="100px">
												</div>
												<div class="form-group">
													<input type="submit" class="pull-right btn btn-primary" id="exampleTextarea" name="submit" value="Update">Update</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<?php include_once ('include/footer.php'); ?>
					
				</div>
			</div>
		</div>
	</div>
	
	
	<?php include_once('include/scripts.php'); ?>