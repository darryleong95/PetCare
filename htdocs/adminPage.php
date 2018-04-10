<?php
  session_start();
  include('connection.php');
?>
<!DOCTYPE html>
<html>
<header>
  <title>Admin page</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</header>
<body>
  <div>
    <?php include('navbar.php'); ?>
  </div>
  <div class="Information">
    <div class"">
      <p>Total number of services each Petsitter provides</p>
      <?php
        $query = "WITH t1 AS (SELECT DISTINCT count(*) numServicesListed, PS1.firstname FROM petsitter PS1 NATURAL JOIN service S1 GROUP BY PS1.petSitterId ORDER BY PS1.firstname)  
        select * from t1;";
        $execute = pg_query($db,$query);
        if($execute){
          if(pg_num_rows($execute) == 0){
            echo "No data available";
          }
          else{
            while($row = pg_fetch_array($execute)){
              echo "First name: " . $row['firstname'] . "<br>";
              echo "No. services: " . $row['numserviceslisted'] . "<br>";
            }
          }
        }
        else{
          echo "Error loading data";
        }
      ?>
    </div>
    <div>
      <p>Top 5 cheapest services offered by Pet sitter</p>
      <?php
          $query = "With t1 AS (SELECT DISTINCT PS1.firstname, S1.price FROM petsitter PS1 NATURAL JOIN service S1 ORDER BY S1.price ASC LIMIT 5)
          SELECT * FROM  t1;";
          $execute = pg_query($db,$query);
          if($execute){
            if(pg_num_rows($execute) == 0){
              echo "No data available";
            }
            else{
              while($row = pg_fetch_array($execute)){
                echo "First name: " . $row['firstname'] . "<br>";
                echo "Price: " . $row['price'] . "<br>";
              }
            }
          }
          else{
            echo "Error loading data";
          }
        ?>
    </div>
    <div>
      <p>Top 5 most expensive services offered by Pet sitter</p>
      <?php
          $query = "With t1 AS (SELECT DISTINCT PS1.firstname, S1.price FROM petsitter PS1 NATURAL JOIN service S1 ORDER BY S1.price DESC LIMIT 5)
          SELECT * FROM  t1;";
          $execute = pg_query($db,$query);
          if($execute){
            if(pg_num_rows($execute) == 0){
              echo "No data available";
            }
            else{
              while($row = pg_fetch_array($execute)){
                echo "First name: " . $row['firstname'] . "<br>";
                echo "Price: " . $row['price'] . "<br>";
              }
            }
          }
          else{
            echo "Error loading data";
          }
        ?>
    </div>
  </div>
</body>
</html>
