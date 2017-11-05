<?php
  $sql = "select * from Users, Connector where userID=uID and userID='$_GET[uid]' and deID='$_GET[did]'";
  $row=mysqli_query($database, $sql);
  $dong=mysqli_fetch_array($row);
?>
<div class="button_themsp">
  <a href="index.php?quanly=staff&ac=lietke">List Staff</a>
</div>
<form action="modules/Staff/xuly.php?uid=<?php echo $dong['userID'] ?>&did=<?php echo $dong['deID'] ?>" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3>
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center;font-size:25px;">Staff Edit</td>
    </tr>
    <tr>
      <td width="97">User ID</td>
      <td width="87"><input type="text" name="userID" required="required" value="<?php echo $dong['userID'] ?>"></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" name="username" required="required" value="<?php echo $dong['username'] ?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" required="required" value="<?php echo $dong['email'] ?>"></td>
    </tr>
    <tr>
      <td>Department</td>
      <td>
        <select name="department">
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
      <td>
        <?php
          if ($dong['isManager']) {
            echo 'Manager <input type="radio" name="position" value="1" checked="checked" style="width: 10%">';
            echo 'Staff <input type="radio" name="position" value="0" style="width: 10%">';
          }else {
            echo 'Manager <input type="radio" name="position" value="1" style="width: 10%">';
            echo 'Staff <input type="radio" name="position" value="0" checked="checked" style="width: 10%">';
          }
        ?>
      </td>
    </tr>
    <tr>
      <td>Status</td>
      <td>
        <?php
          if ($dong['isDeteleFlag']) {
            echo 'Leave job <input type="radio" name="status" value="1" checked="checked" style="width: 10%">';
            echo 'Working <input type="radio" name="status" value="0" style="width: 10%">';
          }else {
            echo 'Leave job <input type="radio" name="status" value="1" style="width: 10%">';
            echo 'Working <input type="radio" name="status" value="0" checked="checked" style="width: 10%">';
          }
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="sua" value="Edit">
      </div></td>
    </tr>
  </table>
</form>