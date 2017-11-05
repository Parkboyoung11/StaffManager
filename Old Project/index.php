<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link type="text/css" rel="stylesheet" href="update.css">
</head>
<body>
<?php
	$database = mysqli_connect("localhost","root","Parkboyoung","StaffManager");
	if (!$database) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	session_start();
	if(isset($_SESSION['id'])) {
		header("Location: Staff/?id=".$_SESSION['id']);
	}else {
		if (isset($_POST['submit'])) {
			$sqlLogin = "SELECT * FROM Users where username='".$_POST['user']."' and password='".$_POST['pass']."'";
			$resultLogin = mysqli_query($database, $sqlLogin);			        
			if (mysqli_num_rows($resultLogin) > 0) {
				$row = mysqli_fetch_assoc($resultLogin);
				$_SESSION['id'] = $row["userID"];
				header("Location: Staff/?id=".$_SESSION['id']);
			}else {
				?>
				<div class="loginArea">
					<form action="index.php" method="POST">
						<div class="user">
							<label id="usernamelbl">Username</label>
							<input type="text" name="user" id="usernametxt"><br>
						</div>
						<div class="pass">
							<label id="passwordlbl">Password</label>
							<input type="password" name="pass" id="passwordtxt"><br>
						</div>
						<div class="login">
							<input type="submit" name="submit" value="Login" id="loginBtn">
						</div>
						<div class="error">
							<label>User or Password not correct! Please check again =)))</label>
						</div>										
					</form>
				</div>			
				<?php
			}
		}else {
			?>
			<div class="loginArea">
				<form action="index.php" method="POST">
					<div class="user">
						<label id="usernamelbl">Username</label>
						<input type="text" name="user" id="usernametxt"><br>
					</div>
					<div class="pass">
						<label id="passwordlbl">Password</label>
						<input type="password" name="pass" id="passwordtxt"><br>
					</div>
					<div class="login">
						<input type="submit" name="submit" value="Login" id="loginBtn">
					</div>										
				</form>
			</div>			
			<?php
		}		
	}
?>

