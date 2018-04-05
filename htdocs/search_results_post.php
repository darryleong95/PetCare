<?php
session_start();
include('connection.php');
if(isset($_POST['submit-select'])){
  $q = "SELECT * FROM service WHERE serviceid = '$_POST[id]'";
  $execute = pg_query($db,$q);
  while($row = pg_fetch_array($execute)) {
      $_SESSION['startDate']    = $row['servicestart'];
      $_SESSION['endDate']      = $row['serviceend'];
      $_SESSION['title']        = $row['servicetitle'];
      $_SESSION['max']          = $row['max'];
      $_SESSION['price']        = $row['price'];
      $_SESSION['petsitterid']  = $row['petsitterid'];
      $_SESSION['serviceid']    = $row['serviceid'];
  }
  header('Location:applyForService.php'); //re route to correct place
}
 ?>
