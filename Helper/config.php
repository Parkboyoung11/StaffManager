<?php
	$localhost = "localhost";
	$user = "root";
	$pass = "Parkboyoung";
	$databaseName = "StaffManager";

	$database = mysqli_connect($localhost, $user, $pass, $databaseName);
	if (!$database) {
        echo "Database connect error!";
        exit();
   	}
?>