<?php
  session_start();
  include('connection.php');

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
