<?php
  session_start();
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

  if (!$db) {
    die('Connection failed.??');
  }


  //nothing wrong up to here

  if(isset($_POST['submit'])){

      $email = $_SESSION["email"];


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

      $q =  "INSERT INTO service(serviceId,serviceTitle,serviceStart,serviceEnd,max,price,email) VALUES('$numRow','$title','$startDate','$endDate','$max','$price','$email')";

      $execute = pg_query($db,$q);

      if($execute){
        $date = new DateTime($startDate);
        $dateEnd = new DateTime($endDate);

        //works
        while ($date->format('Y-m-d') <= $dateEnd->format('Y-m-d')) {
          $insertDate = $date->format('Y-m-d');
          $q1 = "INSERT INTO service_dates(date_avail,sitter_email,serviceid) VALUES('$insertDate','$email','$numRow')";
          $execute1 = pg_query($db,$q1);
          $date->modify('+1 day');
         }
        echo "<script>alert('Succesfully added a Service!')</script>";
        include('listedServices.php');
      }
      else{
        echo "<script>alert('Not able to create new service')</script>";
        include('newService.php');
      }
  }

 ?>
