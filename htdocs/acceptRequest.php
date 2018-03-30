<?php
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
  session_start();
  if (!$db) {
    die('Connection failed.??');
  }
  if(isset($_POST['submit'])){

    $requestid = $_POST[id];
    $q1 = "UPDATE request SET status = 'accepted' WHERE requestid = '$requestid'";
    $updateQuery = pg_query($db,$q1);
    if(!$updateQuery){echo "Error in updating status";}

    $q2 = "SELECT * FROM request WHERE requestid = '$requestid'";
    $retrieveRow = pg_query($db,$q2);
    if(!$retrieveRow){
      echo "Error in retrieving row";
    }
    else{
      while($row = pg_fetch_array($retrieveRow)){
        $startDate = new DateTime($row['requeststart']);
        $endDate   = new DateTime($row['requestend']);
        $serviceid = $row['serviceid'];
        //works
        while ($startDate->format('Y-m-d') <= $endDate->format('Y-m-d')) {
          $insertDate = $startDate->format('Y-m-d');
          $avail = "t";
          $q3 = "UPDATE provides SET availability = '$avail' WHERE date_avail = '$insertDate' AND serviceid = '$serviceid'";
          $updateDateStatus = pg_query($db,$q3);
          if(!$updateDateStatus){ echo "Error in updating provides";}
          $startDate->modify('+1 day');
         }
      }
      echo "<script>alert('Request has been accepted!')</script>";
      include('receivedRequest.php');
    }
  }
?>
