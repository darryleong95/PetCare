<?php
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
  session_start();
  if (!$db) {
    die('Connection failed.??');
  }
  if(isset($_POST['submit'])){
    $allRequests = pg_query($db, "SELECT requestId FROM request r1 WHERE requestId >= all(SELECT requestId FROM request r2)");

    if(pg_num_rows($allRequests) != 0){
      while($row = pg_fetch_array($allRequests)){
        $reqId = $row['serviceid'] + 1;
      }
    }
    else{
      $reqId = 0;
    }

    $startDate      = $_POST[startDate];
    $endDate        = $_POST[endDate];
    $additionalInfo = $_POST[additionalInfo];
    $bid            = $_POST[bid];
    $email          = $_SESSION['email'];
    $serviceid      = $_SESSION['serviceid'];
    $sitterEmail    = $_SESSION['ps_email'];

    $q =  "INSERT INTO request(requestId,requeststart,requestend,message,owneremail,serviceid,bid, sitteremail) VALUES('$reqId','$startDate','$endDate','$additionalInfo','$email', '$serviceid','$bid', '$sitterEmail')";

    $execute = pg_query($db,$q);

    if($execute){
      echo "Success"; //re route to correct place
    }
    else{
      "Failure";
    }
    // while($row = pg_fetch_array($execute)) {
    //     $_SESSION['startDate'] = $row['servicestart'];
    //     $_SESSION['endDate']   = $row['serviceend'];
    //     $_SESSION['title']     = $row['servicetitle'];
    //     $_SESSION['max']       = $row['max'];
    //     $_SESSION['price']     = $row['price'];
    //     $_SESSION['ps_email']  = $row['email'];
    // }
  }
?>
