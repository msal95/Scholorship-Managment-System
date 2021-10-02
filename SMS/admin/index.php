<?php 
include 'include/db.php';
?>
<?php
 session_start(); 

  if (!isset($_SESSION['admin_id'])) {
  	header('location: login.php');
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
										<li class="active"><span>Dashboard</span></li>
									</ol>
									
									<h1>Dashboard</h1>
								</div>
							</div>
							
							<div class="row">
								<?php
									$result_q=mysqli_query($conn, "SELECT count(*) as totala from record");
									$data_q=mysqli_fetch_assoc($result_q);
									
								?>	
								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="main-box infographic-box">
										<i class="fa fa-user red-bg"></i>
										<span class="headline">Users</span>
										<span class="value">
											<span class="timer" data-from="120" data-to="2562" data-speed="1000" data-refresh-interval="50">
												<?php echo $data_q['totala'];?>
											</span>
										</span>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-xs-12">
								<?php
									$result_query=mysqli_query($conn, "SELECT count(status) AS final FROM `record` Where status= 1");
									$data_query=mysqli_fetch_assoc($result_query); 
								?>	
									<div class="main-box infographic-box">
										<i class="fa fa-check-square-o green-bg" aria-hidden="true"></i>
										<span class="headline">Approved </span>
										<span class="value">
											<span class="timer" data-from="30" data-to="658" data-speed="800" data-refresh-interval="30">
												<?php echo $data_query['final']; ?>
											</span>
										</span>
									</div>
								</div>
								<?php
									$result_query=mysqli_query($conn, "SELECT count(status) AS Cancel FROM `record` Where status= 2");
									$data_query=mysqli_fetch_assoc($result_query); 
								?>	
								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="main-box infographic-box">
										<i class="fa fa-times red-bg" aria-hidden="true"></i>
										<span class="headline">Rejected</span>
										<span class="value">
											<span class="timer" data-from="83" data-to="8400" data-speed="900" data-refresh-interval="60">
												<?php echo $data_query['Cancel']; ?>
											</span>
										</span>
									</div>
								</div>
								<?php
									$result_query=mysqli_query($conn, "SELECT count(*) AS totalApp FROM `record` ");
									$data_query=mysqli_fetch_assoc($result_query); 
								?>
								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="main-box infographic-box">
										<i class="fa fa-eye yellow-bg"></i>
										<span class="headline">Total Applications</span>
										<span class="value">
											<span class="timer" data-from="539" data-to="12526" data-speed="1100">
												<?php echo $data_query['totalApp']; ?>
											</span>
										</span>
									</div>
								</div>
							</div>
							
							
								<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix">
										<header class="main-box-header clearfix">
											<h2 class="pull-left">Last Record</h2>
											
										</header>
										
										<div class="main-box-body clearfix">
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th class="text-center">#</th>
															<th class="text-center">Student Name</th>
															<th class="text-center">Scholorship</th>
															<th class="text-center">Semester</th>
															<th class="text-center">CGPA</th>
															<th class="text-center">Status</th>
															<th class="text-center">Date</th>
														</tr>
													</thead>
													<tbody>
<?php

	

	$query=mysqli_query($conn, "SELECT * FROM `record` ORDER BY r_id DESC  LIMIT 6");
	do{
		$row=mysqli_fetch_array($query);
	if($row){
		$r_id=$row['r_id'];
		$u_id=$row['u_id'];
		$s_id=$row['s_id'];
		$status=$row['status'];
?> 
<?php
		$sch_sql = "SELECT * FROM `scholarship` WHERE s_id='$s_id'";
		$sch = mysqli_query($conn, $sch_sql);
		$sch_result = mysqli_fetch_assoc($sch);
		
 ?> 
														<tr>
															<td class="text-center">
																<?php echo $r_id; ?>
															</td>
															<td class="text-center">
																<?php echo $row['f_name']." ". $row['l_name']; ?>
															</td>
															<td class="text-center">
																<?php echo $sch_result['s_name']; ?>
															</td>
															<td class="text-center">
																<?php echo $row['semester']; ?>
															</td>
															<td class="text-right">
																<?php echo $row['cgpa']; ?>
															</td>
															<td class="text-center">
																<?php 
																	if($status == 0){
																		echo "Pending";
																	}else if($status == 1){
																		echo "Complete";
																	}else{
																		echo "Cancell";
																	}
																 ?>
															</td>
															<td class="text-center">
																<?php echo $row['timestamp']; ?>
															</td>
															<td class="text-right">
																<a style="color:#ff0011" href="del_record.php?r_id=<?php echo $row['r_id']; ?>"><i class="fa fa-2x fa-trash-o"></i></a>
															</td>
														</tr>
														
	<?php }} while($row); ?>
													</tbody>
												</table>
											</div>
										
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