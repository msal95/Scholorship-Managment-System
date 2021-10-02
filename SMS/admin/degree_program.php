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
				<?php

if(isset($_POST['submit'])){
	$prg_name=mysqli_real_escape_string($conn,$_POST['prg_name']);
	$prg_desc=mysqli_real_escape_string($conn,$_POST['prg_desc']);

	$query="INSERT INTO `program` 
	set prg_name='$prg_name', prg_desc='$prg_desc' ";
 	mysqli_query($conn, $query) or die(mysqli_error());
	}

?>
				
				<div id="content-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<ol class="breadcrumb">
										<li><a href="#">Home</a></li>
										<li class="active"><span>Degree Programs</span></li>
									</ol>
									
									<h1>Degree Programs</h1>
								</div>
							</div>
							
								
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix">
										<header class="main-box-header clearfix" style="border-bottom:2px dotted #333;">
											<h2 class="pull-left">Degree Programs</h2>
											<div class="filter-block pull-right">
											<form action="" enctype="multipart/form-data" method="POST">
												<div class="form-group pull-left">
													<input type="text" class="form-control" name="prg_name" placeholder="program name...">
												</div>
												<div class="form-group pull-left">
													<textarea class="form-control" name="prg_desc" placeholder="program description..."></textarea>
												</div>
												<button type="submit" name="submit" class="btn btn-primary pull-right">
													<i class="fa fa-plus-circle fa-lg"></i> Add Program
												</a>
												</form>
											</div>
										</header>
										
										<div class="main-box-body clearfix">
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th><span>Program Name</span></th>
															<th><span>Description</span></th>
															<th class="text-center"><span>Status</span></th>
															<th>&nbsp;</th>
														</tr>
													</thead>
													<?php
													
													
													$page = $_GET['page'];
													if($page=='' || $page=='1'){
														$page1=0;
													}else{
														$page1=($page*8)-8;
													}
			
													
													$query="SELECT * FROM `program`  order by prg_id desc  LIMIT $page1,8 ";
														$result=mysqli_query($conn, $query);
														do{
															$data=mysqli_fetch_array($result);
															if($data){
																$prg_id = $data['prg_id'];
																$prg_name = $data['prg_name'];
																$prg_desc = $data['prg_desc'];
													?>
													<tbody>
														<tr>
															<td>
																<?php echo $prg_name; ?>
															</td>
															<td>
																<?php echo $prg_desc; ?>
															</td>
															<td class="text-center">
																<span class="label label-warning">Active</span>
															</td>
															<td style="width: 15%;">
																<!-- <a href="#" class="table-link">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
																	</span>
																</a> -->
																<a href="edit_program.php?prg_id=<?php echo $prg_id; ?>" class="table-link">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
																<a href="delete_program.php?prg_id=<?php echo $prg_id; ?>" class="table-link danger">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
															</td>
														</tr>
									<?php }} while($data); ?>
													</tbody>
												</table>
											</div>
												<?php
												
												
												
												$query1="SELECT * FROM `program`";
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
												
												<li class="page-item"><a class="page-link" href="degree_program.php?page=<?php echo $b; ?>" ><?php echo $b . " " ; ?> </a></li>
												
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