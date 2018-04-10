<?php
  session_start();
  include('connection.php');
  if($_SESSION['made-request-pass']){
    echo "<script>alert('Request was successfully made!')</script>";
    $_SESSION['made-request-pass'] = false;
  }
  if($_SESSION['delete-pass']){
    echo "<script>alert('Request was successfully Deleted!')</script>";
    $_SESSION['delete-pass'] = false;
  }
  if($_SESSION['delete-fail']){
    echo "<script>alert('Please ensure RequestId is Valid/ Request status: REJECT')</script>";
    $_SESSION['delete-fail'] = false;
  }
  if($_SESSION['delete-error']){
    echo "<script>alert('Error deleting request')</script>";
    $_SESSION['delete-error'] = false;
  }
?>
<!DOCTYPE html>
<html>
<header>
  <title>Made Requets</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="css/service-request-pet.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</header>
<body>
  <div class="inner-container pet">
    <div class="nav-wrapper">
      <?php include('navbar.php'); ?>
    </div>
    <div class="header-pet">
      <h2>Made Requests</h2>
    </div>
    <div class="overall-wrapper pet">
      <div class="content-wrapper pet">
        <?php
          $id = $_SESSION["id"];
          $result = pg_query($db, "SELECT * FROM request WHERE petownerid = '$id'");
          while ($row = pg_fetch_array($result)) {
              echo "<div class='service-block pet'>";
              echo 'Request ID        : ' . $row['requestid'] . "<br>" ;  // works just fine
              echo "Request Start date: " . $row['requeststart'] . "<br>"; // works just fine
              echo "Request End date  : " . $row['requestend'] . "<br>"; // works just fine
              echo "Bid               : " . $row['bid'] . "<br>"; // works just fine
              echo "Service ID        : " . $row['serviceid'] . "<br>"; // not displaying this
              echo "Status            : " .  $row['status'] . "<br>";
              if($row['message']){
                echo "Additional Information: " . $row['message'] . "<br>";
              }
              echo "</div>";
          }
         ?>
      </div>
      <div class="deleteRequest">
        <form class="acceptForm" action="deleteRequest.php" method="post">
          <div class="input">
            <input class="form-control" size=10 type='text' id='id' name='id' placeholder="Input ID"/>
          </div>
          <center>
            <input type='submit' name='submit' value='Delete Request' class='btn-accept-request'/>
          </center>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
