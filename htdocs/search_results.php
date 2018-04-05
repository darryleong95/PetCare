<?php
  session_start();
  include('connection.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Search Results</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="css/searchPage.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <!--===============================================================================================-->
	   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="inner-container">
      <div class="nav-wrapper">
        <?php include('navbar.php') ?>
      </div>
      <div class="header-results">
        <h2 style="color:black">Search Results</h2>
      </div>
      <div class="overall-wrapper">
        <div class="content-wrapper">
          <?php
            $keyword = $_SESSION["key"];
            $query = $_SESSION["query"];
            $execute = pg_query($db,$query);
            if($execute){
              if(pg_num_rows($execute) == 0){
                $_SESSION["no-result"] = true;
                header("Location:search.php");
              }
              else{
                while($row = pg_fetch_array($execute)){
                  if($_SESSION['keyCounter'] == 0){
                    if(strpos($row['servicetitle'], $keyword) !== false){
                      echo "<div class='service-blocks'>";
                      echo "<span class='title'>" . $row['servicetitle'] . "</span>";
                      echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
                      echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
                      echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
                      echo "</div>";
                    }
                  }
                  else{
                    echo "<div class='service-blocks'>";
                    echo "<span class='title'>" . $row['servicetitle'] . "</span>";
                    echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
                    echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
                    echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
                    echo "</div>";
                  }
                }
              }
            }
          ?>
        </div>
        <div class="select-service">
          <div class="apply">
            <form name="apply" action="search_results_post.php" method="POST">
              <div class="form-group">
                <label for="id">Select Sitter ID to apply for:  </label>
                <select class="form-control input-sm" id="id" name='id'>
                   <?php
                     $q = "SELECT * FROM service";
                     $result = pg_query($db,$q);
                     while ($row = pg_fetch_array($result)) {
                         echo "<option value='" . $row['serviceid'] . "'>" . $row['serviceid'] . "</option>";
                     }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <center><input type='submit' name='submit-select' value='Apply for service' class='btn-apply'/></center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
