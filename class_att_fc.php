<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/main.c">
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
$pageTitle = "All student details";
include "php/headertop.php";
?>
<div>
	<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:gray"> Take Attendance</h3>
	<div style="background:#ddd;padding:20px;">
		<span style="text-align:center;"><a style="color:#fff;" href="att_view_fc.php"> <button style="background:gray;border:none;color:#fff;padding:10px;">View Attendance</button></a></span>
	</div>
	<?php
		if(isset($_REQUEST['res'])){
			echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Data deleted successfully !</h3>";
		}
	?>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$cur_date = $_POST['attndate'];
			$atten = $_POST['attn'];
			$res = $user->insertattn($cur_date,$atten);
			if($res){
				echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Attendance data successfully inserted!</h3>";
			}else{
				echo  "<p style='color:red;text-align:center'>Failed to insert data</p>";
			}
		}
	?>
	<form action="" method="post">
		<p style="text-align:center;color:#34495e;">
			<mark style="background:gray;color:black">Select date: <input type="date" name="attndate" required/></mark>
		</p>
		<table style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Name</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Attendance</th>				
			</tr>
			<?php 
				$i=0;
				$alluser = $user->attn_student();
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="absent" checked/>Absent</label>
					
					<label style="color:green;font-size:20px"> <input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="present" />Present</label>
				</td>
			</tr>
			<?php } ?>
		</table>
		<span style="margin-left:0%;padding-top:-10%"><input style="<text-align:right></text-align:right>;background:gray;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Submit" /></span>
	</form>	
</div>