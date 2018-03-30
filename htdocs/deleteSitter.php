<?php
  session_start();
  include('connection.php');

  if(isset($_POST['submit'])){

    $id = $_POST[id];
    $q = "DELETE FROM petsitter WHERE petsitterid = '$_POST[id]'";

    $execute = pg_query($db,$q);

    if($execute){
      echo "<script>alert('Succesfully deleted Sitter!')</script>";
    }
    else{
      echo "<script>alert('Problem with removing Sitter: $id, please try again.')</script>";
    }
    include('allSitters.php');

  }

 ?>
