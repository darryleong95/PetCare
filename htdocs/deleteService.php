<?php
  session_start();
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

  if (!$db) {
    die('Connection failed.??');
  }

  if(isset($_POST['submit'])){

    $id = $_POST[id];
    $q = "DELETE FROM service WHERE serviceid = '$_POST[id]'";

    $execute = pg_query($db,$q);

    if($execute){
      echo "<script>alert('Succesfully deleted entry!')</script>";
    }
    else{
      echo "<script>alert('Problem with deleting entry, please try again. " .  $id .  ".')</script>";
    }
    include('listedServices.php');

  }

 ?>
