<?php
  session_start();
  include('connection.php');
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
      $firstName =  $_POST[firstName];
      $lastName =  $_POST[lastName];
      $email = $_POST[email];
      $password = $_POST[password];
      $address =  $_POST[address];

      $execute = pg_query($db, "INSERT INTO petsitter(petsitterid,firstname,lastname,email,password,address) VALUES('$newId','$firstName','$lastName','$email','$password','$address');");

      if($execute){
        //redirect to profile page
        $_SESSION["id"]        = $newId;
        $_SESSION["firstName"] = $_POST[firstName];
        $_SESSION["lastName"]  = $_POST[lastName];
        $_SESSION["address"]   = $_POST[address];
        $_SESSION["email"]     = $_POST[email];
        $_SESSION["password"]  = $_POST[password];
        $_SESSION["userType"]  = "ps";
        header("Location:profile_ps.php");
      }
      else{
        $_SESSION["fail-signup"] = true;
        header("Location:signup_ps.php"); /* Redirect browser */
      }
    }
    else{
      session_destroy();
      $_SESSION["already-signup"] = true;
      header("Location:login_ps.php"); /* Redirect browser */
    }
  }
 ?>
