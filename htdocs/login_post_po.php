<?php
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
  session_start();
  if (!$db) {
    die('Connection failed.??');
  }

  if(isset($_POST['submit'])){
    $email    = $_POST[email];
    $password = $_POST[password];

    //check if administrator is trying to log in
    if($email == "admin" && $password == "admin"){
      $_SESSION["email"]          = $email;
      $_SESSION["password"]       = $password;
      $_SESSION["userType"]       = "ad";

      echo "<script>alert('Welcome Mr. Admin')</script>";
      include('adminPage.php');
    }
    else{
      $result = pg_query($db, "SELECT * FROM petowner WHERE email = '$email' AND password = '$password';");
      $numRow = pg_num_rows($result);

      if($numRow != 1){
        session_destroy();
        echo "<script>alert('Incorrect Email/ Password please try again')</script>";
        include('login_po.php');
        exit();
      }
      else{
        while($row = pg_fetch_array($result)){
          $_SESSION["firstName"]      = $row['firstname'];
          $_SESSION["lastName"]       = $row['lastname'];
          $_SESSION["email"]          = $row['email'];
          $_SESSION["password"]       = $row['password'];
          $_SESSION["address"]        = $row['address'];
          $_SESSION["userType"]       = "po";
          $_SESSION["id"]             = $row['petownerid'];

          include("profile_po.php");
          //echo "<a href='profile.php'>Click here to view your profile!</a>";
        }
      }
    }
  }
 ?>
