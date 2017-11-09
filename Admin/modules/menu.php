<?php
  if(isset($_POST['logout'])){
    unset($_SESSION['dangnhap']);
    unset($_SESSION['pagenumber']);
    header('location:login.php');
  }
?>

<div class="menu">
  <ul>
    <li><a href="index.php?quanly=account&ac=add" id="account">Account</a></li>
    <li><a href="index.php?quanly=staff&ac=lietke" id="staff">Staffs</a></li>
    <li><a href="index.php?quanly=department&ac=lietke" id="department">Departments</a></li>
    <li><a href="#" id="adjustment">Adjustment</a></li>
    <li><a href="index.php?quanly=password&ac=reset" id="password">Reset Pass</a></li>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="submit" name="logout" value="Logout" style="background:#06F;color:#fff;width:150px;height:40px;font-size: 20px;width: 145px;">
    </form>
  </ul>
</div>
<script type="text/javascript">
  if (window.location.href.indexOf('account') != -1) {
    document.getElementById('account').style.backgroundColor = '#211f1f';
    document.getElementById('account').style.color = '#FFFFFF';
  }else if (window.location.href.indexOf('staff') != -1) {
    document.getElementById('staff').style.backgroundColor = '#211f1f';
    document.getElementById('staff').style.color = '#FFFFFF';
  }else if (window.location.href.indexOf('department') != -1) {
    document.getElementById('department').style.backgroundColor = '#211f1f';
    document.getElementById('department').style.color = '#FFFFFF';
  }else if (window.location.href.indexOf('password') != -1) {
    document.getElementById('password').style.backgroundColor = '#211f1f';
    document.getElementById('password').style.color = '#FFFFFF';
  }else if (window.location.href.indexOf('adjustment') != -1) {
    document.getElementById('adjustment').style.backgroundColor = '#211f1f';
    document.getElementById('adjustment').style.color = '#FFFFFF';
  }
</script>
<!-- <form action="index.php?quanly=timkiem&ac=sp" method="post" enctype="multipart/form-data">
  <p>
    <input type="text" name="masp" placeholder="Nhập mã sản phẩm..." id="timkiem" required="required" />
    <input type="submit" id="button_timkiem" name="timkiem" value="Tìm sản phẩm" />
  </p>
</form> -->