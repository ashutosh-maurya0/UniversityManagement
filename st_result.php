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
	<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:gray">Result</h3>
	<div style="background:#ddd;padding:20px;">
		<span style="float:right;"><button style="background:gray;border:none;color:#fff;padding:10px;"><a style="color:#fff;" href="admin.php">Back</a></button></span>
	</div>
<div class="container">
	<table>
		<tr>
			<th style="text-align:center;">SL</th>
			<th style="text-align:center;">Name</th>
			<th style="text-align:center;">ID</th>
			<th style="text-align:center;">Add Result</th>
			<th style="text-align:center;">view Result</th>
		</tr>
		<?php 
		$i=0;
			$alluser = $user->get_all_student();
			
			while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $rows['name'];?></td>
			<td><?php echo $rows['st_id'];?></td>
			<td><a href="add_result.php?ar=<?php echo $rows['st_id']; ?>&vn=<?php echo $rows['name'];?>">Add Result</a></td>
			<td><a href="view_result.php?vr=<?php echo $rows['st_id']; ?>&vn=<?php echo $rows['name'];?>">View Result</a></td>
		</tr>
		<?php } ?>
	</table>
</div>
