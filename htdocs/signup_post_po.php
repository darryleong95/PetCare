<?php
  session_start();
  include('connection.php');

  $result = pg_query($db, "SELECT * FROM petowner WHERE email = '$_POST[email]'");
  $numRow = pg_num_rows($result);

  if(isset($_POST['submit'])){
    if($numRow == 0){
      //get newest ID
      $result1 = pg_query($db, "SELECT * FROM petowner o1 WHERE o1.petownerid >= all(SELECT petownerid FROM petowner o2)");
      if(pg_num_rows($result1) == 1){
        while($row = pg_fetch_array($result1)){
          $newId = $row['petownerid'] + 1;
        }
      }
      else{
        $newId = 0;
      }

      $execute = pg_query($db, "INSERT INTO petowner(petownerId,firstname,lastname,email,password,address)
      VALUES('$newId','$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[password]','$_POST[address]')");

      if($execute){
        //redirect to profile page
        $_SESSION["id"]        = $newId;
        $_SESSION["firstName"] = $_POST[firstName];
        $_SESSION["lastName"]  = $_POST[lastName];
        $_SESSION["address"]   = $_POST[address];
        $_SESSION["email"]     = $_POST[email];
        $_SESSION["password"]  = $_POST[password];
        $_SESSION["userType"]  = "po";

        header("Location:profile_po.php");
      }
      else{
        session_destroy();
        echo "<script>alert('Unable to register, please try again $newId')</script>";
        header("Location:signup_po.php");; /* Redirect browser */
        exit();
      }
    }
    else{
      session_destroy();
      echo "<script>alert('Email already in use, please log in')</script>";
      header("Location:login_po.php");; /* Redirect browser */
      exit();
    }
  }
 ?>
