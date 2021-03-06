<?php
  session_start();
  include('connection.php');

  if(isset($_POST['submit'])){
      $id = $_SESSION["id"];
      $allServices = pg_query($db, "SELECT serviceid FROM service s1 WHERE serviceid >= all(SELECT serviceid FROM service s2)");

      if(pg_num_rows($allServices) != 0){
        while($row = pg_fetch_array($allServices)){
          $numRow = $row['serviceid'] + 1;
        }
      }
      else{
        $numRow = 0;
      }

      $title = pg_escape_string($_POST[title]);
      $startDate = $_POST[startDate];
      $endDate = $_POST[endDate];
      $max = $_POST[max];
      $price = $_POST[price];

      $q =  "INSERT INTO service(serviceId,serviceTitle,serviceStart,serviceEnd,price,petsitterid,max) VALUES('$numRow','$title','$startDate','$endDate','$price','$id','$max');";

      $execute = pg_query($db,$q);

      if($execute){

        //GET LATEST PROVIDES Id
        $latestProvides = "SELECT * FROM provides p1 WHERE providesid >= all(SELECT providesid FROM provides p2)";
        $latestProvidesResults = pg_query($db,$latestProvides);
        if(pg_num_rows($latestProvidesResults) != 0){
          while($row = pg_fetch_array($latestProvidesResults)){
            $providesid = $row['providesid'] + 1;
          }
        }
        else{
          $providesid = 0;
        }

        $d1 = new DateTime($startDate);
        $d2 = new DateTime($endDate);

        while($d1->format('Y-m-d') <= $d2->format('Y-m-d')){
          $insertDate = $d1->format('Y-m-d');
          $q1 = "INSERT INTO provides(providesid,date_avail,petsitterid,serviceid) VALUES('$providesid','$insertDate','$id','$numRow');";
          $providesid++;
          $execute1 = pg_query($db,$q1);
          if($execute1){
            $d1->modify('+1 day');
          }
        }
        $_SESSION["alert-message-service-pass"] = true;
        header('Location:listedServices.php');
      }
      else{
        $_SESSION["alert-message-service-fail"] = true;
        header('Location:profile_ps.php');
      }
  }

 ?>
