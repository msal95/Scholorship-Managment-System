
<?php include_once "include/db.php"; ?>
<?php include_once "include/header.php"; ?>

 <div class="container-fluid">
  <div class="row">
    <nav class="col-sm-2 pl-4 fixed hover">
	<h3 class="border border-top-0 border-left-0">All Scholorships</h3>
      <ul class="nav flex-column ">
		<li class="nav-item">
			<a class="nav-link active" href="scholarships.php">Currently Open</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="closedScholorship.php">Closed Scholorship</a>
		</li>
      </ul>
    </nav>
	<div class="col-sm-10 mt-4">
	<h1 class="text-center">These Scholorships are Closed Now.</h1>
	<p class="text-center">Apply on the currently Available Scholorships.</p>
		<div class="row">
		<?php
		
		
		$page = $_GET['page'];
			if($page=='' || $page=='1'){
				$page1=0;
			}else{
				$page1=($page*8)-8;
			}
			
		
		
			$query_p=mysqli_query($conn, "SELECT * FROM `scholarship` WHERE s_date<NOW()  LIMIT $page1,8");
			do{
			$data_p=mysqli_fetch_array($query_p);
			if($data_p){
		?>
			
				<div class="col-sm-3">
					<div class="card">
					  <div class="hovereffect">
								<img src="admin/<?php echo $data_p['s_image'];?>" style="height:17em" class="img-fluid card-img-top">
							<div class="overlay">
								<p>
									<a class="btn btn-default rounded-circle" data-toggle="tooltip" title="Quick View" style="border:2px dotted #fff; font-size:22px;" href="disable_scholarship.php?s_id=<?php echo $data_p['s_id']; ?>"><b><i class="far fa-eye fa-2x"></i></b></a>
								</p>
							</div>
						</div>
						<div class="card-body">
				<h4><b><?php echo $data_p['s_name']; ?></b></h4>
						<h5>Last Date: <span class="text-danger"><?php echo $data_p['s_date']; ?></span></h5>
				<a class="btn btn-danger" type="button" href="disable_scholarship.php?s_id=<?php echo $data_p['s_id'];  ?>"> Details <i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
			<?php }} while($data_p); ?>
		</div>
	</div>
  </div>
  </br>
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-sm-4">
							<?php
								$query1="SELECT * FROM `scholarship`";
								$result1=mysqli_query($conn, $query1);
								$cou=mysqli_num_rows($result1);
								$a=($cou/6);
								$a=ceil($a);
							?>
							<ul class="pagination">
								<li class="page-item  <?php if($page <= 1){ echo 'disabled'; } ?>">
									<a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
								</li>
								<?php
									for($b=1; $b<=$a; $b++){
								?>
								
								<li class="page-item"><a class="page-link" href="closedScholorship.php?page=<?php echo $b; ?>" ><?php echo $b . " " ; ?> </a></li>
								
								<?php	} ?>
								
								<li class="page-item  <?php if($page >= $cou){ echo 'disabled'; } ?>">
									<a class="page-link" href="<?php if($page >= $cou){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
								</li>
							
							</ul>
					
						</div>
					</div>
				</div>
</div>
	
		<?php include_once "include/footer.php"; ?>