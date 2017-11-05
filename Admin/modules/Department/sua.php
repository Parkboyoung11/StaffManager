<?php
  $sql = "select * from Department where departID='$_GET[id]' ";
  $row = mysqli_query($database, $sql);
  $dong = mysqli_fetch_array($row);
?>
<div class="button_themsp">
  <a href="index.php?quanly=department&ac=lietke">List</a>
</div>
<form action="modules/Department/xuly.php?id=<?php echo $dong['departID'] ?>" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3>
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center;font-size:25px;">Edit Department</td>
    </tr>
    <tr>
      <td width="97">Department ID</td>
      <td width="87"><input type="text" name="departID" required="required" value="<?php echo $dong['departID'] ?>"></td>
    </tr>
    <tr>
      <td>Department Name</td>
      <td><input type="text" name="deName" required="required" value="<?php echo $dong['name'] ?>"></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><textarea name="description" cols="40" rows="10"><?php echo $dong['description'] ?></textarea></td>
    </tr>    
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="sua" value="Edit Department">
      </div></td>
    </tr>
  </table>
</form>