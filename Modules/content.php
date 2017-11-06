<?php
  if(isset($_GET['logout']) && $_GET['logout'] == "true"){
    unset($_SESSION['userIDLogin']);
    unset($_SESSION['FullName']);
    header('location:login.php');
  }
?>
<div id="wrap" class="lowerPage">
	<div id="contents" class="clearfix">
		<div id="mainContent">
			<div class="innerType-lower">
				<div class="divide-UIType-2colum clearfix">
					<div class="divideLeft">
						<?php
						$sql = "SELECT * FROM UsersDetail, Users WHERE udID=userID and udID='$_SESSION[userIDLogin]'";
						$result = mysqli_query($database, $sql);
						if (mysqli_num_rows($result) <= 0) {
							exit();
						}
						$row = mysqli_fetch_assoc($result);
						$fullName = $row['FullName'];
						$birthday = $row['Birthday'];
						$address = $row['Address'];
						$avata = $row['Avatar'];
						$gender = $row['Gender'];
						$userID = $row['userID'];
						$username = $row['username'];
						$email = $row['email'];
						$isResetFlag = $row['isResetFlag'];

						if($avata == NULL) {
							echo "<div class=\"detail_img\"><img src=\"imgs/user.jpg\" alt=\"Avatar Loading...\" style=\"max-width: 600px; max-height: 605px;\"></div>";
						}else {
							echo "<div class=\"detail_img\"><img src=\"".$avata."\" alt=\"Avatar Loading...\" style=\"max-width: 600px; max-height: 605px;\"></div>";
						}
						?>
						<img src="" >
					</div>
					<div class="divideRight">
						<section id="detailInfoBox">
							<?php
							echo "<h1 class=\"bookTitle\">".$fullName." Profile</h1>";
							?>
							<div id="detailInfoInner" class="clearfix">
								<div class="detail_info">
									<table class="mangaInformation">
										<?php
										echo "<tr>";
										echo "<th >User ID</th>";
										echo "<td>";
										echo $userID;
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<th>Username</th>";
										echo "<td>";
										echo $username;
										echo "</td>";
										echo "</tr>";																				
										echo "<tr>";
										echo "<th>Full Name</th>";
										echo "<td>";
										echo $fullName;
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<th>Birthday</th>";
										echo "<td>";
										echo $birthday;
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<th>Email</th>";
										echo "<td>";
										echo $email;
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<th>Gender</th>";
										echo "<td>";
										if 	($gender == 1) {
											echo "Male";
										} else {
											echo "Female";
										}
										echo "</td>";
										echo "</tr>";										
										echo "<tr>";
										echo "<th>Address</th>";
										echo "<td>";
										echo $address;
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<th>Department</th>";
										echo "<td>";
										$sqld = "SELECT isManager, name FROM Department, Connector WHERE deID=departID and uID='$_SESSION[userIDLogin]'";
										$resultd = mysqli_query($database, $sqld);
										if (mysqli_num_rows($resultd) <= 0) {
											echo "No Information";
										}
										$rowd = mysqli_fetch_assoc($resultd);
										echo $rowd["name"]." - ";
										if ($rowd["isManager"]) {
											echo "Manager<br>";
										}else {
											echo "Staff<br>";
										}
										echo "</td>";
										echo "</tr>";
										?>
									</table>
									<div class="settingBtnBox">
										<div class="settingBtnBoxLeft">
											<?php
											echo "<a title=\"Edit your information\" href=\"UpdateProfile.php";
												echo "?fullName=".$fullName;
												echo "&birthday=".$birthday;
												echo "&address=".$address;
												echo "&avatar=".$avata;
												echo "&gender=".$gender;
												echo "&reset=".$isResetFlag;
											echo "\">Edit Profile<i class=\"arrowRight-w\"></i><i class=\"myMagazineFlag_off\"></i></a>";
											?>
										</div>
										<div class="settingBtnBoxMid">
											<a title="Logout !" href="?logout=true">Logout<i class="arrowRight-w"></i></a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>