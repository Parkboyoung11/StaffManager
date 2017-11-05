 <div class="content">
 	<div class="box_contains">  
 		<?php
 		if(isset($_GET['quanly'])&&$_GET['ac']){
 			$tam=$_GET['quanly'];
 			$tam1=$_GET['ac'];
 		}else{
 			$tam='';
 		}

 		if(($tam == 'account')&&($tam1 == 'add')){

 			include('modules/CreatAccount/them.php');

 		}elseif(($tam == 'staff')&&($tam1 == 'them')){
 			
 			include('modules/Staff/them.php');

 		}elseif(($tam == 'staff')&&($tam1 == 'lietke')){
 			
 			include('modules/Staff/lietke.php');

 		}elseif(($tam == 'staff')&&($tam1 == 'sua')){
 			
 			include('modules/Staff/sua.php');
 			
 		}elseif(($tam == 'department')&&($tam1 == 'them')){
 			
 			include('modules/Department/them.php');

 		}elseif(($tam == 'department')&&($tam1 == 'lietke')){
 			
 			include('modules/Department/lietke.php');

 		}elseif(($tam == 'department')&&($tam1 == 'sua')){
 			
 			include('modules/Department/sua.php');

 		}elseif(($tam == 'timkiem')&&($tam1 == 'sp')){
 			
 			include('modules/timkiem/timkiem.php');

 		}elseif(($tam == 'password')&&($tam1 == 'reset')){

 			include('modules/ResetPassword/resetAll.php');

 		}else{
 			include('modules/Staff/lietke.php');
 		}
 		?>		
 	</div>
 </div>
 <div class="clear"></div>