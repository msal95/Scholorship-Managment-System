<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
 include_once 'include/db.php'; 
 ?>


<?php
 session_start(); 

  if (!isset($_SESSION['admin_id'])) {
  	header('location: login.php');
  }
?>
 
<?php
$target_dir="images/";
$target_file=$target_dir . basename(rand(1,999) . rand(1000,9999) . rand(1,999) . "_" . $_FILES["g_photo"]["name"]);
$uploadok=1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST['submit']))
{
}
// Check File Size
if($_FILES["g_photo"]["size"]>50000000){
	$uploadok=0;
}
// allow certain files formates
if($imageFileType !="jpg" && $imageFileType !="jpeg" && $imageFileType !="gif" && imageFileType !="png"){
	$uploadok=0;
}
// check if $uploadok isset to 0 by an error
if($uploadok==0){
	
}else{
	if(move_uploaded_file($_FILES["g_photo"]["tmp_name"], $target_file)){
			$query="INSERT INTO `gallery` set  g_photo='$target_file', g_date=NOW() ";
		mysqli_query($conn, $query) or die(mysqli_error());
	}else{
	}
}
?>
 
 

<?php include_once('include/header_script.php'); ?>


	<div id="theme-wrapper">
		
		<?php include_once('include/header.php')?>
		
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
										<li class="active"><span>Gallery</span></li>
									</ol>
									
									<h1>Gallery</h1>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
								<form class="form-inline" method="POST" enctype="multipart/form-data">
									<label for="photo" style="font-size:20px;">Upload File</label>
									<input type="date"  name="g_date" hidden >
									<input type="file" class="form-control" name="g_photo">
									<button class="btn btn-danger" type="submit" name="submit">Submit</button>
								</form>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box">
										<header class="main-box-header">
											<h2>Images with Lightbox</h2>
										</header>
										
										<div class="main-box-body">
											<div id="gallery-photos-lightbox">
												<ul class="clearfix gallery-photos">
												
							<?php
								$query="SELECT * FROM `gallery` ";
									$result=mysqli_query($conn, $query);
									do{
										$data=mysqli_fetch_array($result);
										if($data){
											$photo = $data['g_photo'];
								?>
													<li class="col-md-3 col-sm-3 col-xs-6">
														<a href="<?php echo $photo;?>" class="photo-box image-link" style="background-image: url('<?php echo $photo;?>');"></a>
													</li>
													<?php }} while($data); ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?php include_once('include/footer.php'); ?>
					
				</div>
			</div>
		</div>
	</div>
	
	<!-- global scripts -->
	<script src="js/demo-skin-changer.js"></script> <!-- only for demo -->
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.nanoscroller.min.js"></script>
	
	<script src="js/demo.js"></script> <!-- only for demo -->
	
	<!-- this page specific scripts -->
	<script src="js/jquery-ui.custom.min.js"></script>
	<script src="js/dropzone.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	
	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	<script src="js/pace.min.js"></script>
	
	<!-- this page specific inline scripts -->
	<script>
	$(function() {
		$('ul#gallery-photos').sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable('serialize'); 
			$.post('/gallery-sortimages.html', order, function(theResponse){
		
			}); 															 
		}								  
		});
		
		$(document).ready(function() {
			$('#gallery-photos-lightbox').magnificPopup({
				type: 'image',
				delegate: 'a',
				gallery: {
					enabled: true
			    }
			});
		});
	});
	</script>
	
</body>
</html>