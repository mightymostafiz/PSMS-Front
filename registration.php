<?php 
require_once('config.php');

if(isset($_POST['st_submit'])){
	$st_name = $_POST['st_name'];
	$st_email = $_POST['st_email'];
	$st_mobile = $_POST['st_mobile'];
	$st_father = $_POST['st_father'];
	$st_father_mobile = $_POST['st_father_mobile'];
	$st_mother = $_POST['st_mother'];
	$st_gender = $_POST['st_gender'];
	$st_birthday = $_POST['st_birthday'];
	$st_address = $_POST['st_address'];
	$st_password = $_POST['st_password'];
}

	// mobile and email counter here!
    $countMobile = stRowCount('mobile',$mobile);
    $countEmail = stRowCount('email',$email);


	if(empty($st_name)){
		$error = 'Name is required!';
	}
	else if(empty($st_email)){
		$error = 'Email is required!';
	}
	else if(!filter_var($st_email, FILTER_VALIDATE_EMAIL)) {
		$error = "Email is not valied!;
	}
	else if(!filter_var($st_email, FILTER_VALIDATE_EMAIL)) {
		$error = "Email is not valied!;
	}
	else if($countEmail !=0 ){
      $error = "Email address have been used, please try another!";
    }
	else if(empty($st_mobile)){
		$error = "Mobile number is required!"
	}



?>



<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="PSMS- Students Resitration" />
	
	<!-- OG --> 
	<meta property="og:title" content="PSMS- Students Resitration" />
	<meta property="og:description" content="PSMS- Students Resitration" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>PSMS- Students Resitration</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
			<a href="index.php"><img src="assets/images/logo-white-2.png" alt=""></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Student <span>registration</span></h2>
					<p>Login Your Account <a href="login.php">Click here</a></p>
				</div>	
				<form class="contact-bx" method="POST" action="">
					<?php if(isset($error)): ?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
					<?php endif; ?>
					<?php if(isset($success)): ?>
						<div class="alert alert-success">
							<?php echo $error; ?>
						</div>
					<?php endif; ?>
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Student Name</label>
									<input name="st_name" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Email Address</label>
									<input name="st_email" type="email" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Mobile</label>
									<input name="st_mobile" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Father's Name</label>
									<input name="st_father" type="email" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Fathers's Mobile</label>
									<input name="st_father_mobile" type="email" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Mother's Name</label>
									<input name="st_mother" type="email" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Gender</label>
								<br>
								<label><input type="radio" id="" name="st_gender" value="male" checked> Male</label>
								<label><input type="radio" id="" name="st_gender" value="female"> Female</label>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Birthday</label>
								<input name="st_birthday" type="date" class="form-control">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
							<div class="input-group"> 
									<label>Address</label>
									<input name="st_address" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Your Password</label>
									<input name="st_password" type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="st_submit" type="submit" value="Submit" class="btn button-md st_submit_btn">Sign Up</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/contact.js"></script>
</body>

</html>