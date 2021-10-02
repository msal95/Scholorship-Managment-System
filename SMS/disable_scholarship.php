
<?php include_once "include/db.php"; ?>
<?php 
ob_start();
session_start();
?>
<?php include_once "include/header.php"; ?>


<div class="container">
	<h1 class="display-2 text-center">Scholorship Details</h1>
	<p class="text-center text-warning" style="font-size:16px;">Make Your Future Bright</p>
	<?php
		if(isset($_GET['s_id']) & !empty($_GET['s_id'])){
			$s_id = $_GET['s_id'];
			$prodsql = "SELECT * FROM scholarship WHERE s_id=$s_id";
			$prodres = mysqli_query($conn, $prodsql);
			$prodr = mysqli_fetch_assoc($prodres);
		}else{
			header('location: index.php');
		}
	?>
	<div class="row">
		<div class="col-md-6">
			<img src="admin/<?php echo $prodr['s_image']; ?>" class="img-fluid" style="height:500px;">
		</div>
		<div class="col-md-6">
			<h3><?php echo $prodr['s_name']; ?></h3><br>
			<h4>Last Date To Apply: <span style="color:orange;"><?php echo $prodr['s_date'];?></h4><br>
			<h4>Details: </h4>
			<p><?php echo $prodr['s_desc']; ?></p>
			</br>
			<div class="row">
				
			</div>
				
				
		</div>
	</div>
</div></br></br>
<div class="container">
	<h2 style="border-bottom:1px solid #666;">Related Scholorships</h2>
	<div class="row">
	<?php
		$query_rand=mysqli_query($conn, "SELECT * FROM scholarship WHERE s_date<NOW() ORDER BY rand() LIMIT 3");
		while($relr = mysqli_fetch_assoc($query_rand)){
	?>
		
				<div class="col-sm-4">
					<div class="card">
					  <div class="hovereffect">
								<img src="admin/<?php echo $relr['s_image'];?>" style="height:17em" class="img-fluid card-img-top">
							<div class="overlay">
								<p>
									<a class="btn btn-default rounded-circle" data-toggle="tooltip" title="Quick View" style="border:2px dotted #fff; font-size:22px;" href="disable_scholarship.php?s_id=<?php echo $relr['s_id']; ?>"><b><i class="far fa-eye fa-2x"></i></b></a>
								</p>
							</div>
						</div>
						<div class="card-body">
						<h4><b><?php echo $relr['s_name']; ?></b></h4>
						<h5>Last Date: <span class="text-danger"><?php echo $relr['s_date']; ?></span></h5>
				<a class="btn btn-danger" type="button" href="disable_scholarship.php?s_id=<?php echo $relr['s_id']; ?>"> Details <i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
		<?php } ?>
	</div>
</div>


<?php include_once "include/footer.php"; ?>