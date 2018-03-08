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
          $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");

          if (!$db) {
            die('Connection failed.??');
          }
          $email = $_SESSION["email"];
          $result = pg_query($db, "SELECT * FROM request WHERE sitteremail = '$email'");
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
