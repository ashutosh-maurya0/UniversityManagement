<!DOCTYPE html>
<html>
    <head>
        <title>Christ University Home</title>
		<link rel="stylesheet" href="css/main.css">
    </head>
    <body>
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
			<!--menu student login-->
			<ul>
			<!--When student will login-->
				<?php if($user->getsession()){ ?>
					<div style="float:left">
						<li><a href="view_single_result.php?vr=<?php echo $sid?>&vn=<?php echo $sname?>">Result</a></li>
						<li><a href="st_change_pass.php">Change Password</a></li>
					</div>
					<div style="float:right">
						<li ><a href="st_logout.php">Logout</a></li>
						<li><a href="st_profile.php"><?php echo $sid; ?></a></li>
				<?php } ?>
				<!--when faculty will login-->
				<?php if($user->get_faculty_session()){ ?>
					<li><a href="class_att_fc.php">Attendance</a></li>
					<div style="float:right">
						<li><a href="facultylogout.php">Logout</a></li>
						<li><a href="fct_single_profile.php"> <?php echo $fname;?></a></li>
					</div>
				<?php } ?>
			</ul>
		</div>
	</body>
</html>