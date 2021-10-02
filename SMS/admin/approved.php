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
															<th>First Name</th>
															<th>Last Name</th>
															<th>User Name</th>
															<th>Gender</th>
															<th>Email</th>
															<th>Reg. Date</th>
															<th>Status</th>
															<th>&nbsp;</th>
														</tr>
													</thead>
													<tbody>
													 <?php 
															$queryApprove=mysqli_query($conn, "SELECT * FROM `order` WHERE status=1");
														while($row_sql = mysqli_fetch_assoc($queryApprove)){
																$u_id = $row_sql['u_id'];
																$status = $row_sql['status'];
													 ?>
													<?php 
														$query_sql=mysqli_query($conn,"SELECT * FROM `user` where u_id='$u_id'");
															$row=mysqli_fetch_array( $query_sql);	
													?>
														<tr>
															<td>
																<?php echo $row['u_id']; ?>
															</td>
															<td>
																<?php echo $row['first_name']; ?>
															</td>
															<td>
																<?php echo $row['last_name']; ?>
															</td>
															<td class="text-center">
																<?php echo $row['u_name']; ?>
															</td>
															<td class="text-center">
																<?php echo $row['gender']; ?>
															</td>
															<td class="text-center">
																<?php echo $row['u_email']; ?>
															</td>
															<td>
																<?php echo $row['reg_date']; ?>
															</td>
															<td>
																<?php
										if($status == 0){echo "Pennding";}elseif($status == 1){echo "Completed";}elseif($status == 2){echo "Cancelled";}
									
									?>	
															</td>
															<td style="width: 20%;">
																
																<a href="del_reg_user.php?u_id=<?php echo $row['u_id']; ?>" class="table-link danger">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
															</td>
														</tr>
														<?php  } ?>
													</tbody>
												</table>
											</div>
									<!-- 		<?php
								$query1="SELECT * FROM `user`";
								$result1=mysqli_query($conn, $query1);
								$cou=mysqli_num_rows( $result1);
								$a=($cou/7);
								$a=ceil($a);
							?>
							<ul class="pagination">
								<li class="page-item  <?php if($page <= 1){ echo 'disabled'; } ?>">
									<a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
								</li>
								<?php
									for($b=1; $b<=$a; $b++){
								?>
								
								<li class="page-item"><a class="page-link" href="reg_user.php?page=<?php echo $b; ?>" ><?php echo $b . " " ; ?> </a></li>
								
								<?php	} ?>
								
								<li class="page-item  <?php if($page >= $cou){ echo 'disabled'; } ?>">
									<a class="page-link" href="<?php if($page >= $cou){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
								</li>
							
							</ul> -->
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