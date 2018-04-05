<?php
  session_start();
  include('connection.php');
  if($_SESSION['no-result']){
    echo "<script>alert('No results found! Please try again.')</script>";
    $_SESSION['no-result'] = false;
  }
  if($_SESSION['bad-search']){
    echo "<script>alert('Start date cannot be set after End date.')</script>";
    $_SESSION['bad-search'] = false;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Search Services</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <!--===============================================================================================-->
	   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="inner-container search">
      <div class="nav-wrapper">
        <?php include('navbar.php') ?>
      </div>
      <div class="content-wrapper">
        <div class="searchbar-outer">
          <div class="searchbar-inner">
            <form class="suForm form-horizontal form_font grid" action="search_result.php" method="post">
              <div class="title">
                <label for="title">Title</label>
                <input class="form-control title-input" name="title" type="text" placeholder="Enter key words">
              </div>
              <div class="price">
                <label for="price">Price</label>
                <input class="form-control" type="number" name="price" placeholder="Price" value="" step="0.01" min="1">
              </div>
              <div class="start">
                <label for="startDate">Start date</label>
                <input class="form-control" type="date" name="startDate" value="">
              </div>
              <div class="end">
                <label for="endDate">End date</label>
                <input class="form-control" type="date" name="endDate" value="">
              </div>
              <div class="search_submit">
                <label></label>
                  <input type="submit" name="submit" value="Search" class="btn-submit"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html
