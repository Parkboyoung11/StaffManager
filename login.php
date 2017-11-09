<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="Views/Style/style-login.css">
</head>
<?php
	session_start();
	include('Helper/config.php');
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$passwordraw = $_POST['password'];
		$password = md5($passwordraw);
		$sql = "select * from Users where username='$username' and password='$password'";
		$result = mysqli_query($database, $sql);
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		if($count > 0 && !$row['isDeteleFlag']){				
			$_SESSION['userIDLogin'] = $row['userID'];
			if (!$row['isFirstLogin']) {
				$sql = "SELECT FullName FROM UsersDetail WHERE udID='$row[userID]'";
				$result = mysqli_query($database, $sql);
				$row = mysqli_fetch_assoc($result);
				if($row['FullName'] == NULL) {
					$_SESSION['FullName'] = "Anonymous";
				}else {
					$_SESSION['FullName'] = $row['FullName'];
				}
				header('location:index.php');
			}else {
				header('location:UpdateProfile.php?isFirstLogin=true');
			}			
		}elseif ($count > 0) {
			echo '<script>alert("Your account is disabale!");</script>';
		}else{
			echo '<script>alert("Your account not correct. Please sign in again!");</script>';
			// header('location:login.php');
		}
	}
?>
<body>
	<div id="login">
		<form action="login.php" method="post" enctype="multipart/form-data">
			<h2 style="color: #FC0000">Welcome You!</h2>
			<input type="text" name="username" id="username" placeholder="Enter username..." required="required" />
			<input type="password" name="password" id="password" placeholder="Enter password..." required="required" />
			<input type="submit" name="login" id="button" value="Sign in"/>
		</form>
	</div>
</div>
</body>
</html>