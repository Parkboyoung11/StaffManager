<?php
  $sql_lietkesp="select * from Department";
  $row_lietkesp=mysqli_query($database, $sql_lietkesp);
?>
<div class="button_themsp">
  <a href="index.php?quanly=department&ac=them">Add</a> 
</div>
<table width="100%" border="1">
  <tr>
    <td style="text-align: center;">Department ID</td>
    <td style="text-align: center;">Name</td>
    <td style="text-align: center;">Description</td>
    <td style="text-align: center;">Created</td>
    <td style="text-align: center;">Updated</td>
    <td colspan="2" style="text-align: center;">Edit</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){
    ?>
      <tr>
        <td><?php  echo $dong['departID']; ?></td>
        <td><?php echo $dong['name']; ?></td>
        <td><?php echo $dong['description']; ?></td>
        <td><?php echo $dong['created']; ?></td>
        <td><?php echo $dong['updated']; ?></td>
        <td><a href="index.php?quanly=department&ac=sua&id=<?php echo $dong['departID'] ?>" ><center><img src="../imgs/edit.png" width="30" height="30" /></center></a></td>
        <td><a href="modules/Department/xuly.php?id=<?php echo $dong['departID']?>" class="delete_link"><center><img src="../imgs/delete.png" width="30" height="30"   /></center></a></td>
      </tr>
    <?php
    $i++;
  }
  ?>
</table>
