<?php 
	include('../../../Helper/config.php');
	$departID=$_POST['departID'];
	$deName=$_POST['deName'];
	$description=$_POST['description'];
	$isDetele=$_POST['status'];
	
	if(isset($_POST['them'])){
		//them
		 $sql_them = "insert into Department(departID, name, description, isDelete, created, updated) values ('$departID', '$deName', '$description', '0', CURDATE(), CURDATE())";
		mysqli_query($database, $sql_them);
		header('location:../../index.php?quanly=department&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
	  	$sql_sua = "update Department set departID='$departID', name='$deName', description='$description', isDelete='$isDetele', updated=CURDATE() where departID='$_GET[id]'";
		mysqli_query($database, $sql_sua);
		header('location:../../index.php?quanly=department&ac=lietke');		
	}else{
		//xoa
		// $sql_xoa = "delete from Department where departID = $_GET[id]";
		$sqlDelteDepart = "UPDATE Department SET isDelete='1', updated=CURDATE() where departID = '$_GET[id]'";
		mysqli_query($database, $sqlDelteDepart);
		header('location:../../index.php?quanly=department&ac=lietke');
	}
?>
