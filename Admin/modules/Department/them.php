<div class="button_themsp">
  <a href="index.php?quanly=department&ac=lietke">List</a>
</div>
<form action="modules/Department/xuly.php" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3>
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center;font-size:25px;">Add Department</td>
    </tr>
    <tr>
      <td width="97">Department ID</td>
      <td width="87"><input type="text" name="departID"></td>
    </tr>
    <tr>
      <td>Department Name</td>
      <td><input type="text" name="deName"></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><textarea name="description" cols="40" rows="10"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="them" value="Add Department">
      </div></td>
    </tr>
  </table>
</form>