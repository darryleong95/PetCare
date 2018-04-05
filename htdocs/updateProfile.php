<?php
  session_start();
  include('connection.php');
  if(isset($_POST['submit'])){

    $email          = $_SESSION["email"];
    $firstName      = pg_escape_string($_POST[firstName]);
    $lastName       = pg_escape_string($_POST[lastName]);
    $address        = pg_escape_string($_POST[address]);
    $password       = pg_escape_string($_POST[password]);

    $_SESSION["firstName"]      = $firstName;
    $_SESSION["lastName"]       = $lastName;
    $_SESSION["email"]          = $email;
    $_SESSION["password"]       = $password;
    $_SESSION["address"]        = $address;

    if($_SESSION["userType"] == "po"){
      $q = "UPDATE petowner SET password = '{$password}', address = '{$address}', lastName = '{$lastName}', firstName = '{$firstName}' WHERE email = '{$email}'";
      $result = pg_query($db,$q);
      $_SESSION["alert-message-profile-pass"] = true;
      header("Location:profile_po.php");
    }
    else if($_SESSION["userType"] == "ps"){
      $additionalInfo = pg_escape_string($_POST[additionalInfo]);
      $_SESSION["additionalInfo"] = $additionalInfo;
      $q = "UPDATE petsitter SET password = '{$password}', address = '{$address}', lastName = '{$lastName}', firstName = '{$firstName}', additionalinformation = '{$additionalInfo}' WHERE email = '{$email}'";
      $result = pg_query($db,$q);
      if($result){
        $_SESSION["alert-message-profile-pass"] = true;
      }
      else{
        $_SESSION["alert-message-profile-fail"] = true;
      }
      header("Location:profile_ps.php");
    }
  }
 ?>
