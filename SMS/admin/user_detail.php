<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php include 'include/db.php'; ?>



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
				<div id="content-wrapper"><div class="row">
						<div class="col-lg-12">
							
							<div class="row">
								<div class="col-lg-12">
									<ol class="breadcrumb">
										<li><a href="#">Home</a></li>
										<li class="active"><span>Users</span></li>
									</ol>
									
									<div class="clearfix">
										<h1 class="pull-left">Users</h1>
										
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box no-header clearfix">
										<div class="main-box-body clearfix">
											<div class="table-responsive">
												<table class="table user-list table-hover">
													<thead>
														<tr>
															<th>User ID</th>
															<th>User Name</th>
															<th>Email</th>
															<th>Mobile No.</th>
															<th>City</th>
															<th>Address</th>
															<th>Father Occupation</th>
															<th>Father Income(monthly)</th>
															<th>Personal Income</th>
															<th>Monthly Earning</th>
															<th>Monthly Expenses</th>
															<th>Monthly Savings</th>
															<th>Total Family Members</th>
															<th>View Profile</th>
															<th>Register Date</th>
															<th>&nbsp;</th>
														</tr>
													</thead>
													<tbody>
													
													<?php
														$result=mysqli_query($conn, "SELECT * FROM `user` ORDER BY u_id DESC ");
														 
														if (mysqli_num_rows($result) > 0) {
															while ($row = mysqli_fetch_array($result)) {
																$u_id = $row['u_id'];
															
														
													?>
													<?php 
														$user_data=mysqli_query($conn, "SELECT * FROM `record` WHERE u_id='$u_id'");
														while ($record = mysqli_fetch_array($user_data)) {
													?>
													
														<tr>
															<td>
																<?php echo $row['u_id']; ?>
															</td>
															<td>
																<?php echo $row['first_name']." ".$row['last_name']; ?>
															</td>
															<td class="text-center">
																<?php echo $row['u_email']; ?>
															</td>
															<td>
																<?php echo $record['mobile']; ?>
															</td>
															<td>
																<?php echo $record['city']; ?>
															</td>
															<td>
																<?php echo $record['address']; ?>
															</td>
															<td>
																<?php echo $record['f_occupation']; ?>
															</td>
															<td>
																<?php echo $record['f_income']; ?>
															</td>
															<td>
																<?php echo $record['p_income']; ?>
															</td>
															<td>
																<?php echo $record['t_mon_earning']; ?>
															</td>
															<td>
																<?php echo $record['m_expenses']; ?>
															</td>
															<td>
																<?php echo $record['t_savings']; ?>
															</td>
															<td>
																<?php echo $record['t_member']; ?>
															</td>
															<td class="text-center">
																<a href="profile.php?u_id=<?php echo $u_id; ?>" class="table-link success">
																	Profile
																</a>
															</td>
															<td>
																<?php echo $row['reg_date']; ?>
															</td>
															
														</tr>
														<?php  }}}  ?>
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