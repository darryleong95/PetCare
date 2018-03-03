<?php
  session_start();
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

  if (!$db) {
    die('Connection failed.??');
  }

  $email = $_SESSION["email"];

  $allPets = pg_query($db, "SELECT * FROM pet");
  $numRow = pg_num_rows($allPets);

  $result = pg_query($db, "SELECT * FROM petowner WHERE email = '$email'");


  if(isset($_POST['submit'])){
      $execute = pg_query($db, "INSERT INTO pet(petid,petName,sex,breed,dob,additionalInfo,email)
      VALUES('$numRow','$_POST[petName]','$_POST[gender]','$_POST[breed]','$_POST[dob]','$_POST[additionalInfo]','$email')");
      //redirect to profile page

      echo "<script>alert('New pet has been added!')</script>";
      include("newPet.php");
      // echo '';

  }

 ?>
