<?php
  session_start();
  include('connection.php');
  if(isset($_POST['submit'])){

    $email          = $_SESSION["email"];
    $firstName      = $_POST[firstName];
    $lastName       = $_POST[lastName];
    $address        = $_POST[address];
    $password       = $_POST[password];
    $additionalInfo = $_POST[additionalInfo];

    $q = "UPDATE petsitter SET password = '{$password}', address = '{$address}', lastName = '{$lastName}', firstName = '{$firstName}', additionalinformation = '{$additionalInfo}' WHERE email = '{$email}'";

    $result = pg_query($db,$q);

    //$cmdtuples = pg_affected_rows($result);

    $_SESSION["firstName"]      = $firstName;
    $_SESSION["lastName"]       = $lastName;
    $_SESSION["email"]          = $email;
    $_SESSION["password"]       = $password;
    $_SESSION["address"]        = $address;
    $_SESSION["additionalInfo"] = $additionalInfo;

    echo "<script>alert('Successfully updated your profile!')</script>";
    include("profile_ps.php");
  }
 ?>
