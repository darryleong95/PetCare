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
      $gender;

      if($_POST['gender'] == 'Male'){
        $gender = "t";
      }
      else{
        $gender = "f";
      }

      $execute = pg_query($db, "INSERT INTO pet(petid,petName,sex,breed,dob,additionalInfo,email,pettype)
      VALUES('$numRow','$_POST[petName]','$gender','$_POST[breed]','$_POST[dob]','$_POST[additionalInfo]','$email','$_POST[type]')");

      if($execute){
        echo "<script>alert('New pet has been added!')</script>";
        include("listedPets.php");
      }
      else{
        echo "<script>alert('Unable to add new pet')</script>";
        include("newPet.php");
      }
      // echo '';

  }

 ?>
