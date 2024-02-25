<?php
  session_start();
  session_destroy();
  setcookie("token", "", time() - 3600,  "/", "", true, true);
header('location:index.php');
?>
