	
<?php
include "include/db.php";

session_start();

	$flg_submit = false;
	
	$flg_login = 0;
	
	if(isset($_POST['login'])){
				
		$flg_submit = true;
		
		$u_email = $_POST['u_email'];
		$password =md5($_POST['password']);
		
		
		$result = mysqli_query($conn, "SELECT * FROM `user` where u_email = '$u_email' and password = '$password'") or die(mysqli_error());
		
			if(mysqli_num_rows($result)){
				
				$row = mysqli_fetch_assoc($result);
				
				$flg_login = 1;
				
				
				$_SESSION['u_id'] = $row['u_id'];
				
				header("location:index.php");
			}
			else{
				
                     header("location:account.php?msg=fail");
			}
	}
?>


<?php include_once "include/header.php"; ?>

<div class="container mt-5 pt-4">
	<div class="row">
		<div class="col-sm-6 m-right p-4">
			<div class="row">
				<h4>New Student</h4>
			</div>
			<div class="underline border-1"></div>
			<p class="pt-2">By creating an account , you will be able to apply for different type of scholarships and you can check youor scholarships status </p>
			<a class="btn btn-danger text-center" style="font-size:20px;" href="signup.php" type="button"><i class="fas fa-arrow-right"></i> Create Account</a>
		</div>
		<!---registered customers----->
		<div class="col-sm-6 m-right p-4">
			<div class="row">
				<h4>Registered Student</h4>
			</div>
			<div class="underline"></div>
			
				<?php 
					$msg = $_REQUEST['msg'];

					if($msg == 'fail') {
					//header("refresh");
						?>
					<h3 class="alert alert-danger">PLZ try Again!</h3>
					<?php } ?>
			
			<form action="" class="mt-5 mb-5" style=" padding-bottom:5em;" method="POST">
				<div class="form-group">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
					  </div>
					  <input type="text" name="u_email" class="form-control col-sm-8" placeholder="Email" aria-label="email" required>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
					  </div>
					  <input type="password" class="form-control col-sm-8" name="password" placeholder="password" aria-label="password" required>
					</div>
				</div>
				<div class="form-group">
				<a class="btn btn-link text-danger" style="text-decoration:none;" href="#">Forgot Password</a>
				</div>
				<div class="form-group">
					<button class="btn btn-danger text-center" style="font-size:20px;" name="login" value="submit" type="submit"><i class="fas fa-arrow-right"></i> login</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include_once "include/footer.php"; ?>