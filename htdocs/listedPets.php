<?php
  session_start();
  include('connection.php');
  if($_SESSION['new-pet-pass']){
    echo "<script>alert('New pet has been added!')</script>";
    $_SESSION['new-pet-pass'] = false;
  }
  if($_SESSION['delete-pet-pass']){
    echo "<script>alert('Succesfully removed pet!')</script>";
    $_SESSION['delete-pet-pass'] = false;
  }
  if($_SESSION['delete-pet-fail']){
    echo "<script>alert('Problem with removing pet, please try again.')</script>";
    $_SESSION['delete-pet-fail'] = false;
  }
  if($_SESSION['initial-delete-pet-fail']){
    echo "<script>alert('Pet id does not exists, please try again.')</script>";
    $_SESSION['initial-delete-pet-fail'] = false;
  }
?>
<!DOCTYPE html>
<html>
<header>
  <title>Registered Pets</title>

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
      <?php include('navbar.php') ?>
    </div>
    <div class="header-pet">
      <h2>Pets</h2>
    </div>
    <div class="overall-wrapper">
      <div class="content-wrapper pet">
        <?php
          $id = $_SESSION["id"];
          $result = pg_query($db, "SELECT * FROM has_pet WHERE petownerid = '$id'");
          while ($row = pg_fetch_array($result)) {
              $img = $row['img'];
              echo "<div class='service-block pet'>";
              echo "<strong>". $row['petname'] . "</strong><br>" ;
              if(!$row['img']){
                //set default pic
                echo "<div class='pet-grid'><div class='pet-image'><img alt='Pet-image' class='pet-img' src='uploads/emptyProfile.png'>";
              }
              else{
                echo "<div class='pet-grid'><div class='pet-image'><img alt='Pet-image' class='pet-img' src='" . $img . "'>";
              }
              echo "</div><div class='pet-info'>";
              if($row['sex'] == 't'){
                echo 'Gender: Male <br>';
              }
              else{
                echo 'Gender: Female <br>';
              }
              echo "Pet Type: ", $row['pettype'], "<br>";
              echo "Breed: ", $row['breed'], "<br>";
              echo "Date of birth: ", $row['dob'], "<br>";
              echo "Pet ID: " . $row['petid'];
              if($row['additionalinfo']){
                echo "<br>Additional Info: ", $row['additionalinfo'];
              }
              echo "</div></div></div>";
          }

         ?>
      </div>
      <div class="deleteForm">
        <form class="" action="deletePet.php" method="post">
          <div class="input">
            <input class="form-control" size=10 type='text' id='id' name='id' placeholder="Input Pet ID"/>
          </div>
          <center>
            <input type='submit' name='submit' value='Delete Pet' class='btn-delete-service'/>
          </center>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
