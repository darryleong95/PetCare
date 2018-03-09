<?php
  session_start();
  include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<header>
  <title>Admin page</title>

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
        <div class="form-area">
          <div class="header">
            <h2>Profile Page</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
