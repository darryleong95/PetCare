<?php
  session_start();
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

  if (!$db) {
    die('Connection failed.??');
  }


  //nothing wrong up to here

  if(isset($_POST['submit'])){

      $email = $_SESSION["email"];

      $allServices = pg_query($db, "SELECT * FROM service");

      $numRow = pg_num_rows($allServices);

      $title = $_POST[title];
      $startDate = $_POST[startDate];
      $endDate = $_POST[endDate];
      $max = $_POST[max];
      $price = $_POST[price];

      $q =  "INSERT INTO service(serviceId,serviceTitle,serviceStart,serviceEnd,max,price,email) VALUES('$numRow','$title','$startDate','$endDate','$max','$price','$email')";

      $execute = pg_query($db,$q);

      if($execute){
        echo "<script>alert('Succesfully added a Service!')</script>";
        include('listedServices.php');
      }
      else{
        echo "<script>alert('Not able to create new service')</script>";
        include('newService.php');
      }
  }

 ?>
