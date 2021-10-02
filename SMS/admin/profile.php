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
										<li class="active"><span>Student Profile</span></li>
									</ol>
									
									<h1>Student Profile</h1>
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box">
										<div class="row">
											<div class="col-md-8  col-md-offset-2">

										<div class="table-responsive">
											
											<form method="POST" action="" enctype="multipart/form-data">
						<?php
														$result=mysqli_query($conn, "SELECT * FROM `user` where u_id='$selected_record' ");
														 
														if (mysqli_num_rows($result) > 0) {
															while ($row = mysqli_fetch_array($result)) {
																$user_id = $row['u_id'];
															
														
													?>
													<?php 
														$user_data=mysqli_query($conn, "SELECT * FROM `record` WHERE u_id='$user_id'  order by u_id DESC LIMIT 1");
														$record = mysqli_fetch_array($user_data)
													?>
													<div class="col-md-4  col-md-offset-5">
												<img src="../<?php echo $row['p_image']; ?>" style="width: 150px; height:150px; border-radius: 75px;">
											</div>
						<h1 style="border-bottom: 1px solid black;">Student Personal Details</h1>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputCity">First Name</label>
							  <input type="text" class="form-control" disabled value="<?php echo $row['first_name']; ?>" required>
							</div>
							<div class="form-group col-md-6">
							  <label for="inputState">Last Name</label>
							  <input type="text" class="form-control"   disabled  value="<?php echo $row['last_name']; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" value="<?php echo $row['u_email']; ?>"  disabled readonly>
						</div>
						<div class="form-group">
							<label for="inputAddress">Address</label>
							<input type="text" class="form-control"  disabled value="<?php echo $record['address']; ?>" required>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputCity">City</label>
							  <input type="text" class="form-control"  disabled value="<?php echo $record['city']; ?>" required>
							</div>
							<div class="form-group col-md-6">
							    <label for="mobile">Mobile No.</label>
						  		<input type="text"  disabled value="<?php echo $record['mobile']; ?>" class="form-control"  required>
							</div>
						</div><br>
						<h1 style="border-bottom: 1px solid black;">Education Details</h1>
						<div class="form-row">
							<div class="form-group  col-md-4">
								<label for="email">Degree Program</label>
								<input type="text" class="form-control" disabled value="<?php echo $record['program']; ?>" required>
							</div>
							<div class="form-group  col-md-4">
								<label for="payment">Semester</label>
								<input type="text" class="form-control" disabled value="<?php echo $record['semester']; ?>" required>
							</div>
							<div class="form-group  col-md-4">
								<label for="inputAddress">CGPA</label>
								<input type="text" class="form-control" disabled  value="<?php echo $record['cgpa']; ?>" required>
							</div>
						</div>
						<br>
						<h1 style="border-bottom: 1px solid black;">Financial Details</h1>
						<div class="form-row">
							<div class="form-group  col-md-6">
								<label for="email">Father Occupation</label>
								<input type="text" class="form-control" disabled value="<?php echo $record['f_occupation']; ?>" required>
							</div>
							<div class="form-group  col-md-6">
								<label for="payment">Father Monthly Income</label>
								<input type="text" class="form-control" disabled value="<?php echo $record['f_income']; ?>" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group  col-md-6">
								<label for="email">Personal Income</label>
								<input type="text" class="form-control" disabled value="<?php echo $record['p_income']; ?>" required>
							</div>
							<div class="form-group  col-md-6">
								<label for="payment">Number of Income Sources</label>
								<input type="number" class="form-control" disabled value="<?php echo $record['num_source']; ?>"required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group  col-md-6">
								<label for="email">Total Family Members</label>
								<input type="text" class="form-control" disabled value="<?php echo $record['t_member']; ?>" required>
							</div>
							<div class="form-group  col-md-6">
								<label for="payment">Total Monthly Expenses</label>
								<input type="text" class="form-control" disabled  value="<?php echo $record['m_expenses']; ?>" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group  col-md-6">
								<label for="email">Total Monthly Earning</label>
								<input type="text" class="form-control" disabled value="<?php echo $record['t_mon_earning']; ?>" required>
							</div>
							<div class="form-group  col-md-6">
								<label for="payment">Total Monthly Savings</label>
								<input type="text" class="form-control" disabled value="<?php echo $record['t_savings']; ?>" required>
							</div>
						</div>
						<?php  }}  ?>
					</form>
										</div>
										<h1 style="border-bottom: 1px solid black;">Documents</h1>
										
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