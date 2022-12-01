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
	if(isset($_REQUEST['ar'])){
		$stid = $_REQUEST['ar'];
		$name = $_REQUEST['vn'];
	}
?>	
<?php 
$pageTitle = "Student Result";
include "php/headertop_admin.php";
?>
<div>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$subject = $_POST['subject'];
				$semester = $_POST['semester'];
				$marks = $_POST['marks'];
				$res = $user->add_marks($stid,$subject,$semester,$marks);
				if($res){
					echo "<h3 style='color:gray;margin:0;padding:0;text-align:center'>Marks successfully inserted!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Failed to insert data</p>";
				}
			}
		
		//SELECT avg(marks) as sgpa from result where st_id=10 and semester="1sr"
		?>
	<div>
		<p style="text-align:center;color:#fff;background:gray;margin:0;padding:8px;"><?php echo "Name: ".$name."<br>Student ID: " . $stid; ?></p>
	</div>	
	<div style="width:40%;margin:50px auto;margin-left:40%">
		<table style="text-align:center;">
			<form action="" method="post">
				<table>
					<tr>
						<td>Select Subject: </td>
						<td>
							<select name="subject" id="">
								<option value="DBMS">Database management</option>
								<option value="DBMS Lab">DBMS Lab</option>
								<option value="Mathematics">Mathematics</option>
								<option value="DSA">DSA</option>
								<option value="DSA Lab">DSA Lab</option>
								<option value="English">English</option>
								<option value="Physics">Physics</option>
								<option value="Chemistry">Chemistry</option>
								<option value="Holistic Education">Holistic Education</option>
								<option value="Digital System">Digital System</option>
								<option value="Software Engineering">Software Engineering</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Select Semester: </td>
						<td>
						<select name="semester" id="">
							<option value="1st">1st semester</option>
							<option value="2nd">2nd semester</option>
							<option value="3rd">3rd semester</option>
							<option value="4th">4th semester</option>
							<option value="5th">5th semester</option>
							<option value="6th">6th semester</option>
							<option value="7th">7th semester</option>
							<option value="8th">8th semester</option>
							<option value="9th">9th semester</option>
							<option value="10th">10th semester</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>Input marks: </td>
						<td><input type="text" name="marks" placeholder="enter marks" required /></td>
					</tr>
					<tr>
						<td><input type="submit" name="sub" value="Add marks" /></td>
						<td><input type="reset" /></td>
					</tr>
				</table>	
			</form>
		</table>
	</div>
		<div>
			<p style="text-align:center"><a href="st_result.php"><button class="editbtn">Back to list</button></a></p>
		</div>
</div>