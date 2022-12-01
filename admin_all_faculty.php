<!DOCTYPE html>
<html>
	<head>
		<style>
			table, th, td {
  				border: 1px solid black;
  				border-collapse: collapse;
			}
			table.center {
  				margin-left: auto; 
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
	ob_start ();
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
<?php 
$pageTitle = "All Faculty details";
include "php/headertop_admin.php";
?>
<div>
	<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:gray">Faculty List</h3>
	<div style="background:#ddd;padding:20px;">
		<span style="float:right;"><button style="background:gray;border:none;color:#fff;padding:10px;"><a style="color:#fff;" href="admin.php">Back</a></button></span>
	</div>
	<div>
		<div style="text-align:center">
			<h3>All Registered Faculty List</h3>
		</div>
	</div>
	<div class="container">
	<table >
		<tr>
				<th>SL</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Education</th>
				<th>Address</th>
				<th>Birthday</th>
			</tr>
			<?php 
			$i=0;
				$alluser =$user->get_faculty();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr style="text-align:center">
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['contact'];?></td>
				<td><?php echo $rows['education'];?></td>
				<td><?php echo $rows['address'];?></td>
				<td><?php echo $rows['birthday'];?></td>
				
			</tr>
			<?php } ?>
		</table>
</div>
