<?php require_once('header.php') ?>

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
				<h4 class="breadcrumb-title">Dashboard</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Change Password</li>
				</ul>
			</div>	
			<!-- Change Passwor Card -->
			<div class="row">
                <div class="col-md-7">
                    <div class="card">
                       <div class="card-body">
                            <table class='table table'>
                                <tr>
                                    <td><strong>Name :</strong></td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email :</strong></td>
                                    <td>
                                        <?php echo $email; 
                                            if($email_status == 1){
                                                echo '&nbsp <i style="color:green" class="fas fa-check"></i>';
                                            }
                                            else{
                                                echo '&nbsp <i style="color:red" class="fas fa-times-circle"></i>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Mobile :</strong></td>
                                    <td>
                                        <?php echo $mobile; 
                                            if($mobile_status == 1){
                                                echo '&nbsp <i style="color:green" class="fas fa-check"></i>'; 
                                            }
                                            else{
                                                echo '&nbsp <i style="color:red" class="fas fa-times-circle"></i>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Father's Name :</strong></td>
                                    <td>
                                        <?php echo $father; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Father's Mobile : :</strong></td>
                                    <td>
                                        <?php echo $father_mobile; ?>
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td><strong>Mother's Name :</strong> </td>
                                    <td><?php echo $mother; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Gender :</strong> </td>
                                    <td><?php echo $gender; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Birth Day :</strong></td>
                                    <td><?php echo $birthday; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Address :</strong></td>
                                    <td><?php echo $address; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Roll :</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Current Class :</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Registration Date :</strong></td>
                                    <td><?php echo $regi_date; ?></td>
                                </tr>
                                <tr>
                                    <td><a href="edit-profile.php" class="btn">Edit Profile</a></td>
                                </tr>
                            </table>
                       </div>
                    </div>
                </div>
            </div>
				
				
		</div>
	</main>
	<div class="ttr-overlay"></div>

<?php require_once('footer.php');