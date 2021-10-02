<?php
include "include/db.php";
// initializing variables
$u_name = "";
$email    = "";
$errors = array(); 

// // connect to the database


// REGISTER USER
if (isset($_POST['signup'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  $u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $u_email = mysqli_real_escape_string($conn,  $_POST['u_email']);
  $password_1 = md5($_POST['password_1']);
  $password_2 = md5($_POST['password_2']);
  $ip_address = mysqli_real_escape_string($conn, $_POST['ip_address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($u_name)) { array_push($errors, "Username is required"); }
  if (empty($u_email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $result = mysqli_query($conn, "SELECT * FROM `user` WHERE u_name='$u_name' OR u_email='u_email' ") or die(mysqli_error());
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['u_name'] === $u_name) {
      array_push($errors, "Username already exists");
    }

    if ($user['u_email'] === $u_email) {
      array_push($errors, "email already exists");
    }
  }
}

	$name = $_FILES['p_image']['name'];
  $target_dir = "profile/";
  $target_file = $target_dir . basename($_FILES["p_image"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
     // Upload file
     if(move_uploaded_file($_FILES['p_image']['tmp_name'],$target_dir.$name)){
			$query = mysqli_query($conn, "INSERT INTO `user` SET first_name='$first_name',
	last_name='$last_name', u_name='$u_name', u_email='$u_email', password='$password_1', 
	 ip_address='$ip_address', gender='$gender', reg_date=NOW(), p_image='$target_file'") or die(mysqli_error($conn));
		header("refresh:1s; location:account.php");
			}
			else{
				header("refresh:1s; location:account.php");
                     
			}
		}

?>




<?php include_once "include/header.php"; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-8"> 
			<h2 class="mt-5 mb-3 text-center text-danger">Create Your Account</h2>
			
				<?php  if (count($errors) > 0) : ?>
				  <div class="error bg-danger text-light text-center">
					<?php foreach ($errors as $error) : ?>
					  <p><?php echo $error ?></p>
					<?php endforeach ?>
				  </div>
				<?php  endif ?>

			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="first_name" class="col-sm-2 col-form-label">First Name</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="u_name" class="col-sm-2 col-form-label">User Name</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="u_name" placeholder="Shahid_12" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-8">
					  <input type="email" class="form-control" name="u_email" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" name="password_1" placeholder="***********" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="c_password" class="col-sm-2 col-form-label">Confirm Pass</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" name="password_2" placeholder="**********">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Gender</label>
					<div class="col-sm-8">
					  <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="gender" value="Male" checked>Male
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="gender" value="Female">Female
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="c_password" class="col-sm-2 col-form-label">Upload Profile Picture</label>
					<div class="col-sm-8">
					  <input type="file" class="form-control" name="p_image" required>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-8">
					  <input type="date" class="form-control"  name="reg_date" hidden>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-8">
					  <input type="text" class="form-control" value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>"  name="ip_address" hidden>
					</div>
				</div>
				<div class="form-group row">
					<label for="zip_code" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-8">
						<button class="btn btn-danger text-center" style="font-size:20px;" name="signup" type="submit" value="Create Account"><i class="fas fa-arrow-right"></i>Create Account</button>
					</div>
				</div>
			</form>
		</div>
		
		<!----LOGIN---->
	
		
		
		<!----LOGIN---->
		
		<div class="col-sm-4">
			<h2 class="mt-5 mb-3 text-center text-danger">Already Registered</h2>
			<p class="pt-2">By creating an account , you will be able to apply for different type of scholarships and you can check youor scholarships status </p>
			<a class="btn btn-danger text-center" style="font-size:20px;" href="account.php" type="button"><i class="fas fa-arrow-right"></i> Login Account</a>
			
		</div>
	</div>
</div>

<?php include_once "include/footer.php"; ?>