<div class="button_themsp">
  <a href="index.php?quanly=department&ac=lietke"><center><img src="../imgs/list.png" width="40" height="40" /></center></a>
</div>
<form action="modules/Department/xuly.php" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3>
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:45px; background-color: #FF9C00">Add Department</td>
    </tr>
    <tr>
      <td width="230">Department ID</td>
      <td class="inputTD"><input type="number" min="1000" max="9999" name="departID" class="inputCSS"></td>
    </tr>
    <tr>
      <td>Department Name</td>
      <td class="inputTD"><input type="text" name="deName" class="inputCSS"></td>
    </tr>
    <tr>
      <td>Description</td>
      <td class="inputTD"><textarea name="description" cols="40" rows="10" class="inputCSS"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" class="creatButtonTD"><div align="center">
        <input type="submit" name="them" value="Add Department" class="creatButton">
      </div></td>
    </tr>
  </table>
</form>