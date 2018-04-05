<?php
include('connection.php');
//Reject only possible if currents status is "PENDING"
if(isset($_POST['submit'])){
  $requestid = $_POST[id];
  $isPending = "SELECT * FROM request WHERE requestid = $requestid AND status = 'PENDING';";
  $isPendingQ = pg_query($db,$isPending);
  if($isPendingQ){
    if(pg_num_rows($isPendingQ) == 0){
      $_SESSION['reject-fail'] = true;
      header("Location:receivedRequest.php");
    }
    else{
      //Execute rejection
      $reject = "UPDATE request SET status = 'REJECT' WHERE requestid = $requestid;";
      $rejectQ = pg_query($db,$reject);
      if($rejectQ){
        $_SESSION['reject-pass'] = true;
        header("Location:receivedRequest.php");
      }
      else{
        //Error while rejecting
        $_SESSION['reject-fail'] = true;
        header("Location:receivedRequest.php");
      }
    }
  }
  else{
    //Error while accepting
    $_SESSION['search-fail'] = true;
    header("Location:receivedRequest.php");
  }
}
?>
