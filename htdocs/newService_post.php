<?php
  session_start();
  include('connection.php');


  //nothing wrong up to here

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


      $title = $_POST[title];
      $startDate = $_POST[startDate];
      $endDate = $_POST[endDate];
      $max = $_POST[max];
      $price = $_POST[price];

      $q =  "INSERT INTO service(serviceId,serviceTitle,serviceStart,serviceEnd,max,price,petsitterid) VALUES('$numRow','$title','$startDate','$endDate','$max','$price','$id')";

      $execute = pg_query($db,$q);

      if($execute){
        $date = new DateTime($startDate);
        $dateEnd = new DateTime($endDate);

        //works
        while ($date->format('Y-m-d') <= $dateEnd->format('Y-m-d')) {
          $insertDate = $date->format('Y-m-d');
          $q1 = "INSERT INTO provides(date_avail,petsitterid,serviceid) VALUES('$insertDate','$id','$numRow')";
          $execute1 = pg_query($db,$q1);
          $date->modify('+1 day');
         }
        echo "<script>alert('Succesfully added a Service!')</script>";
        include('listedServices.php');
      }
      else{
        echo "<script>alert('Not able to create new service')</script>";
        include('profile_ps.php');
      }
  }

 ?>
