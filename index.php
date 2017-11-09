<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<title>Staff Manager</title>
	<link type="text/css" rel="stylesheet" href="Views/Style/stylesUserDetail.css">
</head>
<?php
	session_start();
	if(!isset($_SESSION['userIDLogin'])) {
		header('location:login.php');
	}elseif(!isset($_SESSION['FullName'])) {
		header('location:UpdateProfile.php');
	}
?>
<body>
	<?php
		include('Helper/config.php');
		include('Modules/header.php');
		if (isset($_GET['staffInfor']) && $_GET['staffInfor'] == 'true' && isset($_SESSION['isManager'])) {
			include('Modules/ShowStaffInformation.php');
		}else {
			include('Modules/content.php');
		}		
	?>
	<script type="text/javascript" src="Admin/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="Admin/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="Admin/js/delete.js"></script>
	<script type="text/javascript" src="Admin/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript" src="Admin/js/tinymce/js/tinymce/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>