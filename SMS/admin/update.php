<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php include 'include/db.php'; ?>

<?php
$selected = $_REQUEST['g_id'];
$target_dir = "images/";
$target_file = $target_dir . basename(rand(1, 999).rand(1000,9999 ).rand(1, 999)."_".$_FILES["g_photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST['submit'])){
}
// Check file size
if ($_FILES["g_photo"]["size"] > 5000000000000) {
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
    if (move_uploaded_file($_FILES["g_photo"]["tmp_name"], $target_file)) {
   $query="UPDATE `gallery` set g_photo = '$target_file' where g_id = '$selected' ";
   
	header("refresh: 1; url=edit_gallery.php");

		
	mysqli_query($conn, $query) or die(mysqli_error());
    } else {
         }
}

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
										<li class="active"><span>Update Photo<span></li>
									</ol>
									
									<h1>Update Photo</h1>
								</div>
							</div>
														
							<?php
								$query="SELECT * FROM `gallery` where g_id='$selected' ";
									$result=mysqli_query($conn, $query);
									do{
										$data=mysqli_fetch_array($result);
										if($data){
											$photo = $data['g_photo'];
								?>
													
									<img src="<?php echo $photo; ?>" width="150px">
									<?php }} while($data); ?>
							<div class="row">
								<div class="col-lg-12">
								<form class="form-inline" method="POST" enctype="multipart/form-data">
									<label for="photo" style="font-size:20px;">Upload File</label>
									<input type="file" class="form-control" name="g_photo">
									<button class="btn btn-danger" type="submit" name="submit">Update</button>
								</form>
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