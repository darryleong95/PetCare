<?php
  session_start();
  include('connection.php');
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
  <div class="inner-container">
    <div class="">
      <?php include('navbar.php') ?>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <?php include 'sidebar_ps.php' ?>
      </div>
      <div class="col-sm-9">
        <div class="header">
          <h2>Request received</h2>
        </div>
        <br>
        <!--Loop listed pet results-->
        <?php
          session_start();
          $id = $_SESSION["id"];
          $result = pg_query($db, "SELECT * FROM request WHERE petsitterid = '$id'");
          while ($row = pg_fetch_array($result)) {
              echo 'Request ID        : ', $row['requestid'], "<br>" ;  // works just fine
              echo "Request Start date: ", $row['requeststart'], "<br>"; // works just fine
              echo "Request End date  : ", $row['requestend'], "<br>"; // works just fine
              echo "Requester's Email : ", $row['owneremail'], "<br>";
              echo "Bid               : ", $row['bid'], "<br>"; // works just fine
              echo "Service ID        : ", $row['serviceid'], "<br>"; // not displaying this
              echo "Status            : ", $row['status'], "<br>";
              echo "Additional Info   : ", $row['message'];
              echo nl2br("<br><br>") ;
          }
         ?>
         <form class="" action="acceptRequest.php" method="post">
           Request Id to accept: <input size=3 type='text' id='id' name='id' />
           <input type='submit' name='submit' value='Accept Request' class='btn'/>
         </form>
      </div>
    </div>
  </div>
  <?php?>
</body>
</html>
