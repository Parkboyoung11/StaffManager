<?php
	include('../../../Helper/config.php');

	$userID=$_POST['userID'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$deID=$_POST['department'];
	$isManager=$_POST['position'];
	$isDeteleFlag=$_POST['status'];
	
	if(isset($_POST['sua'])){
		//sua
	  	$sqlUpdate = "UPDATE Users, Connector set userID='$userID', username='$username', email='$email', isDeteleFlag='$isDeteleFlag', deID='$deID', isManager='$isManager', updated=CURDATE() where userID=uID and userID='$_GET[uid]' and deID='$_GET[did]'";
		mysqli_query($database, $sqlUpdate);
		header('location:../../index.php?quanly=staff&ac=lietke');
	}else{
		//xoa
		// $sqlDelteUser = "delete from Users where userID = '$_GET[uid]'";
		$sqlDelteUser = "UPDATE Users SET isDeteleFlag='1' where userID = '$_GET[uid]'";
		mysqli_query($database, $sqlDelteUser);
		header('location:../../index.php?quanly=staff&ac=lietke');		
	}
?>
