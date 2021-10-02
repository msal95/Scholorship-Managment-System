
<?php include_once "include/db.php"; ?>
<?php 
 // session_start(); 

  // if (!isset($_SESSION['u_id'])) {
  	// header('location: account.php');
  // }
?>
<?php include_once "include/header.php"; ?>
	
	<!--Carrousel--->
	<div id="demo" class="carousel slide" data-ride="carousel">
	  <ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	  </ul>
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="images/b1.jpg" alt="Los Angeles" width="1100" height="500">  
		</div>
		<div class="carousel-item">
		  <img src="images/b4.jpg" alt="Chicago" width="1100" height="500">
		</div>
		<div class="carousel-item">
		  <img src="images/b3.jpg" alt="New York" width="1100" height="500"> 
		</div>
	  </div>
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>
	</div>
	<!-- details-->
	<div class="container-fluid bg-light-gray ">
	<div class="container pt-5">
			<div class="row">
				<h3>Latest Scholoships</h3>
			</div>
			<div class="underline"></div>
		</div>
		<div class="container mt-5">
		
			<div class="row">
				<?php 
					$sql = "SELECT * FROM scholarship WHERE s_date>=NOW() LIMIT 3";
					
					
					

					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res)){
				?>
				<div class="col-sm-4">
					<div class="card">
					  <div class="hovereffect">
								<img src="admin/<?php echo $row['s_image'];?>" style="height:17em" class="img-fluid card-img-top">
							<div class="overlay">
								<p>
									<a class="btn btn-default rounded-circle" data-toggle="tooltip" title="Quick View" style="border:2px dotted #fff; font-size:22px;" href="scholarship_details.php?s_id=<?php echo $row['s_id']; ?>"><b><i class="far fa-eye fa-2x"></i></b></a>
								</p>
							</div>
						</div>
						<div class="card-body">
				<h4><b><?php echo $row['s_name']; ?></b></h4>
						<h5>Last Date: <span class="text-danger"><?php echo $row['s_date']; ?></span></h5>
				<a class="btn btn-danger" type="button" href="scholarship_details.php?s_id=<?php echo $row['s_id']; ?>"> Details <i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="container pt-5">
			<div class="row">
				<div class="col-md-6">
					<h3>Objective</h3>
					<div class="underline"></div>
					<div class="container mt-3">
						<h5>This Objective of this web-based system,  is to provide online applications and awarding of different study scholarships. Different ongoing scholarships are advertised on website, which registered users (Student) can apply for. System validates the candidate eligibility, for whether they can apply for selected scholarship. After the submission of applications, scholarship committee scrutinizes the submitted applications, and awards the scholarships to most eligible candidates.</h5>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Youth Development</h3>
					<div class="underline"></div>
					<div class="container mt-3">
						<h5>Youth Development is a proactive scholarship scheme which provides funds at the doorstep of the telented and deserving students. After attaining education, all these students are supposed to indulge themeselves in practical life chores and so they also need to enhance their social skills side by side as well. To benefit high achievers, (Youth Development scholars) in developing inter personal and capacity building skills through different trainings, Youth Development initiated its training porgrammes from Youth Development Center (YDC) in October 2010.</h5>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 offset-md-4" style="margin-top: 20px,">
					<a class="btn btn-danger" type="button" href="scholorship.php"> See all Offered Scholorships <i class="fas fa-chevron-right"></i></a>
				</div>
			</div>
			
			
	</div>

	
	<?php include_once "include/footer.php"; ?>
	