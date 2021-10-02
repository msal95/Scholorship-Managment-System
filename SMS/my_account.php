
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
						<h1 class="display-1">Application Status</h1>
						<p>Work Hard</p>
					</div>
					<div class="col-md-12">
					<?php
						$query=mysqli_query($conn, "SELECT * FROM `record` WHERE u_id='$u_id' ORDER BY r_id DESC");
						do{
							$row=mysqli_fetch_array($query);
						if($row){
						$status=$row['status'];	
						
					?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Application ID</th>
									<th>Email</th>
									<th>Program</th>
									<th>Semester</th>
									<th>CGPA</th>
									<th>Status</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
							
								<tr>
									<td>
										 <?php echo $row['r_id']; ?>					
									</td>
									<td>
										<span class="amount"><?php echo $row['email']; ?></span>					
									</td>
									<td>
										<div class="quantity"><?php echo $row['program']; ?></div>
									</td>
									<td>
										<div class="quantity"><?php echo $row['semester']; ?></div>
									</td>
									<td>
										<div class="quantity"><?php echo $row['cgpa']; ?></div>
									</td>
									<td>
										<?php
										if($status == 0){echo "Pennding";}elseif($status == 1){echo "Approved";}elseif($status == 2){echo "Rejected";}
									
									?>					
									</td>
									<td>
										<span class="amount"><?php echo $row['timestamp']; ?></span>					
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