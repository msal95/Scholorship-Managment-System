
<?php include_once "include/db.php"; ?>
<?php 
ob_start();
 session_start(); 

  if (!isset($_SESSION['u_id'])) {
  	header('location: account.php');
  }
  
$u_id = $_SESSION['u_id'];
?>



<?php 
 $output_dir = "documents/";/* Path for file upload */
    $fileCount = count($_FILES["image"]['name']);
	for($i=0; $i < $fileCount; $i++)
		
		{
            $RandomNum   = time();
        
            $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][$i]));
            $ImageType      = $_FILES['image']['type'][$i]; /*"image/png", image/jpeg etc.*/
         
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            
            $ret[$NewImageName]= $output_dir.$NewImageName;
            
            /* Try to create the directory if it does not exist */
			if (!file_exists($output_dir . $last_id))
			{
				@mkdir($output_dir . $last_id, 0777);
			}
                        
            move_uploaded_file($_FILES["image"]["tmp_name"][$i],$output_dir.$last_id."/".$NewImageName );
		    
             $insert_img = "insert into `documents` SET `u_id`='".$u_id."', `documents`='".$NewImageName."'";
              $result = mysqli_query($conn, $insert_img);
               }
    
        echo "Image Uploaded Successfully";
        ?>

<?php include_once "include/header.php"; ?>
	<section id="content">
		<div class="page_header text-center">
			<h2>Upload Your Documents</h2>
			
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
					<form method="POST" action="" enctype="multipart/form-data">
						<?php
							$query_email=mysqli_query($conn, "SELECT * FROM `user` WHERE u_id='$u_id'");
							$r=mysqli_fetch_array($query_email);
							$u_email=$r['u_email'];
						?>
						<h1 style="border-bottom: 1px solid black;">Education Details</h1>
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputCity">Please Upload All the required documents Like `Intermediate Result, Last Semester Result, Income Certificates`</label>
							  <input type="file" class="form-control" name="image[]" multiple required>
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