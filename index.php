<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->get_admin_session()){
	header('Location: admin.php');
	exit();
}
?>

<?php
	$pageTitle = "Admin Login";
?>
<!--logo university name and time-->
<?php include "header.php"; ?>
	<div>
		<img src="img/logo.jpeg" alt="" />
		<div>
			<h3>Admin login</h3>
		</div>
		<div>
			<!--Here we are geting user id and password from user using POST method-->
			<!--PHP $_POST is a PHP super global variable which is used to collect form-->
			<!--data after submitting an HTML form with method="post". $_POST is also widely--> 
			<!--used to pass variables.-->
			<form action="" method="post">
				<input type="text" name="username" placeholder="username" />
				<input type="password" name="password" placeholder="password" />
				<input type="submit" value="Login" />
			</form>
			<?php
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					$username = $_POST['username'];
					$password = $_POST['password'];
					// if user tries to login without user id or password or either one of it
					if(empty($username) or empty($password)){
							echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
					}else{
						/* md5 hash is used for hashing the password so that no one can see
						 * the password not even the person who have access of database (copied from internet)
						 */
						/* MySQL MD5() Calculates an MD5 128-bit checksum for a string.
						 * The value is returned as a binary string of 32 hex digits,
						 * or NULL if the argument was NULL. The return value can, for
						 * example, be used as a hash key.
						 */
						$password = md5($password);
						$login = $user->admin_userlogin($username, $password);
						if($login){
							header('Location: admin.php');
						}
						else{
							echo "<p style='color:red;text-align:center'>Incorrect username or password</p>";
						}
					}
				}
			?>
		</div>
	</div>