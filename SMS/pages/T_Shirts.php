
<?php include_once "include/db.php"; ?>
<?php include_once "include/header.php"; ?>

 <div class="container-fluid">
  <div class="row">
    <nav class="col-sm-2 pl-4 fixed hover">
      <ul class="nav flex-column ">
       <?php
			$query=mysql_query("SELECT * FROM `category` ");
			do{
			$data=mysql_fetch_array($query);
			if($data){
			$cat_id=$data['cat_id'];
			$cat_name=$data['cat_name'];
		?>
		<li class="nav-item">
			<a class="nav-link active" href="#"><?php echo $cat_name; ?></a>
		</li>
			<?php }} while($data); ?>
      </ul>
    </nav>
	<div class="col-sm-10 mt-4">
		<div class="row">
		<?php
		
		
		$page = $_GET['page'];
			if($page=='' || $page=='1'){
				$page1=0;
			}else{
				$page1=($page*8)-8;
			}
			
		
		
			$query_p=mysql_query("SELECT * FROM `product` where cat_id=9");
			do{
			$data_p=mysql_fetch_array($query_p);
			if($data_p){
			$p_id=$data_p['p_id'];
			$p_name=$data_p['p_name'];
			$p_price=$data_p['p_price'];
			$p_image=$data_p['p_image'];
		?>
			<div class="col-sm-3">
				<div class="card mb-3">
					<img src="../admin/<?php echo $p_image; ?>"style="height:18em;" class="img-fluid card-img-top">
					<div class="card-body">
						<h5><?php echo $p_name; ?></h5>
						<h5>$<?php echo $p_price; ?></h5>
						<button class="btn btn-danger" type="button"><i class="fas fa-cart-plus"></i> Add To Cart</button>
					</div>
				</div>
			</div>
			<?php }} while($data_p); ?>
		</div>
	</div>
  </div>
  
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-sm-4">
							<?php
								$query1="SELECT * FROM `product`";
								$result1=mysql_query($query1);
								$cou=mysql_num_rows($result1);
								$a=($cou/6);
								$a=ceil($a);
							?>
							<ul class="pagination">
								<li class="page-item  <?php if($page <= 1){ echo 'disabled'; } ?>">
									<a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
								</li>
								<?php
									for($b=1; $b<=$a; $b++){
								?>
								
								<li class="page-item"><a class="page-link" href="shop.php?page=<?php echo $b; ?>" ><?php echo $b . " " ; ?> </a></li>
								
								<?php	} ?>
								
								<li class="page-item  <?php if($page >= $cou){ echo 'disabled'; } ?>">
									<a class="page-link" href="<?php if($page >= $cou){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
								</li>
							
							</ul>
					
						</div>
					</div>
				</div>
</div>
	
		<?php include_once "include/footer.php"; ?>