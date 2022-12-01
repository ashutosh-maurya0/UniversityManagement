<!DOCTYPE html>
<html>
    <head>
        <title>Christ University Home</title>
		<link rel="stylesheet" href="css/main.css">
    </head>
	<body>
		<?php
			session_start();
			require "php/config.php";
			require_once "php/functions.php";
			$user = new login_registration_class();
			$admin_id = $_SESSION['admin_id'];
			$admin_name = $_SESSION['admin_name'];
			if(!$user->get_admin_session()){
			header('Location: index.php');
				exit();
			}
		?>
		<!--Header-->
		<div >
		<div class="div">
        	<div class="div1">
			<div id = "leftbox">
			        <img src="img/logo.jpg" alt="Nature" class="responsive">
                </div>
				<div id = "middlebox">
                    <h1>Christ University</h1>
			    </div>
				<div id = "rightbox">
                    <p><?php echo " ".date("d M Y");  echo "  " . date("h:i:sa");?></p>
			    </div>
			</div>.
			<!--Menu-->
			<ul>
				<li>
					<a href="admin.php">Home</a>
				</li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Student</a>
					<div class="dropdown-content">
						<a href="admin_all_student.php">View All Student</a>
						<a href="st_result.php">Student Result</a>
						<a href="class_att.php">Attendance</a>
					</div>
					</li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Faculty</a>
					<div class="dropdown-content">
						<a href="admin_all_faculty.php">Faculty Details</a>
					</div>
				</li> 
				<div style="float:right">
				<?php 
					if($user->get_admin_session()){ ?>
						<li><a href="admin_logout.php">Logout</a></li>
						<li><a href="admin.php"><?php echo $admin_name; ?></a></li>
					<?php } ?> 
				</div>	
			</ul>	
		</div>
	</body>
</html>
