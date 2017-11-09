<?php 
  $sql = "select * from Users, Connector where userID=uID and userID='$_GET[uid]' and deID='$_GET[did]'";
  $row=mysqli_query($database, $sql);
  $dong=mysqli_fetch_array($row); 
?>
<div class="button_themsp">
  <a href="index.php?quanly=staff&ac=lietke"><center><img src="../imgs/list.png" width="40" height="40" /></center></a>
</div>
<form action="modules/Staff/xuly.php?uid=<?php echo $dong['userID'] ?>&did=<?php echo $dong['deID'] ?>" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3>
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:45px; background-color: #FF9C00">Staff Edit</td>
    </tr>
    <tr>
      <td width="230">User ID</td>
      <td class="inputTD"><input type="number" min="1000" max="9999" name="userID" required="required" value="<?php echo $dong['userID'] ?>" class="inputCSS"></td>
    </tr>
    <tr>
      <td>Username</td>
      <td class="inputTD"><input type="text" pattern="[a-zA-Z0-9]{1,}" name="username" required="required" value="<?php echo $dong['username'] ?>" class="inputCSS"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td class="inputTD"><input type="text" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" name="email" required="required" value="<?php echo $dong['email'] ?>" class="inputCSS"></td>
    </tr>
    <tr>
      <td>Department</td>
      <td class="inputTD">
        <select name="department" class="selectDepart">
          <?php  
            $sqlDepart = "SELECT departID, name FROM Department";
            $result = mysqli_query($database, $sqlDepart);
            while($rowss = mysqli_fetch_array($result)){
              if ($rowss['departID'] == $dong['deID']) {
                echo "<option value=\"".$rowss['departID']."\" selected=\"true\">".$rowss['name']."</option>";
              }else {
                echo "<option value=\"".$rowss['departID']."\">".$rowss['name']."</option>";
              }                     
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Position</td>
      <td class="selectPosition">
        <?php
          if ($dong['isManager']) {
            echo 'Manager <input type="radio" name="position" value="1" checked="checked" style="width: 10%">';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staff <input type="radio" name="position" value="0" style="width: 10%">';
          }else {
            echo 'Manager <input type="radio" name="position" value="1" style="width: 10%">';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staff <input type="radio" name="position" value="0" checked="checked" style="width: 10%">';
          }
        ?>
      </td>
    </tr>
    <tr>
      <td>Status</td>
      <td class="selectPosition">
        <?php
          if ($dong['isDeteleFlag']) {
            echo 'Leave job <input type="radio" name="status" value="1" checked="checked" style="width: 10%">';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Working <input type="radio" name="status" value="0" style="width: 10%">';
          }else {
            echo 'Leave job <input type="radio" name="status" value="1" style="width: 10%">';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Working <input type="radio" name="status" value="0" checked="checked" style="width: 10%">';
          }
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="2"  class="creatButtonTD"><div align="center">
        <input type="submit" name="sua" value="Edit" class="creatButton">
      </div></td>
    </tr>
  </table>
</form>