<?php
  session_start();
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

  if (!$db) {
    die('Connection failed.??');
  }

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
