<?php
  session_start();
  include('navbar.php');
?>
<!DOCTYPE html>
<html>
  <header>
    <title>Cool stats</title>

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
          <?php include 'sidebar_admin.php' ?>
        </div>
        <div class="col-sm-9">
            <div class="header">
              <h2>Cool stats</h2>
            </div>
            <br>
            <!--Loop listed pet results-->
            <?php
              $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
              if (!$db) {
                die('Connection failed.??');
              }
              $num_sitters = "SELECT count(*) FROM petsitter";
              $num_owners = "SELECT count(*) FROM petowner";
              $num_services = "SELECT count(*) FROM service";;
              $most_expensive_service = "SELECT * FROM service where price >= all(SELECT price FROM service s2)";
              $pets_pet_customer = "SELECT count(*) FROM pets WHERE";
              $sitters_with_service;

             ?>
      </div>
    </div>
  </body>
</html>
