<?php
  session_start();
  include('connection.php');
?>
<!DOCTYPE html>
<html>
<header>
  <title>Registered Pets</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="css/service.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</header>
<body>
  <div class="inner-container">
    <div class="nav-wrapper">
      <?php include('navbar.php') ?>
    </div>
    <div class="header-service">
      <h2>Services</h2>
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
