<?php
  session_start();
  include('connection.php');
  if($_SESSION['alert-message-profile-pass']){
    echo "<script>alert('Successfully updated your profile!')</script>";
    $_SESSION['alert-message-profile-pass'] = false;
  }
  if($_SESSION['new-pet-fail']){
    echo "<script>alert('Unable to add new pet')</script>";
    $_SESSION['new-pet-fail'] = false;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profile page</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="inner-container">
      <div class="nav-wrapper">
        <?php include('navbar.php') ?>
      </div>
      <div class="content-wrapper po">
        <div class="profile-section po">
          <?php include('profileComponent.php') ?>
        </div>
        <div class="new-pet-section po">
          <?php include('newPetComponent.php') ?>
        </div>
        <div class="my-pets-section po">
          <?php include('myPetComponent.php') ?>
        </div>
      </div>
    </div>
  </body>
</html>
