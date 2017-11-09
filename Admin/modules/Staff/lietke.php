<?php
  if(isset($_GET['trang'])){
    $trang=$_GET['trang'];
  }else{
    $trang=''; 
  }

  if($trang == '' || $trang == '1'){
    $trang1 = 0;
  }else{
    $trang1 = ($trang * 10) - 10;
  }

  $_SESSION['pagenumber'] = $trang;

  if (isset($_GET['search'])) {
    $sqlStaff = "SELECT * from Users, Department, Connector where userID=uID and departID=deID and (username like '%$_GET[search]%' or email = '$_GET[search]' or userID = '$_GET[search]') order by userID asc limit $trang1,10 ";
  }else {
    $sqlStaff = "SELECT * from Users, Department, Connector where userID=uID and departID=deID order by userID asc limit $trang1,10 ";
  }
  $rowStaff = mysqli_query($database, $sqlStaff);
?>
<div class="searchAndAdd">
  <div class="button_themsp">
    <a href="index.php?quanly=staff&ac=them">+</a> 
  </div>
  <form name="searchForm" style="width: 35%; float: right; margin-right: 20px; " id="searchFormHeader" method="get" action="">
      <input name="search" class="keywordBox" value="<?php echo $_GET['search'] ?>" type="text" placeholder="Search Staff ....">
  </form>
</div>
<table width="100%" border="1">
  <tr>
    <td class="subTitle">ID</td>
    <td class="subTitle">Username</td>
    <td class="subTitle">Email</td>
    <td class="subTitle">Department</td>
    <td class="subTitle">Position</td>
    <td class="subTitle">Status</td>
    <td colspan="3" class="subTitle">Edit</td>
  </tr>
  <?php
    while($dong=mysqli_fetch_array($rowStaff)){
      ?>
        <tr>
          <td class="contentTable"><?php  echo $dong['userID']?></td>
          <td class="contentTable"><?php echo $dong['username']; ?></td>
          <td class="contentTable"><?php echo $dong['email']; ?></td>
          <td class="contentTable"><?php echo $dong['name'] ?></td>
          <td class="contentTable">
            <?php 
              if (!$dong['isManager']) { 
                echo "Staff";
              }else {
                echo "Manager";
              }
            ?>
          </td>
          <td class="contentTable">
            <?php 
              if (!$dong['isDeteleFlag']) {
                echo "Working";
              }else {
                echo "Leave job";
              }
            ?>
          </td>
          <td><a href="index.php?quanly=staff&ac=sua&uid=<?php echo $dong['userID'] ?>&did=<?php echo $dong['departID']?>" ><center><img src="../imgs/edit.png" width="30" height="30" /></center></a></td>
          <td><a href="modules/Staff/xuly.php?uid=<?php echo $dong['userID']?>&did=<?php echo $dong['departID']?>" class="delete_link"><center><img src="../imgs/delete.png" width="30" height="30"   /></center></a></td>
          <td><a href="modules/ResetPassword/resetone.php?uid=<?php echo $dong['userID']?>" class="reset_link"><center><img src="../imgs/reset.png" width="30" height="30"/></center></a></td>
        </tr>
      <?php
    }
  ?>
</table>
<div class="trang">
  Page :
  <?php
    if (isset($_GET['search'])) {
      $sqlSearch = "SELECT userID from Users where username like '%$_GET[search]%' or email = '$_GET[search]' or userID = '$_GET[search]'";
    }else {
      $sqlSearch = "SELECT userID from Users";
    }
    $sql_trang=mysqli_query($database, $sqlSearch);
    $count_trang=mysqli_num_rows($sql_trang);
    $a = ceil($count_trang / 10);   // lam tron len 4.3->5
    for($b = 1 ; $b <= $a ; $b++){
      if ($trang == $b){
      echo '<a href="index.php?quanly=staff&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';
      }else{
      echo '<a href="index.php?quanly=staff&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
      }
    }
  ?>
</div>