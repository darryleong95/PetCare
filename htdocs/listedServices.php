<?php
  session_start();
  include('connection.php');
  if($_SESSION['alert-message-delete-service-pass']){
    echo "<script>alert('Succesfully deleted entry!')</script>";
    $_SESSION['alert-message-delete-service-pass'] = false;
  }
  if($_SESSION['alert-message-delete-service-fail']){
    echo "<script>alert('Service ID entered does not exist')</script>";
    $_SESSION['alert-message-delete-service-fail'] = false;
  }
  if($_SESSION['alert-message-delete-service-fail-2']){
    echo "<script>alert('Service ID entered does not exist: Error deleting')</script>";
    $_SESSION['alert-message-delete-service-fail-2'] = false;
  }
  if($_SESSION["alert-message-service-pass"]) {
    echo "<script>alert('Succesfully added a Service!')</script>";
    $_SESSION['alert-message-service-pass'] = false;
  }
  if($_SESSION["already-accepted"]){
    echo "<script>alert('Unable to delete service. You have already accepted a service.')</script>";
    $_SESSION["already-accepted"] = false;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Listed Services</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="css/service-request-pet.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand" />
  <!--===============================================================================================-->
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
  <div class="inner-container">
    <div class="nav-wrapper">
      <?php include('navbar.php') ?>
    </div>
    <div class="header-service">
      <h2><i class="fas fa-cogs"></i> Services</h2>
    </div>
    <div class="overall-wrapper">
      <div class="content-wrapper">
      <!--Loop listed pet results-->
      <?php
        $id = $_SESSION["id"];
        $q = "SELECT * FROM service WHERE petsitterid = '$id'";

        $result = pg_query($db,$q);


        //print_r(pg_fetch_array($result));
        while ($row = pg_fetch_array($result)) {
            echo "<div class='service-block'>";
            echo "<p>" . $row['servicetitle'] . "</p>";
            echo "Date range: ";
            echo $row['servicestart'];
            echo " - ";
            echo $row['serviceend'];
            echo "<br>";
            echo "Cost/night: " . $row['price'] . "<br>";
            echo "Maximum number of pets: " . $row['max'] . "<br>";
            echo "Id: " . $row['serviceid'];
            // echo "<form method='POST' action='deleteService.php'>
            //         Id: <input type='text' value =" . $row['serviceid'] . " id='id' name='id' disabled/>
            //         <input type='submit' name='submit' value='Delete service' class='btn'/>
            //       </form>";
            echo "</div>";
        }

       ?>
      </div>
      <div class="deleteForm">
        <form class="" action="deleteService.php" method="post">
          <div class="input">
            <input class="form-control" size=10 type='text' id='id' name='id' placeholder="Input ID"/>
          </div>
          <center>
            <input type='submit' name='submit' value='Delete service' class='btn-delete-service'/>
          </center>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
