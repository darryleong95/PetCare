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
      //get newest ID
      $result1 = pg_query($db, "SELECT * FROM petsitter WHERE petsitterId >= all(SELECT petsitterId FROM petsitter s2)");
      if(pg_num_rows($result1) != 0){
        while($row = pg_fetch_array($result1)){
          $newId = $row['petsitterid'] + 1;
        }
      }
      else{
        $newId = 0;
      }

      $execute = pg_query($db, "INSERT INTO petsitter(petsitterid,firstname,lastname,email,password,address)
      VALUES('$newId','$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[password]','$_POST[address]')");

      if($execute){
        //redirect to profile page
        $_SESSION["id"]        = $newId;
        $_SESSION["firstName"] = $_POST[firstName];
        $_SESSION["lastName"]  = $_POST[lastName];
        $_SESSION["address"]   = $_POST[address];
        $_SESSION["email"]     = $_POST[email];
        $_SESSION["password"]  = $_POST[password];
        $_SESSION["userType"]  = "ps";

        include("profile_ps.php");
      }
      else{
        session_destroy();
        echo "<script>alert('Unable to register, please try again')</script>";
        include("signup_ps.php");; /* Redirect browser */
        exit();
      }
    }
    else{
      session_destroy();
      echo "<script>alert('Email already in use, please log in')</script>";
      include("login_ps.php"); /* Redirect browser */
      exit();
    }
  }
 ?>
