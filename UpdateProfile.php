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
			$gender=$_POST['gender'];



			$avatar = $_FILES['avatar']['name'];
			$avatarTmp = $_FILES['avatar']['tmp_name'];
			$explode = explode('.',$avatar);
			$ext = end($explode);
			$allow = array('jpeg','jpg','png','bmp');
			$pathAvatar = 'imgs/Avatar/'.$_SESSION[userIDLogin].'.png';
							
			if(!empty($avatarTmp) && in_array($ext, $allow) && move_uploaded_file($avatarTmp, $pathAvatar)){
				$sqlUpdate = "UPDATE UsersDetail set FullName='$fullName', Birthday='$birthday', Address='$address', Avatar='$pathAvatar', Gender='$gender' where udID='$_SESSION[userIDLogin]'";
			}else {
				$sqlUpdate = "UPDATE UsersDetail set FullName='$fullName', Birthday='$birthday', Address='$address', Gender='$gender' where udID='$_SESSION[userIDLogin]'";
			}

			include('Helper/config.php');

			if(mysqli_query($database, $sqlUpdate)) {
				if (isset($_POST['newpass'])) {
					$passEncoded = md5($_POST['newpass']);
					$sqlUpdateUser = "UPDATE Users set isFirstLogin='0', isResetFlag='0', password='$passEncoded', updated=CURDATE() where userID='$_SESSION[userIDLogin]'";
				}else {
					$sqlUpdateUser = "UPDATE Users set isFirstLogin='0', isResetFlag='0', updated=CURDATE() where userID='$_SESSION[userIDLogin]'";
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
						<td><input type="date" name="birthday" class="rowWrite" value="<?php echo $_GET['birthday'] ?>"></td>
					</tr>
					<tr>
						<td class="rowLabel">Address</td>
						<td><input type="text" name="address" class="rowWrite" value="<?php echo $_GET['address'] ?>"></td>
					</tr>
					<tr>
						<td class="rowLabel">Avatar</td>
						<td><input type="file" name="avatar" class="rowWrite"></td>
					</tr>
					<tr>
						<td class="rowLabel">Gender</td>						
						<td>
							<?php
					          if ($_GET['gender']) {
					            echo '<strong style="font-size:20px">&nbsp;Male</strong> <input type="radio" name="gender" value="1" checked="checked" style="width: 5%">';
					            echo '<strong style="font-size:20px">&nbsp;&nbsp;&nbsp;Female</strong> <input type="radio" name="gender" value="0" style="width: 5%">';
					          }else {
					            echo '<strong style="font-size:20px">&nbsp;Male</strong> <input type="radio" name="gender" value="1" style="width: 5%">';
					            echo '<strong style="font-size:20px">&nbsp;&nbsp;&nbsp;Female</strong> <input type="radio" name="gender" value="0" checked="checked" style="width: 5%">';
					          }
					        ?>
						</td>
					</tr>
					<?php
						if ((isset($_GET['reset']) && $_GET['reset'] == "1") || (isset($_GET['isFirstLogin']) && $_GET['isFirstLogin'] == "true")) {
							echo "<tr>";
							echo "<td class=\"rowLabel\" style=\"color: red\">New Password</td>"	;					
							echo "<td><input type=\"password\" name=\"newpass\" class=\"rowWrite\" required=\"required\"></td>";
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