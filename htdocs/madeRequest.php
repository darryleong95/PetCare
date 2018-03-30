<?php
  session_start();
  include('connection.php');
  include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<header>
  <title>Requets</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
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
          $id = $_SESSION["id"];
          $result = pg_query($db, "SELECT * FROM request WHERE petownerid = '$id'");
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
