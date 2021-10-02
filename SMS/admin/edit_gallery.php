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
										<li class="active"><span>Edit Gallery</span></li>
									</ol>
									
									<h1>Gallery</h1>
								</div>
							</div>
							
								<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix">
										<header class="main-box-header clearfix">
											<h2 class="pull-left">Gallery</h2>
											
										</header>
										
										<div class="main-box-body clearfix">
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th class="text-center">ID</th>
															<th class="text-center">Image</th>
															<th class="text-center">Status</th>
														</tr>
													</thead>
													<?php
													
													
			$page = $_GET['page'];
			if($page=='' || $page=='1'){
				$page1=0;
			}else{
				$page1=($page*8)-8;
			}
			
													
													$query="SELECT * FROM `gallery` LIMIT $page1,8";
													$result=mysqli_query($conn, $query);
													do{
														$data=mysqli_fetch_array($result);
														if($data){
															$photo = $data['g_photo'];
															$g_id = $data['g_id'];
													
													?>
													<tbody>
														<tr>
															<td class="text-center"><?php echo $g_id; ?></td>
															<td class="text-center"><img src="<?php echo $photo; ?>" width="50px"></td>
															<td class="text-center"><a href="delete.php?g_id=<?php echo $g_id; ?>">Delete</a>&nbsp;
															<a href="update.php?g_id=<?php echo $g_id; ?>">Update</a></td>
														</tr>
													</tbody>
													<?php }} while($data); ?>
												</table>
											</div>
											<?php
												$query1="SELECT * FROM `gallery`";
												$result1=mysqli_query($conn, $query1);
												$cou=mysqli_num_rows($result1);
												$a=($cou/4);
												$a=ceil($a);
											?>
											<ul class="pagination pull-right">
											<li class=" <?php if($page <= 1){ echo 'disabled'; } ?>">
									<a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>"><i class="fa fa-chevron-left"></i></a></a>
								</li>
								<?php
									for($b=1; $b<=$a; $b++){
								?>
								
								<li class="page-item"><a class="page-link" href="edit_gallery.php?page=<?php echo $b; ?>" ><?php echo $b . " " ; ?> </a></li>
								
								<?php	} ?>
								
								<li class=" <?php if($page >= $cou){ echo 'disabled'; } ?>">
									<a href="<?php if($page >= $cou){ echo '#'; } else { echo "?page=".($page + 1); } ?>"><i class="fa fa-chevron-right"></i></a>
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