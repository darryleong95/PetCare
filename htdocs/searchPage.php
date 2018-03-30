<?php
  session_start();
  include('connection.php');
  include 'navbar.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Search page</title>
    <link rel="stylesheet" href="css/searchPage.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/applyservice.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="content">
      <?php
          $q = "SELECT * FROM service";

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
              echo "Maximum number of pets: " . $row['max']  . "<br>";
              echo "Id: " . $row['serviceid'];
              echo nl2br("<br><br>");
          }
      ?>
    </div>
    <div class="form_class">
     <form name="apply" action="applyForService.php" method="POST">
       <div class="form-group">
         <label for="id">Select Sitter ID to apply for:  </label>
         <select class="" id="id" name='id'>
            <?php
              $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
              if (!$db) {
                die('Connection failed.??');
              }
              $q = "SELECT * FROM service";
              $result = pg_query($db,$q);
              while ($row = pg_fetch_array($result)) {
                  echo "<option value='" . $row['serviceid'] . "'>" . $row['serviceid'] . "</option>";
              }
             ?>
         </select>
       </div>
       <div class="form-group">
         <input type='submit' name='submit' value='Apply for service' class='btn'/>
       </div>
     </form>
    </div>
  </body>
</html>
