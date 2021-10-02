
<?php include_once "include/db.php"; ?>
<?php 
ob_start();
 session_start(); 

  if (!isset($_SESSION['u_id'])) {
  	header('location: account.php');
  }
  
$u_id = $_SESSION['u_id'];

$sms_id = $_REQUEST['s_id'];


?>



<?php

	if(isset($_POST['agree'])){
		
		$f_name = filter_var($_POST['f_name'], FILTER_SANITIZE_STRING);
		$l_name = filter_var($_POST['l_name'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$phone = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
		$program = filter_var($_POST['program'], FILTER_SANITIZE_STRING);
		$semester = filter_var($_POST['semester'], FILTER_SANITIZE_NUMBER_INT);
		$cgpa = filter_var($_POST['cgpa'], FILTER_SANITIZE_STRING);
		$f_occupation = filter_var($_POST['f_occupation'], FILTER_SANITIZE_STRING);
		$f_income = filter_var($_POST['f_income'], FILTER_SANITIZE_STRING);
		$p_income = filter_var($_POST['p_income'], FILTER_SANITIZE_STRING);
		$num_source = filter_var($_POST['num_source'], FILTER_SANITIZE_STRING);
		$t_member = filter_var($_POST['t_member'], FILTER_SANITIZE_STRING);
		$m_expenses = filter_var($_POST['m_expenses'], FILTER_SANITIZE_STRING);
		$t_mon_earning = filter_var($_POST['t_mon_earning'], FILTER_SANITIZE_STRING);
		$t_savings = filter_var($_POST['t_savings'], FILTER_SANITIZE_STRING);


		$selectQuery=mysqli_query($conn, "SELECT * FROM `record`") or die( mysqli_error($conn));
		$selectResult=mysqli_fetch_array($selectQuery);
		// if(!(s_id !='$sms_id' AND u_id!='$u_id')){
			print($selectResult['u_id']);
			print($selectResult['s_id']);
		// }

		$query=mysqli_query($conn, "INSERT INTO `record` SET u_id='$u_id', s_id='$sms_id', f_name='$f_name', l_name='$l_name', email='$email', address='$address', city='$city', mobile='$phone', program='$program', semester='$semester', cgpa='$cgpa', f_occupation='$f_occupation', f_income='$f_income', p_income='$p_income', num_source='$num_source', t_member='$t_member', m_expenses='$m_expenses', t_mon_earning='$t_mon_earning', t_savings='$t_savings', timestamp=NOW()  ")or die(mysqli_error());
		
		if($query == 0){
			header("location:scholarships.php?msg=fail");
		}elseif($query == 1){
			header("location:scholarships.php?msg=ok");
		}
	}

?>

<?php include_once "include/header.php"; ?>
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="page_header text-center">
			<h2>Apply For Scholarship</h2>
			
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-7">
				<?php 
					$msg = $_REQUEST['msg'];

					if($msg == 'fail'){

							header("refresh:1 ; url=checkout.php");
						?>
					<center>
					<h2 class="alert alert-danger">PLZ try Again!</h2>
					</center>
					<?php } if($msg == 'ok'){
						
						 header("refresh:1 ; url=order.php");
					?>
					<center>
					<h3 class="alert alert-success">Thank You!</h3>
					</center>
					<?php } ?>

					<h3 class="alert alert-success"><?php echo $selectResult['u_id']; ?></h3>
					<form method="POST" action="" enctype="multipart/form-data">
						<?php
							$query_email=mysqli_query($conn, "SELECT * FROM `user` WHERE u_id='$u_id'");
							$r=mysqli_fetch_array($query_email);
							$u_email=$r['u_email'];
						?>
						<h1 style="border-bottom: 1px solid black;">Student Personal Details</h1>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputCity">First Name</label>
							  <input type="text" class="form-control" name="f_name"  value="<?php echo $r['first_name']; ?>" required>
							</div>
							<div class="form-group col-md-6">
							  <label for="inputState">Last Name</label>
							  <input type="text" class="form-control"  name="l_name"  value="<?php echo $r['last_name']; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" value="<?php echo $u_email; ?>" name="email" readonly>
						</div>
						<div class="form-group">
							<label for="inputAddress">Address</label>
							<input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputCity">City</label>
							  <input type="text" class="form-control"  name="city" required>
							</div>
							<div class="form-group col-md-6">
							    <label for="mobile">Mobile No.</label>
						  		<input type="text" name="mobile" placeholder="+923088159827" class="form-control"  required>
							</div>
						</div><br>
						<h1 style="border-bottom: 1px solid black;">Education Details</h1>
						<div class="form-row">
							<div class="form-group  col-md-4">
								<label for="email">Degree Program</label>
								<input type="text" class="form-control" name="program" placeholder="BS IT" required>
							</div>
							<div class="form-group  col-md-4">
								<label for="payment">Semester</label>
								<input type="text" class="form-control"  name="semester" placeholder="2" pattern="[0-9]" required>
							</div>
							<div class="form-group  col-md-4">
								<label for="inputAddress">CGPA</label>
								<input type="text" class="form-control" name="cgpa" pattern="[0-9]" placeholder="3.5" required>
							</div>
						</div>
						<br>
						<h1 style="border-bottom: 1px solid black;">Financial Details</h1>
						<div class="form-row">
							<div class="form-group  col-md-6">
								<label for="email">Father Occupation</label>
								<input type="text" class="form-control" name="f_occupation" placeholder="Teacher" required>
							</div>
							<div class="form-group  col-md-6">
								<label for="payment">Father Monthly Income</label>
								<input type="text" class="form-control"  name="f_income" pattern="[0-9]+" placeholder="40000" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group  col-md-6">
								<label for="email">Personal Income</label>
								<input type="text" class="form-control" name="p_income" placeholder="00000" required>
							</div>
							<div class="form-group  col-md-6">
								<label for="payment">Number of Income Sources</label>
								<input type="number" class="form-control"  name="num_source" pattern="[0-9]{1-10}" placeholder="2"required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group  col-md-6">
								<label for="email">Total Family Members</label>
								<input type="text" class="form-control" name="t_member" placeholder="6" pattern="[0-9]+" required>
							</div>
							<div class="form-group  col-md-6">
								<label for="payment">Total Monthly Expenses</label>
								<input type="text" class="form-control"  name="m_expenses" pattern="[0-9]+" placeholder="20000"  required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group  col-md-6">
								<label for="email">Total Monthly Earning</label>
								<input type="text" class="form-control" name="t_mon_earning" placeholder="40000" pattern="[0-9]+" required>
							</div>
							<div class="form-group  col-md-6">
								<label for="payment">Total Monthly Savings</label>
								<input type="text" class="form-control"  name="t_savings" pattern="[0-9]+" placeholder="10000" required>
							</div>
						</div>
						
						<div class="form-group">
						  <label for="mobile"></label>
						  <button type="submit" name="agree" class="form-control btn btn-danger" >Submit</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php include_once "include/footer.php"; ?> 