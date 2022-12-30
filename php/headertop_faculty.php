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
			<!--menu-->
					<ul>
						<?php if($user->getsession()){ ?>
							<li><a href="st_logout.php"> Logout</a></li>
							<li><a href="st_change_pass.php">Change Password</a></li>
							<li><a href="st_result.php">Result</a></li>
							<li><a href="st_profile.php"><?php echo $sid; ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</header>
		<div class="info container fix">
