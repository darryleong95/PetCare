<?php
  session_start();
  $_SESSION = array();
  session_destroy();
  echo "<script>alert('Succesfully logged out!')</script>";
  include('home.php');
 ?>
