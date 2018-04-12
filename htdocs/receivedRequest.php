<?php
  session_start();
  include('connection.php');
  if($_SESSION['pass-request']){
    echo "<script>alert('Request has been accepted!')</script>";
    $_SESSION['pass-request'] = false;
  }
  if($_SESSION['fail-request']){
    echo "<script>alert('Error while accepting request. Please make sure RequestId is Valid/ Number of pets is not exceeded')</script>";
    $_SESSION['fail-request'] = false;
  }
  if($_SESSION['status-accepted']){
    echo "<script>alert('You have already accepted this request')</script>";
    $_SESSION['status-accepted'] = false;
  }
  if($_SESSION['reject-pass']){
    echo "<script>alert('Successfully rejected request')</script>";
    $_SESSION['reject-pass'] = false;
  }
  if($_SESSION['reject-fail']){
    echo "<script>alert('Please check whether you have already Rejected/ Accepted this request')</script>";
    $_SESSION['reject-fail'] = false;
  }
  if($_SESSION['search-fail']){
    echo "<script>alert('Error while rejecting')</script>";
    $_SESSION['search-fail'] = false;
  }
  // if($_SESSION['already-accepted-request']){
  //   echo "<script>alert('You have already accepted this request')</script>";
  //   $_SESSION['already-accepted-request'] = false;
  // }
?>
<!DOCTYPE html>
<html>
<header>
  <title>Requets</title>

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
  <div class="inner-container">
    <div class="nav-wrapper">
      <?php include('navbar.php') ?>
    </div>
    <div class="header-service">
      <h2>Received Requests</h2>
    </div>
    <div class="overall-wrapper">
        <div class="content-wrapper">
          <?php
            $id = $_SESSION["id"];
            $result = pg_query($db, "SELECT * FROM request WHERE petsitterid = '$id'");
            while ($row = pg_fetch_array($result)) {
                if($row['status'] != 'REJECT'){
                  echo "<div class='service-block'>";
                  echo "Request Start date: ", $row['requeststart'], "<br>"; // works just fine
                  echo "Request End date  : ", $row['requestend'], "<br>"; // works just fine
                  $ownerId =  $row['petownerid'];
                  $result1 = pg_query($db, "SELECT * FROM petowner WHERE petownerid = $ownerId");
                  while($row2 = pg_fetch_array($result1)){
                      echo "Requester's Email: ".$row2['email']."<br>";
                  }
                  echo "Bid               : ", $row['bid'], "<br>"; // works just fine
                  echo "Service ID        : ", $row['serviceid'], "<br>"; // not displaying this
                  echo "Status            : ", $row['status'], "<br>";
                  echo "Additional Info   : ", $row['message'], "<br>";
                  echo 'Request ID        : ', $row['requestid'], "<br>" ;  // works just fine
                  echo "</div>";
                }
            }
           ?>
        </div>
        <div class="acceptRequest">
          <form class="acceptForm" action="acceptRequest.php" method="post">
            <div class="input">
              <input class="form-control" size=10 type='text' id='id' name='id' placeholder="Input ID"/>
            </div>
            <center>
              <input type='submit' name='submit' value='Accept Request' class='btn-accept-request'/>
            </center>
          </form>
        </div>
        <div class="deleteRequest">
          <form class="acceptForm" action="rejectRequest.php" method="post">
            <div class="input">
              <input class="form-control" size=10 type='text' id='id' name='id' placeholder="Input ID"/>
            </div>
            <center>
              <input type='submit' name='submit' value='Reject Request' class='btn-accept-request'/>
            </center>
          </form>
        </div>
    </div>
  </div>
  <?php?>
</body>
</html>
