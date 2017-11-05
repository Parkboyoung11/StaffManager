<?php 
	if ($_POST['submit']) {
		$pass = sha1($_POST['pass']);
		echo $pass;
		exit();
	}

	// https://hashkiller.co.uk/md5-decrypter.aspx          --- decode md5 :v :v
?>
<form method="post" action="">
	<input type="text" name="pass">
	<input type="submit" name="submit">
</form>

