<?php
  session_start();
  include('connection.php');
  if(isset($_POST['submit'])){
    $startDate      = $_POST[startDate];
    $endDate        = $_POST[endDate];
    $additionalInfo = pg_escape_string($_POST[additionalInfo]);
    $bid            = $_POST[bid];
    $serviceid      = $_SESSION['serviceid'];
    $petsitterid    = $_SESSION['petsitterid'];
    $petownerid     = $_SESSION['id'];
    $allRequests = pg_query($db, "SELECT requestid FROM request r1 WHERE requestid >= all(SELECT requestId FROM request r2)");
    if(pg_num_rows($allRequests) != 0){
      while($row = pg_fetch_array($allRequests)){
        $reqId = $row['requestid'] + 1;
      }
    }
    else{
      $reqId = 0;
    }
    $d1 = new DateTime($startDate);
    $d2 = new DateTime($endDate);
    $d1 = $d1->format('Y-m-d');
    $d2 = $d2->format('Y-m-d');
    $canApply = "SELECT * FROM canApply('$petownerid','$d1','$d2');";
    $canApplyQ = pg_query($db,$canApply);
    if($canApplyQ){ 
      if(pg_fetch_result($canApplyQ,0) == 't'){
        $numPets = "SELECT * FROM tooManyPets('$reqId','$startDate','$endDate','$additionalInfo','$petownerid','$serviceid','$bid');";
        $execute = pg_query($db,$numPets);
    
        if($execute){
          if(pg_fetch_result($execute,0) == 't'){
            //too many, didnt go through
            $_SESSION['too-many'] = true;
            header('Location:applyForService.php');
          }
          else{
            $_SESSION['made-request-pass'] = true;
            header('Location:madeRequest.php');
          }
        }
        else{
          $_SESSION['made-request-fail'] = true;
          header('Location:applyForService.php');
        }
      }
      else{
        $_SESSION['already-accepted'] = true;
        header('Location:applyForService.php');
      }
    }
    else{
      $_SESSION['made-request-fails'] = true;
      header('Location:applyForService.php');
    }
  }
?>
