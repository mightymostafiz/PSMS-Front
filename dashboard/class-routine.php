<?php  
require_once('header.php');


// Current class
    $current_class_status = Student('current_class',$_SESSION['st_loggedin'][0]['id']);
    echo $current_class_status;

    if($current_class_status !=null){
        $current_date = date('Y-m-d');
        $stm = $pdo->prepare("SELECT * FROM class WHERE start_date <=? AND end_date >=? AND id=?");
        $stm->execute(array($current_date,$current_date,$current_class_status));
        $classCount = $stm->rowCount();
    }
    else{
        $classCount = 0;
    }

?>

<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Class Routine</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li>Class Routine</li>
            </ul>
        </div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
                    <!-- Class routine -->
						<div class="wc-title">
                        <h4>Class Routine</h4>
						</div>

                    <?php if($classCount == 1) :?>
                    <?php 
                        $stm = $pdo->prepare("SELECT class.class_name,subjects.name as subject_name,subjects.code as subject_code,teachers.name as teacher_name,class_routine.time_from,class_routine.time_to,class_routine.day,class_routine.room_no
                        FROM class_routine 
                        INNER JOIN class ON class_routine.class_name=class.id
                        INNER JOIN subjects ON class_routine.subject_id=subjects.id
                        INNER JOIN teachers ON class_routine.teacher_id=teachers.id
                        WHERE class_routine.class_name=?");
                        $stm->execute(array($current_class_status));
                        $routineList = $stm->fetchAll(PDO::FETCH_ASSOC);

                    ?>

                    <!-- If register here is clas routine	 -->
                    <div class="widget-inner">
                        <div class="edit-profile m-b30">
                            <div class="table-responsive table-bordered"> 
                                <table class="table">
                                    <!-- alert -->
                                    <?php if(isset($error)): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $error; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($success)): ?>
                                        <div class="alert alert-success">
                                            <?php echo $success; ?>
                                        </div>
                                    <?php endif; ?>

                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Class Name</th>
                                            <th class="text-center">Subject Name</th>
                                            <th class="text-center">Teacher Name</th>
                                            <th class="text-center">Day</th>
                                            <th class="text-center">Start Time</th>
                                            <th class="text-center">End Time</th>
                                            <th class="text-center">Room No</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $i=1;
                                        foreach($routineList as $list):
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i;$i++; ?></td>
                                            <td class="text-center"><?php echo $list['class_name'];?></td>
                                            <td class="text-center"><?php echo $list['subject_name'];?></td>
                                            <td class="text-center"><?php echo $list['teacher_name'];?></td>
                                            <td class="text-center"><?php echo $list['day'];?></td>
                                            <td class="text-center"><?php echo $list['time_from'];?></td>
                                            <td class="text-center"><?php echo $list['time_to'];?></td>
                                            <td class="text-center"><?php echo $list['room_no'];?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="alert alert-danger text-center">
                            Please Frist Register a Class, Than You will get the Class Routine.
                        </div>
                    <?php endif; ?>
                </div>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>
<?php require_once('footer.php');