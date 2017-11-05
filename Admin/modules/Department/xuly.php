<?php
	include('../../../Helper/config.php');
	$departID=$_POST['departID'];
	$deName=$_POST['deName'];
	$description=$_POST['description'];
	
	if(isset($_POST['them'])){
		//them
		 $sql_them = "insert into Department(departID, name, description, isDelete, created, updated) values ('$departID', '$deName', '$description', '0', '2017-10-30', '2017-10-30')";
		mysqli_query($database, $sql_them);
		header('location:../../index.php?quanly=department&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
	  	$sql_sua = "update Department set departID='$departID', name='$deName', description='$description', updated=CURDATE() where departID='$_GET[id]'";
		mysqli_query($database, $sql_sua);
		header('location:../../index.php?quanly=department&ac=lietke');		
	}else{
		//xoa
		$sql_xoa = "delete from Department where departID = $_GET[id]";
		mysqli_query($database, $sql_xoa);
		header('location:../../index.php?quanly=department&ac=lietke');
	}
?>
