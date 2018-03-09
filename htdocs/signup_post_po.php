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
      //get newest ID
      $result1 = pg_query($db, "SELECT * FROM petowner WHERE petownerId >= all(SELECT petownerId FROM petowner o2)");
      if(pg_num_rows($result1) != 0){
        while($row = pg_fetch_array($result1)){
          $newId = $row['petownerId'] + 1;
        }
      }
      else{
        $newId = 0;
      }

      $execute = pg_query($db, "INSERT INTO petowner(petownerId,firstname,lastname,email,password,address)
      VALUES('$newId','$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[password]','$_POST[address]')");

      if($execute){
        //redirect to profile page
        $_SESSION["id"] = $newId;
        $_SESSION["firstName"] = $_POST[firstName];
        $_SESSION["lastName"] = $_POST[lastName];
        $_SESSION["address"] = $_POST[address];
        $_SESSION["email"] = $_POST[email];
        $_SESSION["password"] = $_POST[password];
        $_SESSION["userType"] = "po";

        include("profile_po.php");
      }
      else{
        session_destroy();
        echo "<script>alert('Unable to register, please try again')</script>";
        include("signup_po.php");; /* Redirect browser */
        exit();
      }
    }
    else{
      session_destroy();
      include("login_po.php");; /* Redirect browser */
      exit();
    }
  }
 ?>
