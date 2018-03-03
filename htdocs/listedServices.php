<?php
  session_start();
  include('navbar.php');
?>
<!DOCTYPE html>
<html>
<header>
  <title>Registered Pets</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/sideBar.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</header>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <?php include 'sidebar_ps.php' ?>
      </div>
      <div class="col-sm-9">
          <div class="header">
            <h2>Pets Services</h2>
          </div>
          <br>
          <!--Loop listed pet results-->
          <?php
            $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
            if (!$db) {
              die('Connection failed.??');
            }
            $email = $_SESSION["email"];
            $q = "SELECT * FROM service WHERE email = '$email'";

            $result = pg_query($db,$q);


            //print_r(pg_fetch_array($result));
            while ($row = pg_fetch_array($result)) {
                echo "Title: " . $row['servicetitle'] . "<br>";
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
                echo nl2br("<br><br>");
            }

           ?>
           <form class="" action="deleteService.php" method="post">
             Id: <input size=3 type='text' id='id' name='id' />
             <input type='submit' name='submit' value='Delete service' class='btn'/>
           </form>
    </div>
  </div>
</body>
</html>
