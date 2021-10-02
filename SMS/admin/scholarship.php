<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php include_once('include/db.php'); ?>



<?php
 session_start(); 

  if (!isset($_SESSION['admin_id'])) {
  	header('location: login.php');
  }
?>


<?php

$target_dir="scholoship_add/";
$target_file=$target_dir . basename(rand(1,999) . rand(1000,9999) . rand(1,999) . "_" . $_FILES["s_image"]["name"]);
$uploadok=1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST['submit'])){
	$s_name=mysqli_real_escape_string($conn, $_POST['s_name']);
	$s_desc=mysqli_real_escape_string($conn, $_POST['s_desc']);
	$s_date=mysqli_real_escape_string($conn, $_POST['s_date']);
	$prg_id=mysqli_real_escape_string($conn, $_POST['prg_id']);

}
// Check File Size
if($_FILES["s_image"]["size"]>50000000){
	$uploadok=0;
}
// allow certain files formates
if($imageFileType !="jpg" && $imageFileType !="jpeg" && imageFileType !="png"){
	$uploadok=0;
}
// check if $uploadok isset to 0 by an error
if($uploadok==0){
	
}else{
	if(move_uploaded_file($_FILES["s_image"]["tmp_name"], $target_file)){
			$query0="INSERT INTO `scholarship` set s_name='$s_name', prg_id='$prg_id', s_desc='$s_desc', s_date='$s_date',  s_image='$target_file' ";
		mysqli_query($conn, $query0) or die(mysqli_error($conn));
	}else{
	}
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
										<li class="active"><span>Scholorships</span></li>
									</ol>
									
									<h1>Scholorships</h1>
								</div>
							</div>
						
							
							<div class="row">
								<div class="col-lg-12">
									<div class="main-box clearfix">
										<header class="main-box-header clearfix">
											
											<div class="filter-block pull-right">
											<form action="" enctype="multipart/form-data" style="border-bottom:2px dotted #333;" method="POST">
											<div class="row">
											<div class="col-md-8">
												<div class="form-group pull-left">
													<input type="text" class="form-control" name="s_name" placeholder="Scholorship name...">
												</div>
												<div class="form-group pull-left">
													<textarea class="form-control" name="s_desc" placeholder="Scholorship detail..."></textarea>
												</div>
												<div class="form-group pull-left">
													<select class="form-control" name="prg_id">
														<option disabled selected>Select Program</option>
														<?php
															$query=mysqli_query($conn, "SELECT * FROM `program` ");
															do{
															$data=mysqli_fetch_array($query);
															if($data){
															$prg_id=$data['prg_id'];
															$prg_name=$data['prg_name'];
														?>
														<option value="<?php echo $prg_id; ?>"><?php echo $prg_name; ?></option>
															<?php }} while($data); ?>
													</select>
												</div>
												<div class="form-group pull-left">
													<a href="#" data-toggle="tooltip" title="Last Date">

													<input type="date" class="form-control" name="s_date" placeholder="Last Date" required>
													</a>
												</div>
												<div class="form-group pull-left">
													<input type="file" class="form-control" name="s_image" placeholder="scholarship image...">
												</div>
												</div>
												<div class="col-md-2">
												
												<button type="submit" name="submit" style="line-height:2; margin-top:2em;" class="btn btn-primary pull-right">
													<i class="fa fa-plus-circle fa-lg"></i> Add Scholorship
												</button>
												</div>
												</div>
												
												</form>
											</div>
										</header>
											<span></span>
										<div class="main-box-body clearfix">
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th><span>#ID</span></th>
															<th><span>Scholarship Name</span></th>
															<th><span>Image</span></th>
															<th><span>Detail</span></th>
															<th><span>Last Date</span></th>
															<th><span>Program</span></th>
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
													
													
													$query="SELECT * FROM `scholarship`  order by s_id desc  LIMIT $page1,8 ";
														$result=mysqli_query($conn, $query);
														do{
															$data=mysqli_fetch_array($result);
															if($data){
																$s_id = $data['s_id'];
																$s_name = $data['s_name'];
																$s_image = $data['s_image'];
																$s_desc = $data['s_desc'];
																$s_date = $data['s_date'];
																$prg_id = $data['prg_id'];
													?>
													<?php
													$query_pro=mysqli_query($conn, "SELECT * FROM `program` WHERE prg_id = '$prg_id' ");
													$data_pro=mysqli_fetch_array($query_pro);
													if($data_pro){
													$prg_name=$data_pro['prg_name'];
													}
													?>
													<tbody>
														<tr>
															<td>
																<?php echo $s_id; ?>
															</td>
															<td>
																<?php echo $s_name; ?>
															</td>
															<td>
																<a href="update_scholarship_image.php?s_id=<?php echo $s_id; ?>"><img width="50px" src="<?php echo $s_image; ?>"></a>
															</td>
															<td>
																<?php echo $s_desc; ?>
															</td>
															<td>
																<?php echo $s_date; ?>
															</td>
															<td>
																<?php echo $prg_name; ?>
															</td>
															<td class="text-center">
																<span class="label label-warning">Active</span>
															</td>
															<td style="width: 15%;">
																<a href="#" class="table-link">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
																<a href="edit_scholarship.php?s_id=<?php echo $s_id; ?>" class="table-link">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
																<a href="delete_scholarship.php?s_id=<?php echo $s_id; ?>" class="table-link danger">
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
												
												
												
												$query1="SELECT * FROM `scholarship`";
												$result1=mysqli_query($conn, $query1);
												$cou=mysqli_num_rows($result1);
												$a=($cou/6);
												$a=ceil($a);
											?>
											<ul class="pagination pull-right">
												<li class=" <?php if($page <= 1){ echo 'disabled'; } ?>">
													<a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>"><i class="fa fa-chevron-left"></i></a></a>
												</li>
												<?php
													for($b=1; $b<=$a; $b++){
												?>
												
												<li class="page-item"><a class="page-link" href="add_scholarship.php?page=<?php echo $b; ?>" ><?php echo $b . " " ; ?> </a></li>
												
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