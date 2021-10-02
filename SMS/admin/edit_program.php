<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php include_once('include/db.php'); ?>


<?php
 session_start(); 

  if (!isset($_SESSION['admin_id'])) {
  	header('location: login.php');
  }
?>

<?php
$selected = $_REQUEST['prg_id'];

if(isset($_POST['submit'])){
	$prg_name=$_POST['prg_name'];
	$prg_desc=$_POST['prg_desc'];
		$query=mysqli_query($conn, "UPDATE `program` SET prg_name='$prg_name', prg_desc='$prg_desc' WHERE prg_id='$selected'") or die(mysqli_error());
	
		if($query === 1){
			$msg = 1;
			header("refresh:1 ; url=degree_program.php");
		}else{
			$msg = 0;
			header("refresh:1 ; url=degree_program.php");
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
										<li class="active"><span>Degree Programs</span></li>
									</ol>
									
									<h1>Degree Programs</h1>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix" style="min-height: 1020px;">
										<header class="main-box-header clearfix">
										</header>
										<div class="main-box-body clearfix">
							
										<?php 
											$query="SELECT * FROM `program` where prg_id='$selected'";
											$result=mysqli_query($conn, $query) or die(mysqli_error());
											$data=mysqli_fetch_array($result);
												$prg_name=$data['prg_name'];
												$prg_desc=$data['prg_desc'];
												$prg_id=$data['prg_id'];
											
										?>
											<form method="POST" action="" enctype="multipart/form-data">
														<?php 
				$msg = $_REQUEST['msg'];

				if($msg === 1){
					?>
				<center>
				<h2 class="alert alert-success">Job Is Uploaded !</h2>
				</center>
				<?php } if($msg === 0){
					 
				?>
				<center>
				<h2 class="alert alert-danger">PLZ Try Again !</h2>
				</center>
				<?php } ?>
											<!-- <h3><?php echo $prg_id; ?></h3> -->
												<div class="form-group">
													<input type="text" class="form-control" name="prg_name" placeholder="Program name.." value="<?php echo $prg_name; ?> ">
												</div>
												<div class="form-group">
													<textarea class="form-control ckeditor" name="prg_desc" id="exampleTextarea"><?php echo $prg_desc; ?> </textarea>
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