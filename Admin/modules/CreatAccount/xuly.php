<?php 
	include('../../../Helper/config.php');

	$userID = $_POST['userID'];
	$username = $_POST['username'];
	$rawpass = "boyoung";
	$password = md5($rawpass);
	$email = $_POST['email'];
	$departmentID = $_POST['department'];
	$isManager = $_POST['position'];	

	if(isset($_POST['creat'])){
		$sqlAddUsers = "insert into Users(userID, username, password, created, updated, email, isFirstLogin, isResetFlag, isDeteleFlag, errorLogin, token) values ('$userID','$username', '$password', CURDATE(), CURDATE(), '$email', '1', '0', '0', '0', NULL)";
		$sqlAddConnector = "insert into Connector(uID, deID, isManager) values ('$userID', '$departmentID', '$isManager')";
		$sqlAddUserDetail = "insert into UsersDetail(udID,FullName,Birthday,Address) values ('$userID', NULL, NULL, NULL)";
		if(mysqli_query($database, $sqlAddUsers) && mysqli_query($database, $sqlAddConnector) && mysqli_query($database, $sqlAddUserDetail)) {
			include ('../SendMail/sendmail.php') ;
			$titleSend = "Account is created !"; 
			$contentSend = "Admin created your account. Default password is '".$rawpass."'. Please sign in to change your password !";
			if (SendMail($email, $titleSend, $contentSend) == "true") {
				header('location:../../index.php?quanly=account&ac=add&stt=true');
			}else {
				header('location:../../index.php?quanly=account&ac=add&stt=false');
			}			
		}else {
			header('location:../../index.php?quanly=account&ac=add&stt=error');
		}
	}
?>
