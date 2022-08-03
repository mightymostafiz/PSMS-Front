<?php 
	require_once('header.php');
?>
<?php
    // Data show from database
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
    $photo = $result[0]['photo'];


	// Profile update
	if(isset($_POST['profile_update_btn'])){
		$name = $_POST['name'];
		$father_name = $_POST['father_name'];
		$father_mobile = $_POST['father_mobile'];
		$mother = $_POST['mother'];
		$gender = $_POST['gender'];
		$birthday = $_POST['birthday'];
		$address = $_POST['address'];
		$photo = $_FILES['photo'];
		$photo_name = $_FILES['photo']['name'];

		if(empty($father_name)){
			$error = "Please Enter Your Father's Name";
		}
		else if(empty($father_mobile)){
			$error = "Please Enter Your Father's Mobile Number";
		}
		else{

			if(!empty($photo_name)){

				$target_dir = "assets/images/students/";
				$target_file = $target_dir . basename($_FILES["photo"]["name"]);
				$extenstion = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				if($extenstion != 'png' AND $extenstion != 'jpg'){
					$error = "Profile Picture Must be 'PNG' or 'JPG' ";
				}
				else{
					$temp_name = $_FILES["photo"]["tmp_name"];
					$final_path = $target_dir. "user_id_" . $user_id. "." .$extenstion;
					move_uploaded_file($temp_name, $final_path);
				}
			}
			else{
				$final_path = Student('photo', $user_id);
			}
			$update = $pdo->prepare("UPDATE students SET name=?,father_name=?,father_mobile=?,mother=?,gender=?,birthday=?,address=?,photo=? WHERE id=?");
			$update->execute(array(
				$name,
				$father_name,
				$father_mobile,
				$mother,
				$gender,
				$birthday,
				$address,
				$final_path,
				$user_id
			));
			$success = "Update Profile Successfully Done!";
		}
	}

       
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
						<form class="edit-profile m-b30" method="POST" action="" enctype="multipart/form-data">
							<div class="">
							<!-- Error success alert -->
							<div class="form-group row">
							<div class="col-sm-9">
										<?php if(isset($error)) : ?>
										<div class="alert alert-danger">
											<?php echo $error; ?>
											
										</div>
										<?php endif; ?>
										<?php if(isset($success)) : ?>
										<div class="alert alert-success">
											<?php echo $success; ?>
											
										</div>
										<?php endif; ?>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Name :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="name" value="<?php echo $name; ?>" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Mobile :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="mobile" value="<?php echo $mobile; ?>" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Email :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="email" value="<?php echo $email; ?>"  readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Father's Name :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="father_name" value="<?php echo $father; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Father's Mobile :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="father_mobile" value="<?php echo $father_mobile; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Mother's Name :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="mother" value="<?php echo $mother; ?>">
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
										<input class="form-control" type="date"  name="birthday" birthday="<?php echo $birthday; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Address :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="address" value="<?php echo $address; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Registration :</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="regi_date" value="<?php echo $regi_date; ?>" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Profile Photo :</label>
									<div class="col-sm-7">
										<?php if($photo != null) : ?>
											<div class="profile-photo">
												<a href="<?php echo $photo; ?>" target="_blank"><img style="height: 100px;whidth:auto;" src="<?php echo $photo; ?>"></a>
											</div>
										<?php endif; ?>
										<mark><small>If you want to change this profile picture, Upload a new picture.</small></mark>
										<input class="form-control" type="file" name="photo">
									</div>
								</div>
							</div>
							<div class="">
								<div class="">
									<div class="row">
										<div class="col-sm-2">
										</div>
										<div class="col-sm-7">
											<button type="submit" name="profile_update_btn" class="btn">Save changes</button>
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