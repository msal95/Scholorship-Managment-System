<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php include_once "include/db.php"; ?>
<?php 
 session_start(); 

  if (!isset($_SESSION['u_id'])) {
  	header('location: account.php');
  }
$u_id = $_SESSION['u_id'];
?>
<?php include_once "include/header.php"; ?>

<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row text-center">
					<div class="page_header mx-auto font-weight-bold">
						<h1 class="display-1 text-uppercase">Apply Later</h1>
						<p>Get Best Oppurtinity For Your Future</p>
					</div>
					<div class="col-md-12">
			
					<?php
						$query=mysqli_query($conn, "SELECT * FROM `wishlist` WHERE u_id='$u_id' ORDER BY w_id DESC");
						do{
							$row=mysqli_fetch_array($query);
						if($row){
							$s_id=$row['s_id'];
						
					?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th> Image</th>
									<th>Scholarship Name</th>
									<th>Last Date</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<?php
								//print_r($cart);
									//echo $key . " : " . $value['quantity'] ."<br>";
									$cartsql = "SELECT * FROM scholarship WHERE s_id=$s_id";
									$cartres = mysqli_query($conn, $cartsql);
									$cartr = mysqli_fetch_assoc($cartres);
							 ?>
							<tbody>
								<tr>
									<td>
										 <a class="text-danger" href="del_wish.php?s_id=<?php echo $row['s_id']; ?>"><i class="fas fa-trash-alt"></i></a>					
									</td>
									<td>
										<img src="admin/<?php echo $cartr['s_image']; ?>" alt="" height="90" width="90">					
									</td>
									<td>
										<?php echo $cartr['s_name']; ?>				
									</td>
									<td>
										<?php echo $row['timestamp']; ?>				
									</td>
									<td>
										<a class="btn btn-success" type="button" href="scholarship_details.php?s_id=<?php echo $row['s_id']; ?>"><i class="fas fa-cart-plus"></i> Details</a>					
									</td>
								</tr>
							</tbody>
						</table><hr>
						<?php }} while($row); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>		
		<?php include_once "include/footer.php"; ?>	