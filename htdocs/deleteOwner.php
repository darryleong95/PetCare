<?php
  session_start();
  include('connection.php');

  if(isset($_POST['submit'])){

    $id = $_POST[id];
    $q = "DELETE FROM petowner WHERE petownerid = '$_POST[id]'";

    $execute = pg_query($db,$q);

    if($execute){
      echo "<script>alert('Succesfully removed Pet owner!')</script>";
    }
    else{
      echo "<script>alert('Problem with removing Owner: $id, please try again.')</script>";
    }
    header('Location:allOwners.php');

  }

 ?>
