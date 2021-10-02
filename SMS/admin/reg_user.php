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
															<th>Documents</th>
															<th>IP Address</th>
															<th>&nbsp;</th>
														</tr>
													</thead>
													<tbody>
													 <?php 
															$page = $_GET['page'];
															if($page=='' || $page=='1'){
																$page1=0;
															}else{
																$page1=($page*9)-9;
															}
			
														$query=mysqli_query($conn, "SELECT * FROM `user` ORDER BY u_id DESC LIMIT $page1,12");
														do{
															$row=mysqli_fetch_array($query);
															if($row){
																$u_id=$row['u_id'];
													 ?>
													<?php 
														// $query_sql=mysqli_query("SELECT * FROM `order` where u_id='$u_id'");
														
															// $row_sql=mysqli_fetch_array($query_sql);
															// $order_id=$row_sql['order_id'];
																
													?>
													
													<?php
														// $query=mysqli_query("SELECT order.order_id, user_details.u_id, user_details.f_name, user_details.l_name,
														// user_details.country, user_details.city, user_details.zip, user_details.address, user_details.mobile,
														// order.email, user_details.payment FROM `order` INNER JOIN `user_details` 
														// ON order.u_id=user_details.u_id ") or die(mysqli_error());
														
														// $row=mysqli_fetch_array($query);
														
														
														// $result=mysqli_query("SELECT * FROM `ORDER` INNER JOIN `user_details` ON user_details.user_id=order.user_id");
														 
														// if (mysqli_num_rows($result) > 0) {
															// while ($row = mysqli_fetch_array($result)) {
															
														
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
																<a href="documents.php?u_id=<?php echo $row['u_id']; ?>" class="table-link success">
																	Documents
																</a>
															</td>
															<td>
																<?php echo $row['ip_address']; ?>
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
														<?php  }} while($row); ?>
													</tbody>
												</table>
											</div>
											<?php
								$query1="SELECT * FROM `user`";
								$result1=mysqli_query($conn, $query1);
								$cou=mysqli_num_rows($result1);
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
							
							</ul>
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