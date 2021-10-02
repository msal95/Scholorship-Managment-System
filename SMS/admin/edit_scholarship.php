<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php include_once('include/db.php'); ?>



<?php
 session_start(); 

  if (!isset($_SESSION['admin_id'])) {
  	header('location: login.php');
  }
?>


<?php
$selected = $_REQUEST['s_id'];

if(isset($_POST['submit'])){
	$s_name=$_POST['s_name'];
	$s_desc=$_POST['s_desc'];
		$query=mysqli_query($conn, "UPDATE `scholarship` SET s_name='$s_name', s_desc='$s_desc' WHERE s_id='$selected'") or die(mysqli_error());
	
		if($query ===1){
			$msg = "fail";
			header("refresh:1 ; url=edit_scholarship.php");
			
		}else{
			$msg = "ok";
			header("refresh:1 ; url=scholarship.php");
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
										<li class="active"><span>Update Scholorship</span></li>
									</ol>
									
									<h1>Update Scholorship</h1>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix" style="min-height: 1020px;">
										<header class="main-box-header clearfix">
										</header>
										<div class="main-box-body clearfix">
							
										<?php 
											$query="SELECT * FROM `scholarship` where s_id='$selected'";
											$result=mysqli_query($conn, $query) or die(mysqli_error());
											$data=mysqli_fetch_array($result);
												$s_name=$data['s_name'];
												$s_desc=$data['s_desc'];
												$s_id=$data['s_id'];
											
										?>
											<form method="POST" action="" enctype="multipart/form-data">
														<?php 
				$msg = $_REQUEST['msg'];

				if($msg == 'ok'){
					?>
				<center>
				<h2 class="alert alert-success">Scholorship Updated Successfully !</h2>
				</center>
				<?php } if($msg == 'fail'){
					
					 
				?>
				<center>
				<h2 class="alert alert-danger">PLZ Try Again !</h2>
				</center>
				<?php } ?>
											<!-- <h3><?php echo $s_id; ?></h3> -->
												<div class="form-group">
													<input type="text" class="form-control" name="s_name" placeholder="cat name.." value="<?php echo $s_name; ?> ">
												</div>
												<div class="form-group">
													<textarea class="form-control ckeditor" name="s_desc" id="exampleTextarea"><?php echo $s_desc; ?> </textarea>
												</div>
												<div class="form-group">
													<button type="submit" class="pull-right btn btn-primary" id="exampleTextarea" name="submit">Update</button>
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