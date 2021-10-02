


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ecommerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	
	<style>
	
  .hover{background:#343a40; color:#fff; margin:0px; padding:0px;}
  .hover .nav a {color:#fff;}
  .hover .nav :hover{color:#fff; background:#333;}
	</style>
	
</head>
<body>
<?php
session_start();
if($_SESSION['u_id'] == '') {
?>
<!--Top Header---->
	<div class="container-fluid bg-secondary header-top d-none d-md-block">
		<div class="container">
			<div class="row text-light pt-2 pb-2">
				<div class="col-sm-5">
					<i class="fas fa-envelope"></i> muhammadshahid.ms95@gmail.com
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-2"><i class="fas fa-user"></i><a href="account.php" class="text-light" style="text-decoration:none;"> Account</a></div>
				<div class="col-sm-2"><i class="fas fa-shopping-cart"></i> My Cart - $0.00</div>
			</div>
		</div>
	</div>

	<?php } elseif($_SESSION['u_id'] != '') { ?>
	
	<div class="container-fluid bg-secondary header-top d-none d-md-block">
		<div class="container">
			<div class="row text-light pt-2 pb-2">
				<div class="col-sm-5">
					<i class="fas fa-envelope"></i> muhammadshahid.ms95@gmail.com
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-2"><i class="fas fa-sign-out-alt"></i><a href="logout.php" class="text-light" style="text-decoration:none;"> Logout</a></div>
				<div class="col-sm-2"><i class="fas fa-shopping-cart"></i> My Cart - $0.00</div>
			</div>
		</div>
	</div>
	<?php } ?>

<!--Navbar---->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="mynav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="gallery.php">Gallery</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Category</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Mens</a>
							<a class="dropdown-item" href="#">Womens</a>
							<a class="dropdown-item" href="#">Kids</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="shop.php">Shop</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
				</ul>
			</div>
			<ul class="navbar-nav justify-content-end">
				<form class="form-inline">
					<input type="text" name="search" class="form-control mr-sm-1" placeholder="Search...">
					<button type="button" class="btn btn-danger">Search</button>
				</form>
			</ul>
		</div>	
	</nav>