<?php 
  $sql = "select * from Department where departID='$_GET[id]' ";
  $row = mysqli_query($database, $sql);
  $dong = mysqli_fetch_array($row);
?>
<div class="button_themsp">
  <a href="index.php?quanly=department&ac=lietke"><center><img src="../imgs/list.png" width="40" height="40" /></center></a>
</div>
<form action="modules/Department/xuly.php?id=<?php echo $dong['departID'] ?>" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3>
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:45px; background-color: #FF9C00">Edit Department</td>
    </tr>
    <tr>
      <td width="230">Department ID</td>
      <td class="inputTD"><input type="number" min="1000" max="9999" name="departID" required="required" value="<?php echo $dong['departID'] ?>" class="inputCSS"></td>
    </tr>
    <tr>
      <td>Department Name</td>
      <td class="inputTD"><input type="text" name="deName" required="required" value="<?php echo $dong['name'] ?>" class="inputCSS"></td>
    </tr>
    <tr>
      <td>Description</td>
      <td class="inputTD"><textarea name="description" cols="40" rows="10" class="inputCSS"><?php echo $dong['description'] ?></textarea></td>
    </tr>
    <tr>
      <td>Status</td>
      <td class="selectPosition">
        <?php
          if ($dong['isDelete']) {
            echo 'Deleted <input type="radio" name="status" value="1" checked="checked" style="width: 10%">';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Normal <input type="radio" name="status" value="0" style="width: 10%">';
          }else {
            echo 'Deleted <input type="radio" name="status" value="1" style="width: 10%">';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Normal <input type="radio" name="status" value="0" checked="checked" style="width: 10%">';
          }
        ?>
      </td>
    </tr>    
    <tr>
      <td colspan="2" class="creatButtonTD"><div align="center">
        <input type="submit" name="sua" value="Edit Department" class="creatButton">
      </div></td>
    </tr>
  </table>
</form>