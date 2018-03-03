<?php
  session_start();
  include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<header>
  <title>Registered Pets</title>

  <meta charset="utf-8">
  <title>New Pet</title>
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
        <?php include 'sidebar_po.php' ?>
      </div>
      <div class="col-sm-9">
        <div class="header">
          <h2>Pets listed</h2>
        </div>
        <br>
        <!--Loop listed pet results-->
        <?php
          session_start();
          $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

          if (!$db) {
            die('Connection failed.??');
          }
          $email = $_SESSION["email"];
          $result = pg_query($db, "SELECT * FROM pet WHERE email = '$email'");
          while ($row = pg_fetch_array($result)) {
              echo 'Pet name: ', $row['petname'], "<br>" ;
              if($row['sex'] == 't'){
                echo 'Gender: Male <br>';
              }
              else{
                echo 'Gender: Female <br>';
              }
              echo "Breed: ", $row['breed'], "<br>" ;
              echo "Date of birth: ", $row['dob'], "<br>" ;
              echo nl2br("Additional Info: " . $row['additionalInfo'] . "<br><br>") ;
          }

         ?>
      </div>
    </div>
  </div>
  <?php?>
</body>
</html>
