<!DOCTYPE html>
<html>
	<head>
		<title>Faculty Profile</title>
		<style>
			table, th, td {
  				border: 1px solid black;
  				border-collapse: collapse;
			}
			table.center {
  				margin-left: 37%; 
  				margin-right: auto;
			}
			.container {
  				width: auto;
  				height: auto;
  				margin: 50px;
				display: flex;
  				justify-content: center;
			}
		</style>
	</head>

<?php
	ob_start();
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$fid = $_SESSION['f_id'];
	$funame = $_SESSION['f_uname'];
	$fname = $_SESSION['f_name'];
	if(!$user->get_faculty_session()){
		header('Location: facultylogin.php');
		exit();
	}
?>	
<?php
	include "php/headertop.php";
?>
<body>
	<div >
		<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:gray">Welcome : <?php echo $funame; ?></h3>
	</div>
	<div>
		<div>
			<h2>Details</h2>
		</div>
		<form>
			<?php
				$getuser = $user->get_faculty_by_username($funame);
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
			<table>
			<tr>
				<td  style="text-align:center">Name: </td>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">Username: </td>
				<td><?php echo $row['username']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">E-mail: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">Birthday: </td>
				<td><?php echo $row['birthday']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">Education: </td>
				<td><?php echo $row['education']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">Contact: </td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">Gender: </td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">Address: </td>
				<td><?php echo $row['address']; ?></td>
			</tr>
			<?php if($row['username'] == $funame){ ?>
			
			<?php } } ?>
			</table>
		</div>
	</div>