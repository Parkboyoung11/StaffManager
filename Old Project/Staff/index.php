<?php
	session_start();
	if(isset($_GET['condition']) && $_GET['condition']=='logout') {
		unset($_SESSION['id']);
		header('Location: http://192.168.33.10/MyProject/StaffManager');		
	}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Staff</title>
  <link type="text/css" rel="stylesheet" href="update.css">
</head>
<body>
<?php
	$database = mysqli_connect("localhost","root","Parkboyoung","StaffManager");
	if (!$database) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	if(isset($_SESSION['id'])) {
		echo "<h1>Hello ".$_GET['id']."</h1>";
		?>
		<div class="logout">
			<a href="?condition=logout">Logout</a>
		</div>
		<?php
	}
?>
</body>

