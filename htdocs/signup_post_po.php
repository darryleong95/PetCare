<?php
  session_start();
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

  if (!$db) {
    die('Connection failed.??');
  }

  $result = pg_query($db, "SELECT * FROM petowner WHERE email = '$_POST[email]'");
  $numRow = pg_num_rows($result);

  if(isset($_POST['submit'])){
    if($numRow == 0){
      $execute = pg_query($db, "INSERT INTO petowner(firstname,lastname,email,password,address)
      VALUES('$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[password]','$_POST[address]')");
      //redirect to profile page
      $_SESSION["firstName"] = $_POST[firstName];
      $_SESSION["lastName"] = $_POST[lastName];
      $_SESSION["address"] = $_POST[address];
      $_SESSION["email"] = $_POST[email];
      $_SESSION["password"] = $_POST[password];
      $_SESSION["userType"] = "po";

      include("profile_po.php");
      // echo '';
    }
    else{
      session_destroy();
      include("login_po.php");; /* Redirect browser */
      exit();
    }
  }
 ?>
