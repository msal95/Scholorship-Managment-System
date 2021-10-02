
<?php include 'include/db.php'; ?>

<?php include_once "include/header.php"; ?>
		<div class="container mt-5">
		<?php
				$query="SELECT * FROM `about` where about_id=1" or die(mysqli_error()) ;
				$result=mysqli_query($conn, $query);
				while($data=mysqli_fetch_array($result)){
					$about_img=$data['about_img'];
					$about_name=$data['about_name'];
					$heading=$data['heading'];
					$desc=$data['description'];
					$ceo_msg=$data['ceo_msg'];
			?>
			<h1 class="text-center text-danger" style="text-transform: uppercase "><?php echo $heading; ?></h1>
			<div class="row">
			
				<div class="col-sm-6">
					<?php echo $desc; ?>
				</div>
				<div class="col-sm-6">
					<div class="card w-50 mx-auto border-0" >
					  <div class="card-body">
					  </div>
					  <img class="card-img-bottom img-thumbnail h-50" id="pimage" src="admin/<?php echo $about_img; ?>"alt="Card image">
					  <div class="overlay">
					  </div>
						<h4 class="card-title text-primary"><?php echo $about_name; ?></h4>
					</div>
					<p><?php echo $ceo_msg; ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
	
		<?php include_once "include/footer.php"; ?>