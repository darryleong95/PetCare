<?php
include('connection.php');

if(isset($_POST['submit'])){
  $requestid = $_POST[id];
  $petsitterid = $_SESSION['id'];
  $q = "SELECT * FROM request WHERE requestid = '$requestid' AND  petsitterid = '$petsitterid'";
  $preUpdate = pg_query($db,$q);
  if(pg_num_rows($preUpdate) == 0){
    $_SESSION['fail-request'] = true;
    header('Location:receivedRequest.php');
  }
  else{
    while($row = pg_fetch_array($preUpdate)){
      if($row['status'] == "ACCEPTED"){
        //request was already accepted.
        $_SESSION['status-accepted'] = true;
        header('Location:receivedRequest.php');
      }
      else{
        $serviceid = $row['serviceid'];
        $acceptRequest = "SELECT * FROM acceptRequest($serviceid,$requestid);";
        $acceptRequestQ = pg_query($db,$acceptRequest);
        if($acceptRequestQ){
          if(pg_fetch_result($acceptRequestQ,0) == 't'){
            //max number of pets allowed exceeded
            $_SESSION['fail-request'] = true;
            header('Location:receivedRequest.php');
          }
          else{
          //still within range
          //proceed with updates
            $q2 = "SELECT * FROM request WHERE requestid = '$requestid'";
            $retrieveRequest = pg_query($db,$q2);
            while($result2 = pg_fetch_array($retrieveRequest)){
              $serviceid = $result2['serviceid'];
              $startDate = new DateTime($result2['requeststart']);
              $endDate = new DateTime($result2['requestend']);
              while ($startDate->format('Y-m-d') <= $endDate->format('Y-m-d')) {
                $insertDate = $startDate->format('Y-m-d');
                $avail = "t";
                $q3 = "UPDATE provides SET availability = '$avail' WHERE (date_avail = '$insertDate' AND serviceid = '$serviceid');";
                $updateDateStatus = pg_query($db,$q3);
                if(!$updateDateStatus){ echo "Error in updating provides";}
                $startDate->modify('+1 day');
              }
            }
            $_SESSION['pass-request'] = true;
            header('Location:receivedRequest.php');
          }
        }
        else{
          //request not executed correctly
          $_SESSION['fail-request'] = true;
          header('Location:receivedRequest.php');
        }
      }
    }
  }
}
?>
