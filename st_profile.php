<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];
	if(!$user->getsession()){
		header('Location: st_login.php');
		exit();
	}
?>	
<?php 
	$pageTitle = "Student Profile";
	include "php/headertop.php";
?>
<div>
	<p style="font-size:18px;text-align:center;background:gray;color:#fff;padding:10px;margin:0">Welcome : <?php $user->getusername($sid); ?> <i aria-hidden="true"></i></p>
		<div>
		<?php
				$getuser = $user->getuserbyid($sid);
				while($row = $getuser->fetch_assoc()){
			?>
			<tr>
				<td></td>
				<?php if(empty($row['img'])){?>
					<td><img src="img/logo.jpg" style=" border:1px gray solid;border-radius:90px" alt="" /></td>
				<?php }
				else{ ?>
					<td><img src="img/student/<?php echo $row['img']; ?>" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }?>
			</tr>
		<table style="margin-left:42%;">
			<tr >
				<td>Student ID: </td>
				<td><?php echo $row['st_id']; ?></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<td>E-mail: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>Birthday: </td>
				<td><?php echo $row['bday']; ?></td>
			</tr>
			<tr>
				<td>Program: </td>
				<td><?php echo $row['program']; ?></td>
			</tr>
			<tr>
				<td>Contact: </td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
			<tr>
				<td>Gender: </td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><?php echo $row['address']; ?></td>
			</tr>
			<?php if($row['st_id'] == $sid){ ?>
			<tr>
				<td>Update Profile: </td>
				<td><a href="st_update.php?id=<?php echo $row['st_id'];?>"><button class="editbtn">Edit Profile</button></a></td>
			</tr>
			<?php } } ?>
		</table>
</div>
