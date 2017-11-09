<form action="modules/CreatAccount/xuly.php" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3> 
  <h3>&nbsp;</h3> 
  <table width="100" border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:45px; background-color: #FF9C00">Creat Account</td>
    </tr>
    <tr>
      <td width="230">User ID</td>
      <td class="inputTD"><input type="number" min="1000" max="9999" name="userID" required="required" class="inputCSS"></td>
    </tr>
    <tr>
      <td >Username</td>
      <td class="inputTD"><input type="text" pattern="[a-zA-Z0-9]{1,}" name="username" required="required" class="inputCSS"></td>
    </tr>
    <tr>
      <td >Email</td>
      <td class="inputTD"><input type="text" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" name="email" required="required" class="inputCSS"></td>
    </tr>
    <tr>
      <td >Department</td>
      <td class="inputTD"><!-- <input type="text" name="departmentID" required="required" > -->
      <select name="department" class="selectDepart">
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
      <td >Position</td>
      <td class="selectPosition">
        Manager <input type="radio" name="position" value="1" style="width: 10%">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staff <input type="radio" name="position" value="0" checked="checked" style="width: 10%">
      </td>
    </tr>
    <tr>
      <td colspan="2" class="creatButtonTD"><div align="center">
        <input type="submit" name="creat" value="Creat" class="creatButton">
      </div></td>
    </tr>
  </table>
</form>