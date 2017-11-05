<!DOCTYPE html>
<html>
	<head>
		<title>Update Profile</title>
		<link rel="stylesheet" type="text/css" href="Views/Style/update.css">
	</head>
	<?php
		session_start();
		if(!isset($_SESSION['userIDLogin'])){
			header('location:login.php');
		}
		if (isset($_POST['update'])) {			
			$fullName=$_POST['fullName'];
			$birthday=$_POST['birthday'];
			$address=$_POST['address'];
			$avatar=$_POST['avatar'];
			$gender=$_POST['gender'];
			include('Helper/config.php');
			$sqlUpdate = "update UsersDetail set FullName='$fullName', Birthday='$birthday', Address='$address', Avatar='$avatar', Gender='$gender' where udID='$_SESSION[userIDLogin]'";						
			if(mysqli_query($database, $sqlUpdate)) {
				if (isset($_POST['newpass'])) {
					$passEncoded = md5($_POST['newpass']);
					$sqlUpdateUser = "UPDATE Users set isFirstLogin='0', isResetFlag='0', password='$passEncoded' where userID='$_SESSION[userIDLogin]'";
				}else {
					$sqlUpdateUser = "UPDATE Users set isFirstLogin='0', isResetFlag='0' where userID='$_SESSION[userIDLogin]'";
				}				
				if(mysqli_query($database, $sqlUpdateUser)){
					$_SESSION['FullName'] = $fullName;
					header('location:index.php');
				}				
			}
		}
	?>
	<body>
		<div class="content">
			<form action="UpdateProfile.php" method="post" enctype="multipart/form-data">
				<table width="598" border="1">
					<tr>
						<td colspan="2" class="labelUpdate">Update Your Profile</td>
					</tr>
					<tr>
						<td class="rowLabel">Full Name</td>
						<td><input type="text" name="fullName" class="rowWrite" value="<?php echo $_GET['fullName'] ?>"></td>
					</tr>
					<tr>
						<td class="rowLabel">Birthday</td>
						<td><input type="text" name="birthday" class="rowWrite" value="<?php echo $_GET['birthday'] ?>"></td>
					</tr>
					<tr>
						<td class="rowLabel">Address</td>
						<td><input type="text" name="address" class="rowWrite" value="<?php echo $_GET['address'] ?>"></td>
					</tr>
					<tr>
						<td class="rowLabel">Avatar</td>
						<td><input type="text" name="avatar" class="rowWrite" value="<?php echo $_GET['avatar'] ?>"></td>
					</tr>
					<tr>
						<td class="rowLabel">Gender</td>						
						<td><input type="text" name="gender" class="rowWrite" value="<?php echo $_GET['gender'] ?>"></td>
					</tr>
					<?php
						if ((isset($_GET['reset']) && $_GET['reset'] == "1") || (isset($_GET['isFirstLogin']) && $_GET['isFirstLogin'] == "true")) {
							echo "<tr>";
							echo "<td class=\"rowLabel\" style=\"color: red\">New Password</td>"	;					
							echo "<td><input type=\"password\" name=\"newpass\" class=\"rowWrite\"></td>";
							echo "</tr>";
						}
					?>
					<tr>
						<td colspan="2"><div align="center">
							<input type="submit" name="update" value="Update" id="update">
						</div></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>