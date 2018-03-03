<?php
  session_start();
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

  if (!$db) {
    die('Connection failed.??');
  }

  $result = pg_query($db, "SELECT * FROM petsitter WHERE email = '$_POST[email]'");
  $numRow = pg_num_rows($result);

  if(isset($_POST['submit'])){
    if($numRow == 0){
      $execute = pg_query($db, "INSERT INTO petsitter(firstname,lastname,email,password,address)
      VALUES('$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[password]','$_POST[address]')");
      //redirect to profile page
      $_SESSION["firstName"]= $_POST[firstName];
      $_SESSION["lastName"] = $_POST[lastName];
      $_SESSION["address"]  = $_POST[address];
      $_SESSION["email"]    = $_POST[email];
      $_SESSION["password"] = $_POST[password];
      $_SESSION["userType"] = "ps";

      include("profile_ps.php");
    }
    else{
      session_destroy();
      echo "<script>alert('Email already in use, please log in')</script>";
      include("login_ps.php"); /* Redirect browser */
      exit();
    }
  }
 ?>
