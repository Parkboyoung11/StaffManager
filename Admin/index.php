<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Staff Manager</title>
	<link type="text/css" rel="stylesheet" href="../Views/Style/css.css">
</head>
<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('location:login.php');
	}
?>
<body>
	<div class="wrapper">
		<?php
			include('../Helper/config.php');
			include('modules/header.php');
			include('modules/menu.php');
			include('modules/content.php');
			// include('modules/footer.php');
		?>
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="js/delete.js"></script>
		<script type="text/javascript" src="js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
		<script type="text/javascript" src="js/tinymce/js/tinymce/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</div>
</body>
</html>