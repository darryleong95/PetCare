<?php
  include('connection.php');
  if(isset($_POST['submit'])){
    $email    = $_POST[email];
    $password = $_POST[password];

    //check if administrator is trying to log in
    if($email == "admin" && $password == "admin"){
      $_SESSION["email"]          = $email;
      $_SESSION["password"]       = $password;
      $_SESSION["userType"]       = "ad";
      header('Location:adminPage.php');
    }
    else{
      $result = pg_query($db, "SELECT * FROM petowner WHERE email = '$email' AND password = '$password';");
      $numRow = pg_num_rows($result);

      if($numRow == 0){
        session_destroy();
        echo "<script>alert('Incorrect Email/ Password please try again')</script>";
        header('Location:login.php');
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
        }
        header("Location:profile_po.php");
      }
    }
  }
 ?>
