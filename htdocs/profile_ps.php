<?php
  session_start();
  include('connection.php');
  if($_SESSION['alert-message-service-fail']){
    echo "<script>alert('Not able to add service. End date cannot preceed start date. Please try again')</script>";
    $_SESSION['alert-message-service-fail'] = false;
  }
  if($_SESSION['alert-message-profile-pass']){
    echo "<script>alert('Successfully updated your profile!')</script>";
    $_SESSION['alert-message-profile-pass'] = false;
  }
  if($_SESSION['alert-message-profile-fail']){
    echo "<script>alert('Error while updating your profile. Please try again.')</script>";
    $_SESSION['alert-message-profile-fail'] = false;
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
    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

    <script type="text/javascript" src="http://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="inner-container">
      <div class="nav-wrapper">
        <?php include('navbar.php') ?>
      </div>
      <div class="content-wrapper">
        <div class="profile-section">
          <?php include('profileComponent.php') ?>
        </div>
        <div class="new-service-section">
          <?php include('newServiceComponent.php') ?>
        </div>
        <div class="upcoming-section">
          <?php include('upcomingComponent.php') ?>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
var firstName = document.forms['updateProfile_form']['firstName'];
var lastName = document.forms['updateProfile_form']['lastName'];
var password = document.forms['updateProfile_form']['password'];
var address = document.forms['updateProfile_form']['address'];

var firstName_err = document.getElementById("firstName_err");
var lastName_err = document.getElementById("lastName_err");
var password_err = document.getElementById("password_err");
var address_err = document.getElementById("address_err");

firstName.addEventListener('blur', firstNameVerify, true);
lastName.addEventListener('blur', lastNameVerify, true);
password.addEventListener('blur', passwordVerify, true);
address.addEventListener('blur', addressVerify, true);

function Validate() {
 //validate firstName
 if (firstName.value.trim() == "") {
   firstName.style.border = "1px solid red";
   document.getElementById('firstName_div').style.color = "red";
   firstName_err.textContent = "First name is required";
   firstName.focus();
   return false;
 }
 //validate lastName
 if (lastName.value.trim() == "") {
   lastName.style.border = "1px solid red";
   document.getElementById('lastName_div').style.color = "red";
   lastName_err.textContent = "Last name is required";
   lastName.focus();
   return false;
 }
 //validate password
 if (password.value.trim() == "") {
   password.style.border = "1px solid red";
   document.getElementById('password_div').style.color = "red";
   password_err.textContent = "Password is required";
   password.focus();
   return false;
 }
 //validate address
 if (address.value.trim() == "") {
   address.style.border = "1px solid red";
   document.getElementById('address_div').style.color = "red";
   address_err.textContent = "Address is required";
   address.focus();
   return false;
 }
}

function firstNameVerify() {
 if (firstName.value.trim() != "") {
  firstName.style.border = "1px solid #5e6e66";
  document.getElementById('firstName_div').style.color = "#5e6e66";
  firstName_err.innerHTML = "";
  return true;
 }
}

function lastNameVerify() {
 if (lastName.value.trim() != "") {
  lastName.style.border = "1px solid #5e6e66";
  document.getElementById('lastName_div').style.color = "#5e6e66";
  lastName_err.innerHTML = "";
  return true;
 }
}

function addressVerify() {
 if (address.value.trim() != "") {
  address.style.border = "1px solid #5e6e66";
  document.getElementById('address_div').style.color = "#5e6e66";
  address_err.innerHTML = "";
  return true;
 }
}

 function passwordVerify() {
  if (password.value.trim() != "") {
   password.style.border = "1px solid #5e6e66";
   document.getElementById('password_div').style.color = "#5e6e66";
   password_err.innerHTML = "";
   return true;
  }
}
</script>
