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
				<div id="content-wrapper">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="row">
								<div class="col-lg-12">
									<ol class="breadcrumb">
										<li><a href="#">Home</a></li>
										<li class="active"><span>Scholorship Application</span></li>
									</ol>
									
									<h1>Scholorship Applications</h1>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix">
										<header class="main-box-header clearfix">
											<h2 class="pull-left">Applications</h2>
											
										</header>
										
										<div class="main-box-body clearfix">
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th class="text-center">Order ID</th>
															<th class="text-center">Student Name</th>
															<th class="text-center">Semester</th>
															<th class="text-center">CGPA</th>
															<th class="text-center">Status</th>
															<th class="text-center">Date</th>
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
			

	$query=mysqli_query($conn, "SELECT * FROM `order` ORDER BY order_id DESC  LIMIT $page1,12");
	do{
		$row=mysqli_fetch_array($query);
	if($row){
		$order_id=$row['order_id'];
		$u_id=$row['u_id'];
		$status=$row['status'];
?>
<?php
	//print_r($cart);
		//echo $key . " : " . $value['quantity'] ."<br>";
		$cartsql = "SELECT * FROM `user_details` WHERE u_id=$u_id";
		$cartres = mysqli_query($conn, $cartsql);
		$cartr = mysqli_fetch_assoc($cartres);
		
 ?>
													<tr>
														<td class="text-center">
															<?php echo $order_id; ?>
														</td>
														<td class="text-center">
															<?php echo $cartr['f_name']." ". $cartr['l_name']; ?>
														</td>
														<td class="text-center">
															<?php echo $row['payment_method']; ?>
														</td>
														<td class="text-right">
															<?php echo $row['total']; ?>
														</td>
														<td class="text-center">
															<?php
																if($status == 0){echo "Pending";}elseif($status == 1){echo "Completed";}elseif($status == 2){echo "Cancelled";}
															
															?>
															<?php
																if($status == 0){
																	
															?>
																<a href="complete.php?id=<?php echo $order_id; ?>">Complete</a>
																<a href="cancel.php?id=<?php echo $order_id; ?>">Cancel</a>
															<?php
																}elseif($status == 1){
																	
															?>
																<a href="pending.php?id=<?php echo $order_id; ?>">Pending</a>
																<a href="cancel.php?id=<?php echo $order_id; ?>">Cancel</a>
															<?php
																}elseif($status == 2){
															?>
																<a href="complete.php?id=<?php echo $order_id; ?>">Complete</a>
																<a href="pending.php?id=<?php echo $order_id; ?>">Pending</a>
															<?php
																}
															?>
														</td>
														
														<td class="text-right">
															<?php echo $row['timestamp']; ?>
														</td>
														<td class="text-right">
															<a style="color:#ff0011" href="del_order.php?order_id=<?php echo $row['order_id']; ?>"><i class="fa fa-2x fa-trash-o"></i></a>
														</td>
													</tr>
														
	<?php }} while($row); ?>
													</tbody>
												</table>
											</div>
											<?php
								$query1="SELECT * FROM `order`";
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
								
								<li class="page-item"><a class="page-link" href="order.php?page=<?php echo $b; ?>" ><?php echo $b . " " ; ?> </a></li>
								
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