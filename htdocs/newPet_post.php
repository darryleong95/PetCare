<?php
  session_start();
  include('connection.php');

  $id = $_SESSION["id"];

  $allPets = pg_query($db, "SELECT * FROM has_pet");
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

      $execute = pg_query($db, "INSERT INTO has_pet(petid,petName,sex,breed,dob,additionalInfo,petownerid,pettype)
      VALUES('$numRow','$_POST[petName]','$gender','$_POST[breed]','$_POST[dob]','$_POST[additionalInfo]','$id','$_POST[type]')");

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
