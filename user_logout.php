<?php
  session_start();
  session_destroy();
  setcookie("user_login" , "" , time()-1);
  header("Location:index.php");	
?>
  