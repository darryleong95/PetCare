<?php
  session_start();
  include('connection.php');

  if(isset($_POST['submit'])){

    $id = $_POST[id];
    $sitterid = $_SESSION['id'];

    $canDelete = "SELECT * FROM request WHERE serviceid = '$id' AND status = 'ACCEPTED'";

    $execute = pg_query($db,$canDelete);

    if($execute){
      if(pg_num_rows($execute) == 0){
        $query = "SELECT * FROM service WHERE serviceid = '$id' AND petsitterid = '$sitterid'";
        $execute1 = pg_query($db,$query);
        if(pg_num_rows($execute1) == 0){
          $_SESSION['alert-message-delete-service-fail'] = true;
          header('Location:listedServices.php');
        }
        else{
          $q = "DELETE FROM service WHERE serviceid = '$id'";
  
          $execute2 = pg_query($db,$q);
  
          if($execute2){
            $_SESSION['alert-message-delete-service-pass'] = true;
          }
          else{
            $_SESSION['alert-message-delete-service-fail-2'] = true;
          }
          header('Location:listedServices.php');
        }
      }
      else{
        $_SESSION['already-accepted'] = true;
      header('Location:listedServices.php');
      }
    }
    else{
      $_SESSION['alert-message-delete-service-fail-2'] = true;
      header('Location:listedServices.php');
    }
  }

 ?>
