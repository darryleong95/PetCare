<?php
  include('connection.php');
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
    $petownerid     = $_SESSION['id'];
    $serviceid      = $_SESSION['serviceid'];
    $petsitterid    = $_SESSION['petsitterid'];

    $q =  "INSERT INTO request(requestId,requeststart,requestend,message,petownerid,serviceid,bid, petsitterid) VALUES('$reqId','$startDate','$endDate','$additionalInfo','$petownerid', '$serviceid','$bid', '$petsitterid')";

    $execute = pg_query($db,$q);

    if($execute){
      echo "<script>alert('Request was successfully made!')</script>";
      include('madeRequest.php'); //re route to correct place
    }
    else{
      //thing of failure case?
      echo "<script>alert('Unable to make a request, please try again.')</script>";
      include('applyForService.php');
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