<!DOCTYPE html>
<html>
	<head>
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
$pageTitle = "Student Result";
include "php/headertop_admin.php";
?>
<div>
	<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:gray">View Attendance</h3>
	<div style="background:#ddd;padding:20px;">
		<span style="float:right;"> <button style="background:gray;border:none;color:#fff;padding:10px;"><a style="color:#fff;" href="class_att_fc.php">Take Attendance</a></button></span>
	</div>
	<div class="container">
		<table>
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;"> Attendance Date</th>
				<th style="text-align:center;">Action</th>	
			</tr>
			<?php 
			$i=0;
				$get_date = $user->get_attn_date();
				
				while($rows = $get_date->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['at_date'];?></td>
				<td><a href="att_single_view_fc.php?dt=<?php echo $rows['at_date']; ?>">View Attendance</a></td>

			</tr>
		<?php } ?>
	</table>
</div>
