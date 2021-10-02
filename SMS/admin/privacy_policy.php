

<?php include 'include/db.php'; ?>



<?php
 session_start(); 

  if (!isset($_SESSION['admin_id'])) {
  	header('location: login.php');
  }
?>


<?php
	$query="SELECT * FROM `privacy_policy` where privacy_id=1" ;
$result=mysqli_query($conn, $query);
$data=mysqli_fetch_array($result);
	$description=$data['description'];

if(isset($_POST['submit'])){
	$description=$_POST['description'];
}

   $query_up=mysqli_query("UPDATE `privacy_policy` set description='$description', timestamp=NOW()  where privacy_id = 1 ") or die(mysqli_error());
   

   

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
										<li class="active"><span>Terms and Condition</span></li>
									</ol>
									
									<h1>Terms and Condition</h1>
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
													<textarea class="form-control ckeditor" name="description" value="<?php echo $description; ?>" id="exampleTextarea" ><?php echo $description; ?> </textarea>
												</div>
												
												<div class="form-group">
													<button type="submit" class="pull-right btn btn-primary" id="exampleTextarea" name="submit" value="Update">Update</button>
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