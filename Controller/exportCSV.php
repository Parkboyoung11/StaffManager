<?php
	session_start();
	if(!isset($_SESSION['userIDLogin'])) {
		header('location:../login.php');
	}elseif(!isset($_SESSION['FullName'])) {
		header('location:../UpdateProfile.php');
	}elseif(!isset($_SESSION['isManager'])) {
		header('location:../index.php');
	}

	$departID = $_SESSION['departID'];

	include('../Helper/config.php');
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=staff.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('ID', 'Full Name', 'Birthday', 'Email', 'Gender', 'Address'));
	$sqlExport = "SELECT userID, FullName, Birthday, email, Gender, Address from UsersDetail, Users, Connector where udID=userID and userID=uID and deID=$departID and isManager=0 order by udID asc";
	$result = mysqli_query($database, $sqlExport);

	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['FullName'] === NULL) {
			$row['FullName'] = "N/A";
		}

		if ($row['Birthday'] === NULL) {
			$row['Birthday'] = "N/A";
		}

		if ($row['Gender'] === NULL) {
			$row['Gender'] = "N/A";
		}elseif ($row['Gender'] == 1) {
			$row['Gender'] = "Male";
		}else {
			$row['Gender'] = "Female";
		}

		if ($row['Address'] === NULL) {
			$row['Address'] = "N/A";
		}
		
		$eachData['ID'] = $row['userID'] ; 
		$eachData['Full Name'] = $row['FullName']; 
		$eachData['Birthday'] = $row['Birthday']; 
		$eachData['Email'] = $row['email']; 
		$eachData['Gender'] = $row['Gender'];
		$eachData['Address'] = $row['Address'];
		fputcsv($output, $eachData);
	}
	fclose($output);
?>