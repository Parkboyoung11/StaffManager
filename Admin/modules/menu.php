<?php
  if(isset($_POST['logout'])){
    unset($_SESSION['dangnhap']);
    header('location:login.php');
  }
?>

<div class="menu">
  <ul>
    <li><a href="index.php?quanly=account&ac=add">Account</a></li>
    <li><a href="index.php?quanly=staff&ac=lietke">Staffs</a></li>
    <li><a href="index.php?quanly=department&ac=lietke">Departments</a></li>
    <li><a href="#">Adjustment</a></li>
    <li><a href="index.php?quanly=password&ac=reset">Reset Password</a></li>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="submit" name="logout" value="Logout" style="background:#06F;color:#fff;width:150px;height:40px;">
    </form>
  </ul>
</div>
<!-- <form action="index.php?quanly=timkiem&ac=sp" method="post" enctype="multipart/form-data">
  <p>
    <input type="text" name="masp" placeholder="Nhập mã sản phẩm..." id="timkiem" required="required" />
    <input type="submit" id="button_timkiem" name="timkiem" value="Tìm sản phẩm" />
  </p>
</form> -->