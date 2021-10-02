
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
										<li class="active"><span>Contact</span></li>
									</ol>
									
									<div class="clearfix">
										<h1 class="pull-left">Contact</h1>
										
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
															<th>Contact ID</th>
															<th>User Name</th>
															<th>Email</th>
															<th>Message</th>
															<th>Date</th>
															<th>&nbsp;</th>
														</tr>
													</thead>
													<tbody>
													 <?php 
														$query=mysqli_query($conn, "SELECT * FROM `contact` ORDER BY contact_id DESC");
														do{
															$row=mysqli_fetch_array($query);
															if($row){
																$contact_id=$row['contact_id'];
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
																<?php echo $row['contact_id']; ?>
															</td>
															<td>
																<?php echo $row['full_name']; ?>
															</td>
															<td class="text-center">
																<?php echo $row['email']; ?>
															</td>
															<td>
																<?php echo $row['msg']; ?>
															</td>
															<td>
																<?php echo $row['timestamp']; ?>
															</td>
															<td class="text-center">
																
																<a href="del_contact_detail.php?contact_id=<?php echo $contact_id; ?>" class="table-link danger">
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