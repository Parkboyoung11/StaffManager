<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="../Views/Style/style-login.css">
</head>
<?php
	session_start();
	include('../Helper/config.php');

	if(isset($_POST['changepass'])) {
		$sqlChangePass = "UPDATE Admin SET isFirstLogin='0', password=$_POST[adpass] WHERE adminID='$_GET[adid]'";
		mysqli_query($database, $sqlChangePass);
		header('location:index.php');
		exit();
	}

	if(isset($_SESSION['dangnhap'])) {
		header('location:index.php');
	}

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$passwordRaw = $_POST['password'];
		$password = sha1($passwordRaw);
		$sql = "SELECT * from Admin where username='$username' and password='$password' limit 1 ";
		$row = mysqli_query($database, $sql);
		$eachrow = mysqli_fetch_array($row);
		$count = mysqli_num_rows($row);

		if($count > 0){
			$_SESSION['dangnhap'] = $username;
			if ($eachrow['isFirstLogin'] == "1") {				
					echo "<body>";
					echo '<div style="padding: 100px; margin: auto; width: 300px; font-size:25px;">';
					echo '<div style="color: red;text-align: center">Please change your Password</div>';
					echo '<div style="height:10px">&nbsp;</div>';
					echo "<div>";
					echo '<form action="?adid='.$eachrow['adminID'].'" method="post" enctype="multipart/form-data">';
					echo '<input type="password" name="adpass" style="width:200px; height: 25px; padding:0px 5px; font-size:20px"  required="required">';
					echo '<input type="submit" name="changepass" style="width:80px; height: 30px; float:right; font-size:20px;">';
					echo "</form>";
					echo "</div>";
					echo "</div>";
					echo "</body>";
					exit();
			}else {
				header('location:index.php');
			}			
		}else {
			echo '<script>alert("User or Password not correct. Try again.");</script>';
			// header('location:login.php');
		}
	}
?>
<body>
	<div id="login">
		<form action="login.php" method="post" enctype="multipart/form-data">
			<h2>Admin Login</h2>
			<input type="text" name="username" id="username" placeholder="Enter username..." required="required" />
			<input type="password" name="password" id="password" placeholder="Enter password..." required="required" />
			<input type="submit" name="login" id="button" value="Sign in"/>
		</form>
	</div>
</div>
</body>
</html>