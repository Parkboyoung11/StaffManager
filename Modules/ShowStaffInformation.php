<?php
	$departID = $_SESSION['departID'];
  if(isset($_GET['page'])){
    $trang=$_GET['page'];
  }else{
    $trang='';
  }

  if($trang == '' || $trang == '1'){
    $trang1 = 0;
  }else{
    $trang1 = ($trang * 10) - 10;
  }

  $sqlStaff = "SELECT * from UsersDetail, Users, Connector where udID=userID and userID=uID and deID=$departID and isManager=0 order by udID asc limit $trang1,10 ";
  $rowStaff = mysqli_query($database, $sqlStaff);
?>
<div id="wrap" class="lowerPage">
	<div id="contents" class="clearfix">
		<div id="mainContent">
			<div class="innerType-lower">
				<div class="divide-UIType-2colum clearfix">
					<table class="tableStaff">
						<tr>
							<td colspan="6" class="mainTitle">Staff Information</td>
						</tr>
						<tr>
							<td class="subTitle">ID</td>
							<td class="subTitle">Full Name</td>
							<td class="subTitle">Birthday</td>
							<td class="subTitle">Email</td>
							<td class="subTitle">Gender</td>
							<td class="subTitle">Address</td>
						</tr>
						<?php
						while($dong=mysqli_fetch_array($rowStaff)){
						?>
						<tr>
							<td class="contentTable"><?php echo $dong['udID']?></td>
							<td class="contentTable"><?php if($dong['FullName'] === NULL){echo "N/A";}else {echo $dong['FullName'];}?></td>
							<td class="contentTable"><?php if($dong['Birthday'] === NULL){echo "N/A";}else {echo $dong['Birthday'];}?></td>
							<td class="contentTable"><?php echo $dong['email']?></td>
							<td class="contentTable">
								<?php
								if ($dong['Gender'] == 1) {
									echo "Male";
								}elseif ($dong['Gender'] === NULL) {
									echo "N/A";
								}else {
									echo "Female";
								}
								?>
							</td>
							<td class="contentTable"><?php if($dong['Address'] === NULL){echo "N/A";}else {echo $dong['Address'];}?></td>
						</tr>
						<?php
						}
						?>
					</table>
					<div class="page">
						Page :
						<?php
							$sqlAllStaff = "SELECT userID from UsersDetail, Users, Connector where udID=userID and userID=uID and deID=$departID and isManager=0";
							$rowAllStaff = mysqli_query($database, $sqlAllStaff);
							$countPage=mysqli_num_rows($rowAllStaff);
							$a = ceil($countPage / 10);   // lam tron len 4.3->5
							for($b = 1 ; $b <= $a ; $b++){
								if ($trang == $b){
								 echo '<a href="index.php?staffInfor=true&deid='.$departID.'&page='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';
								}else{
								 echo '<a href="index.php?staffInfor=true&deid='.$departID.'&page='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
								}
							}
						?>
						<div style="float: right"><a href="index.php">My Profile</a>&nbsp;|&nbsp;<a href="Controller/exportCSV.php" class="exprotCSV">Export CSV</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>