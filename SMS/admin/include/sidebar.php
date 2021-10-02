
<?php
// session_start();
if($_SESSION['admin_id'] == 1) {
?>
<div id="nav-col">
	<section id="col-left" class="col-left-nano">
		<div id="col-left-inner" class="col-left-nano-content">
			<div id="user-left-box" class="clearfix hidden-sm hidden-xs">
				<img alt="" src="images/admin.png" />
				<div class="user-box">
					<span class="name">
						Admin
					</span>
					<span class="status">
						<i class="fa fa-circle"></i> Online
					</span>
				</div>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">	
				<ul class="nav nav-pills nav-stacked">
					<li class="active">
						<a href="index.php">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>
					
					<li>
						<a href="contact_detail.php">
							<i class="fa  fa-envelope"></i>
							<span>Contact Us</span>
						</a>
					</li>
					<li>
						<a href="reg_user.php">
							<i class="fa  fa-bitbucket-square"></i>
							<span>Register User</span>
						</a>
					</li>
					<li>
						<a href="degree_program.php">
							<i class="fa  fa-align-justify"></i>
							<span>Degree Programs</span>
						</a>
					</li>
					<li>
						<a href="scholarship.php">
							<i class="fa fa-shopping-cart"></i>
							<span>Scholorships</span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-th-large"></i>
							<span>Scholorships History</span>
							<i class="fa fa-chevron-circle-right drop-icon"></i>
						</a>
						<ul class="submenu">
							<li>
								<a href="approved.php">
									Approved Applications
								</a>
							</li>
							<li>
								<a href="cancelled.php">
									Rejected Applications
								</a>
							</li>
							<li>
								<a href="pendingApp.php">
									Pending Applications
								</a>
							</li>
						</ul>
					</li>
					<!-- <li>
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-th-large"></i>
							<span>Gallery</span>
							<i class="fa fa-chevron-circle-right drop-icon"></i>
						</a>
						<ul class="submenu">
							<li>
								<a href="gallery.php">
									Gallery
								</a>
							</li>
							<li>
								<a href="edit_gallery.php">
									Edit Gallery
								</a>
							</li>
						</ul>
					</li> -->
					<!-- <li>
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-table"></i>
							<span>Orders details</span>
							<i class="fa fa-chevron-circle-right drop-icon"></i>
						</a>
						<ul class="submenu">
							<li>
								<a href="order.php">
									Orders
								</a>
							</li>
							<li>
								<a href="user_detail.php">
									User Details
								</a>
							</li>
							<li>
								<a href="payment_detail.php">
									Payment Details
								</a>
							</li>
						</ul>
					</li> -->
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-file-text-o"></i>
							<span>Pages</span>
							<i class="fa fa-chevron-circle-right drop-icon"></i>
						</a>
						<ul class="submenu">
							<li>
								<a href="about.php">
									<span>About Us</span>
								</a>
							</li>
							<li>
								<a href="terms_of_use.php">
									Terms and Condition
								</a>
							</li>
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</section>
</div>
<?php } elseif($_SESSION['admin_id'] == 2) { ?>
<div id="nav-col">
	<section id="col-left" class="col-left-nano">
		<div id="col-left-inner" class="col-left-nano-content">
			<div id="user-left-box" class="clearfix hidden-sm hidden-xs">
				<img alt="" src="images/comm.jpg" />
				<div class="user-box">
					<span class="name">
						Commitee
					</span>
					<span class="status">
						<i class="fa fa-circle"></i> Online
					</span>
				</div>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">	
				<ul class="nav nav-pills nav-stacked">
					<li class="active">
						<a href="index.php">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>
					
					<!-- <li>
						<a href="contact_detail.php">
							<i class="fa  fa-envelope"></i>
							<span>Contact Us</span>
						</a>
					</li> -->
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-table"></i>
							<span>Scholorships details</span>
							<i class="fa fa-chevron-circle-right drop-icon"></i>
						</a>
						<ul class="submenu">
							<li>
								<a href="record.php">
									Applications
								</a>
							</li>
							<li>
								<a href="user_detail.php">
									Students Details
								</a>
							</li>
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</section>
</div>
<?php } ?>