<?php
  session_start();
  include('navbar.php');
?>
<!DOCTYPE html>
<html>
  <header>
    <title>Listed Pet sitters</title>

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
              <h2>All Registered Pet Owners</h2>
            </div>
            <br>
            <!--Loop listed pet results-->
            <?php
              $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
              if (!$db) {
                die('Connection failed.??');
              }
              $q = "SELECT * FROM petowner";

              $result = pg_query($db,$q);


              //print_r(pg_fetch_array($result));
              while ($row = pg_fetch_array($result)) {
                if($row['email'] != "admin"){
                  echo "Pet owner Id: " . $row['petownerid'] . "<br>";
                  echo "Name: " . $row['firstname'] . " " . $row['lastname'] . "<br>";
                  echo "Email: " . $row['email'] . "<br>";
                  echo "Address: " . $row['address'] . "<br>";
                  echo nl2br("<br><br>");
                }
              }

             ?>
             <form class="" action="deleteOwner.php" method="post">
               Id: <input size=3 type='text' id='id' name='id' />
               <input type='submit' name='submit' value='Remove Owner' class='btn'/>
             </form>
      </div>
    </div>
  </body>
</html>
