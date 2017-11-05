<?php
	$defaultPass = "boyoung";
	if (isset($_POST['noreset'])) {
		header('location: index.php');
	}elseif (isset($_POST['yesreset'])) {
		$sqlresetpass = "UPDATE Users set password='$defaultPass', isResetFlag='1'";
		mysqli_query($database, $sqlresetpass);

		include ('modules/SendMail/sendmail.php') ;

		$sqlEmail = "SELECT email from Users where userID='1002'";
		// $sqlEmail = "SELECT email from Users";
		$result = mysqli_query($database, $sqlEmail);

		while($row=mysqli_fetch_array($result)){
			SendMail($row['email']);
		}
		header('location: index.php');
	}
?>
<div style="padding: 100px; margin: auto; width: 300px; font-size:25px;">
<div style="color: red;text-align: center">Reset password. You sure?</div>
<div style="height:10px">&nbsp;</div>
<div style="margin: auto; width: 167px;">
<form action="" method="post" enctype="multipart/form-data">
<input type="submit" value="Yes" name="yesreset" style="width:80px; height: 30px; font-size:20px;">
<input type="submit" value="No" name="noreset" style="width:80px; height: 30px; font-size:20px;">
</form>
</div>
</div>