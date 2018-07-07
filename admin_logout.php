  <?php
     session_start();
     session_destroy(); 
     setcookie("admin_login" , "" , time()-1);
	 header("Location:index.php");	
  ?>
  