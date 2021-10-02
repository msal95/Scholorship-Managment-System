<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
 include_once 'include/db.php'; 
 ?>


<?php
 session_start(); 

  if (!isset($_SESSION['admin_id'])) {
  	header('location: login.php');
  }

  $selected_record=$_REQUEST['u_id'];
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
										<li class="active"><span>Documents</span></li>
									</ol>
									
									<h1>Documents</h1>
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box">
										<header class="main-box-header">
											<h2>Documents</h2>
										</header>
										
										<div class="main-box-body">
											<div id="gallery-photos-lightbox">
												<ul class="clearfix gallery-photos">
												
							<?php
								$images = mysqli_query($conn, "SELECT * from `documents` where u_id='$selected_record' ");
								while($r=mysqli_fetch_array($images)){
									$u_id = $r['u_id'];

								?>
													<li class="col-md-3 col-sm-3 col-xs-6">
														<a href="../documents/<?php echo $r['documents'];?>" class="photo-box image-link" style="background-image: url('../documents/<?php echo $r['documents'];?>');"></a>
													</li>
													<?php }
														if(!($images && $u_id)){
															echo "<h3>No Document Uploaded</h3>";
														}
													 ?>
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