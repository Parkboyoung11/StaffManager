<form action="modules/CreatAccount/xuly.php" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3> 
  <table width="100" border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:25px">Creat Account</td>
    </tr>
    <tr>
      <td width="97">User ID</td>
      <td width="140"><input type="text" name="userID" required="required" ></td>
    </tr>
    <tr>
      <td width="0">Username</td>
      <td width="140"><input type="text" name="username" required="required" ></td>
    </tr>
    <tr>
      <td width="97">Password</td>
      <td width="140"><input type="password" name="password" required="required" ></td>
    </tr>
    <tr>
      <td width="97">Email</td>
      <td width="140"><input type="text" name="email" required="required" ></td>
    </tr>
    <tr>
      <td width="97">Department</td>
      <td width="140"><!-- <input type="text" name="departmentID" required="required" > -->
      <select name="department">
        <?php  
          $sqlDepart = "SELECT departID, name FROM Department";
          $result = mysqli_query($database, $sqlDepart);
          while($row = mysqli_fetch_array($result)){            
            echo "<option value=\"".$row['departID']."\">".$row['name']."</option>";
          }
        ?>
      </select>
      </td>
    </tr>
    <tr>
      <td width="97">Position</td>
      <td width="140">
        Manager <input type="radio" name="position" value="1" style="width: 10%">
        Staff <input type="radio" name="position" value="0" checked="checked" style="width: 10%">
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="creat" value="Creat">
      </div></td>
    </tr>
  </table>
</form>