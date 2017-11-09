<?php  
  $sql_lietkesp="select * from Department";
  $row_lietkesp=mysqli_query($database, $sql_lietkesp);
?>
<div class="button_themsp">
  <a href="index.php?quanly=department&ac=them">+</a> 
</div>
<table width="100%" border="1">
  <tr>
    <td class="subTitle">ID</td>
    <td class="subTitle">Name</td>
    <td class="subTitle">Description</td>
    <td class="subTitle">Created</td>
    <td class="subTitle">Updated</td>
    <td class="subTitle">Status</td>
    <td colspan="2" class="subTitle">Edit</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){
    ?>
      <tr>
        <td class="contentTable"><?php  echo $dong['departID']; ?></td>
        <td class="contentTable"><?php echo $dong['name']; ?></td>
        <td class="contentTable"><?php echo $dong['description']; ?></td>
        <td class="contentTable"><?php echo $dong['created']; ?></td>
        <td class="contentTable"><?php echo $dong['updated']; ?></td>
        <td class="contentTable"><?php
          if (!$dong['isDelete']) {
                echo "Normal";
              }else {
                echo "Deleted";
              }
        ?></td>
        <td><a href="index.php?quanly=department&ac=sua&id=<?php echo $dong['departID'] ?>" ><center><img src="../imgs/edit.png" width="30" height="30" /></center></a></td>
        <td><a href="modules/Department/xuly.php?id=<?php echo $dong['departID']?>" class="delete_link"><center><img src="../imgs/delete.png" width="30" height="30"   /></center></a></td>
      </tr>
    <?php
    $i++;
  }
  ?>
</table>
