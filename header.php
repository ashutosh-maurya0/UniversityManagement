<!DOCTYPE html>
<html>
    <head>
        <title>Christ University Home</title>
        <link rel="stylesheet" type="text/css"  href="css/main.css">
    </head>
    <body>
        <div class="div">
            <div class="div1">
				<!--logo of christ-->
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
			<!--menu-->
			<ul> 
  				<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Administrator</a>
					<div class="dropdown-content">
						<a href="index.php">Administrator Login</a>
					</div>
				</li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Faculty Login</a>
					<div class="dropdown-content">
						<a href="facultylogin.php">Login</a>
						<a href="fct_single_profile.php">Profile</a>
						<a href="class_att.php">Class Attendance</a>
					</div>
				</li>
  				<li class="dropdown">
    				<a href="javascript:void(0)" class="dropbtn">Student</a>
    				<div class="dropdown-content">
						<a href="st_login.php"> Login</a>
						<a href="st_reg.php"> Register</a>
						<a href="st_profile.php">Profile</a>
						<a href="#"> Result</a>
    				</div>
  				</li>
			</ul>
		</div>
	</body>
</html