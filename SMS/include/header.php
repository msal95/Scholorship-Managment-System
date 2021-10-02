<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php 
include_once"include/db.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMS-Scholorship Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<link rel="shortcut icon" href="images/download.png"> 
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/style_common.css" />
	<link rel="stylesheet" type="text/css" href="css/style3.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css' />
	
	<style>
    		.hovereffect {
		  width: 100%;
		  height: 100%;
		  float: left;
		  overflow: hidden;
		  position: relative;
		  text-align: center;
		  cursor: default;
		  background: #42b078;
		}

		.hovereffect .overlay {
		  width: 100%;
		  height: 100%;
		  position: absolute;
		  overflow: hidden;
		  top: 0;
		  left: 0;
		  padding: 50px 30px;
		}

		.hovereffect img {
		  display: block;
		  position: relative;
		  max-width: none;
		  width: calc(100% + 20px);
		  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
		  transition: opacity 0.35s, transform 0.35s;
		  -webkit-transform: translate3d(-10px,0,0);
		  transform: translate3d(-10px,0,0);
		  -webkit-backface-visibility: hidden;
		  backface-visibility: hidden;
		}

		.hovereffect:hover img {
		  opacity: 0.4;
		  filter: alpha(opacity=40);
		  -webkit-transform: translate3d(0,0,0);
		  transform: translate3d(0,0,0);
		}


		.hovereffect a, .hovereffect p {
		  color: #000;
		  opacity: 0;
		  filter: alpha(opacity=0);
		  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
		  transition: opacity 0.35s, transform 0.35s;
		  -webkit-transform: translate3d(100%,0,0);
		  transform: translate3d(100%,0,0);
		}

		.hovereffect:hover a, .hovereffect:hover p {
		  opacity: 1;
		  
		  filter: alpha(opacity=100);
		  -webkit-transform: translate3d(0,0,0);
		  transform: translate3d(0,0,0);
		}




	
	
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
					<i class="fas fa-envelope"></i> registrar@bzu.edu.pk
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-2"><i class="fas fa-user"></i><a href="account.php" class="text-light" style="text-decoration:none;"> Account</a></div>
			</div>
		</div>
	</div>

	<?php } elseif($_SESSION['u_id'] != '') { ?>
	
	<div class="container-fluid bg-secondary header-top d-none d-md-block">
		<div class="container">
			<div class="row text-light pt-2 pb-2">
				<div class="col-sm-5">
					<i class="fas fa-envelope"></i> registrar@bzu.edu.pk
				</div>
				<div class="col-sm-3">
					<!-- <i class="fas fa-sign-out-alt"></i><a href="logout.php" class="text-light" style="text-decoration:none;"> Upload Profile Picture</a> -->
				</div>
				<div class="col-sm-2">
					<i class="fas fa-sign-out-alt"></i><a href="logout.php" class="text-light" style="text-decoration:none;"> Logout</a>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

<!--Navbar---->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="images/image - Copy.png" width="80"></a>
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
					<!-- <li class="nav-item">
						<a class="nav-link" href="gallery.php">Gallery</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" href="scholarships.php">Scholorships</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact Us</a>
					</li>
					<li class="nav-item">
						
					</li>
				</ul>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-2">
						<button class="btn btn-secondary"><a style="text-decoration: none; color: white;" href="upload_documents.php" >Upload Your Documents</a></button>
					</div>
					
				</div>
				
			</div>	
			
		</div>	
	</nav>

