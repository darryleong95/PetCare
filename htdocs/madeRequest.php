<?php
  session_start();
  include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<header>
  <title>Requets</title>

  <meta charset="utf-8">

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
          <h2>Request made</h2>
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
          $result = pg_query($db, "SELECT * FROM request WHERE ownerEmail = '$email'");
          while ($row = pg_fetch_array($result)) {
              echo 'Request ID        : ', $row['requestid'], "<br>" ;  // works just fine
              echo "Request Start date: ", $row['requeststart'], "<br>"; // works just fine
              echo "Request End date  : ", $row['requestend'], "<br>"; // works just fine
              echo "Bid               : ", $row['bid'], "<br>"; // works just fine
              echo "Service ID        : ", $row['serviceid'], "<br>"; // not displaying this
              echo "Status            : ", $row['status'], "<br>";
              echo "Additional Info   : ", $row['message'];
              echo nl2br("<br><br>") ;
          }
         ?>
      </div>
    </div>
  </div>
  <?php?>
</body>
</html>
