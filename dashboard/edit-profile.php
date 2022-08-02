<?php 
	require_once('header.php');
?>
<?php
    
    $user_id = $_SESSION['st_loggedin'][0]['id'];

    $stm = $pdo->prepare("SELECT * FROM students WHERE id=?");
    $stm->execute(array($user_id));
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    $name = $result[0]['name'];
    $email = $result[0]['email'];
    $email_status = $result[0]['is_email_verified'];
    $mobile = $result[0]['mobile'];
    $mobile_status = $result[0]['is_mobile_verified'];
    $father = $result[0]['father_name'];
    $father_mobile = $result[0]['father_mobile'];
    $mother = $result[0]['mother'];
    $gender = $result[0]['gender'];
    $birthday = $result[0]['birthday'];
    $address = $result[0]['address'];
    $regi_date = $result[0]['registration_date'];

       
?>

<!--Main container start -->
<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Update Profile</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
				<li>Update Profile</li>
			</ul>
		</div>	
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<h4>Update Profile</h4>
					</div>
					<div class="widget-inner">
						<form class="edit-profile m-b30">
							<div class="">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Name :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" value="<?php echo $name; ?>" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Mobile :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" value="<?php echo $mobile; ?>" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Email :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" value="<?php echo $email; ?>"  readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Father's Name :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" value="<?php echo $father; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Father's Mobile :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" value="<?php echo $father_mobile; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Mother's Name :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" value="<?php echo $mother; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Gender :</label>
									<div class="col-sm-7">
										<label><input
										<?php 
											if($gender == 'male'){echo 'checked';}
										?>
										type="radio" value="male" name="gender"> Male</label><br>
										<label><input 
										<?php 
											if($gender == 'female'){echo 'checked';}
										?>
										type="radio" value="female" name="gender"> Female</label>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Birthday :</label>
									<div class="col-sm-7">
										<input class="form-control" type="date" value="<?php echo $birthday; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Address :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" value="<?php echo $address; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Registration :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" value="<?php echo $regi_date; ?>" readonly>
									</div>
								</div>
							</div>
							<div class="">
								<div class="">
									<div class="row">
										<div class="col-sm-2">
										</div>
										<div class="col-sm-7">
											<button type="reset" class="btn">Save changes</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Your Profile Views Chart END-->
		</div>
	</div>
</main>
<div class="ttr-overlay"></div>

<?php require_once('footer.php');