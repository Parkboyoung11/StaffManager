<?php
	session_start();

	if(!isset($_SESSION['dangnhap'])){
		header('location:../../login.php');
		exit();
	}

	include('../../../Helper/config.php');
	$rawpass = mt_rand(100000, 999999);
	$defaultPass = md5($rawpass);
	if (isset($_GET['uid'])) {
		$sqlresetpass = "UPDATE Users set password='$defaultPass', isResetFlag='1' where userID='$_GET[uid]'";
		mysqli_query($database, $sqlresetpass);

		include ('../SendMail/sendmail.php') ;

		$sqlEmail = "SELECT email from Users where userID='$_GET[uid]'";
		$result = mysqli_query($database, $sqlEmail);

		$titleSend = "Reset Password"; 
		$contentSend = "Admin have reset password. Your current password is '".$rawpass."'. Please sign in to change your password !";

		while($row=mysqli_fetch_array($result)){
			SendMail($row['email'], $titleSend, $contentSend);
		}
		header("location: ../../index.php?quanly=staff&ac=lietke&trang=$_SESSION[pagenumber]");
	}
?>