
	
<?php
include "include/db.php";

session_start();

	$flg_submit = false;
	
	$flg_login = 0;
	
	if(isset($_POST['login'])){
				
		$flg_submit = true;
		
		$admin_email = $_POST['admin_email'];
		$admin_password =md5($_POST['admin_password']);
		
		
		$result = mysqli_query($conn, "SELECT * FROM `admin` where admin_email = '$admin_email' and admin_password = '$admin_password'") or die(mysqli_error());
		
			if(mysqli_num_rows($result)){
				
				$row = mysqli_fetch_assoc($result);
				
				$flg_login = 1;
				
				
				$_SESSION['admin_id'] = $row['admin_id'];
				
				header("location:index.php");
			}
			else{
				
                     header("location:login.php");
			}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Scholorship Managment System</title>
	
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
	
	<!-- RTL support - for demo only -->
	<script src="js/demo-rtl.js"></script>
	<!-- 
	If you need RTL support just include here RTL CSS file <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-rtl.min.css" />
	And add "rtl" class to <body> element - e.g. <body class="rtl"> 
	-->
	
	<!-- libraries -->
	<link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/nanoscroller.css" />

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />

	<!-- this page specific styles -->

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	
	<!-- Favicon -->
	<link type="image/x-icon" href="images/logo.png" rel="shortcut icon"/>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body id="login-page-full">
	<div id="login-full-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="login-box">
						<div id="login-box-holder">
							<div class="row">
								<div class="col-xs-12">
									<header id="login-header">
										<div id="login-logo">
											<img src="images/logo.png" alt=""/>
										</div>
									</header>
									<div id="login-box-inner">
										<form role="form" method="POST" action="">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input class="form-control" type="text" name="admin_email" placeholder="Email address">
											</div>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-key"></i></span>
												<input type="password" name="admin_password" class="form-control" placeholder="Password">
											</div>
											<div id="remember-me-wrapper">
												<div class="row">
													<div class="col-xs-6">
														<div class="checkbox-nice">
															<input type="checkbox" id="remember-me" checked="checked" />
															<label for="remember-me">
																Remember me
															</label>
														</div>
													</div>
													<a href="forgot_password.php" id="login-forget-link" class="col-xs-6">
														Forgot password?
													</a>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12">
													<button type="submit" name="login" class="btn btn-success col-xs-12">Login</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- global scripts -->
	<script src="js/demo-skin-changer.js"></script> <!-- only for demo -->
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.nanoscroller.min.js"></script>
	
	<script src="js/demo.js"></script> <!-- only for demo -->
	
	<!-- this page specific scripts -->

	
	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	
	<!-- this page specific inline scripts -->
	
</body>
</html>