<?php
  include('connection.php');
  if(isset($_POST['submit'])){
    $requestid = $_POST[id];
    $delete = "SELECT * FROM deleteRequest($requestid);";
    $deleteQ = pg_query($db,$delete);
    if($deleteQ){
      if(pg_fetch_result($deleteQ,0) == 't'){
        //delete successful
        $_SESSION['delete-pass'] = true;
        header("Location:madeRequest.php");
      }
      else{
        //failed to delete
        $_SESSION['delete-fail'] = true;
        header("Location:madeRequest.php");
      }
    }
    else{
      //error deleting
      $_SESSION['delete-error'] = true;
      header("Location:madeRequest.php");
    }
  }
?>
