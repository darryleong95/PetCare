<?php
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
  session_start();
  if (!$db) {
    die('Connection failed.??');
  }

  if(isset($_POST['submit'])){
    $email = $_POST[email];
    $password = $_POST[password];

    //check if administrator is trying to log in
    if($email == 'admin' && $password == 'admin'){
      $_SESSION["email"]          = $email;
      $_SESSION["password"]       = $password;
      $_SESSION["userType"]       = "ad";

      echo "<script>alert('Welcome Mr. Admin')</script>";
      include('adminPage.php');
    }
    else{
      $result = pg_query($db, "SELECT * FROM petsitter WHERE email = '$email' AND password = '$password';");
      $numRow = pg_num_rows($result);

      if($numRow != 1){
        session_destroy();
        echo "Fatal error logging in please try again";
        exit();
      }
      else{
        while($row = pg_fetch_row($result)){
          $_SESSION["firstName"]      = $row[0];
          $_SESSION["lastName"]       = $row[1];
          $_SESSION["email"]          = $row[2];
          $_SESSION["password"]       = $row[3];
          $_SESSION["address"]        = $row[4];
          $_SESSION["avgrating"]      = $row[5];
          $_SESSION["additionalinfo"] = $row[6];
          $_SESSION["userType"]       = "ps";
          //echo "<a href='profile.php'>Click here to view your profile!</a>";
        }
        include("profile_ps.php");
      }
    }
  }
 ?>
