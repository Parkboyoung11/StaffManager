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

  $sqlStaff = "select * from Users, Department, Connector where userID=uID and departID=deID order by userID asc limit $trang1,10 ";
  $rowStaff = mysqli_query($database, $sqlStaff);
?>
<div class="button_themsp">
  <a href="index.php?quanly=staff&ac=them">Add Staff</a>
</div>
<table width="100%" border="1">
  <tr>
    <td style="text-align: center;">User ID</td>
    <td style="text-align: center;">Username</td>
    <td style="text-align: center;">Email</td>
    <td style="text-align: center;">Department</td>
    <td style="text-align: center;">Position</td>
    <td style="text-align: center;">Status</td>
    <td colspan="3" style="text-align: center;">Edit</td>
  </tr>
  <?php
    while($dong=mysqli_fetch_array($rowStaff)){
      ?>
        <tr>
          <td><?php  echo $dong['userID']?></td>
          <td><?php echo $dong['username']; ?></td>
          <td><?php echo $dong['email']; ?></td>
          <td><?php echo $dong['name'] ?></td>
          <td>
            <?php 
              if (!$dong['isManager']) { 
                echo "Staff";
              }else {
                echo "Manager";
              }
            ?>
          </td>
          <td>
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
  Trang :
  <?php
    $sql_trang=mysqli_query($database, "select userID from Users");
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