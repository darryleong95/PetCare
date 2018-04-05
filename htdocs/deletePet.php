<?php
  session_start();
  include('connection.php');

  if(isset($_POST['submit'])){

    $id = $_POST[id];
    $ownerId = $_SESSION['id'];
    $first = "SELECT * FROM has_pet WHERE petid='$id' AND petownerid = '$ownerId'";
    $execute = pg_query($db,$first);
    if(pg_num_rows($execute) == 0){
      //No such pet exists
      $_SESSION['initial-delete-pet-fail'] = true;
      header('Location:listedPets.php');
    }
    else{
      //go ahead and delete
      $q = "DELETE FROM has_pet WHERE petid = '$id'";

      $execute = pg_query($db,$q);

      if($execute){
        $_SESSION['delete-pet-pass'] = true;
      }
      else{
        $_SESSION['delete-pet-fail'] = true;
      }
      header('Location:listedPets.php');
    }
  }

 ?>
