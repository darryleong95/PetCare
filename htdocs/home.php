<?php
  session_start();
  include('connection.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Patua+One" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      html{
          margin: 0;
        }
        body{
          margin: 0;
          padding: 0;
          width: 100%;
          height: 100vh;
          background: url("img/dog1.jpg") no-repeat 50% 50%;
          background-size: cover;
          display: table;
        }
    </style>
  </head>
  <body>
    <div class="inner-container">
      <div class="nav-wrapper">
        <?php include('navbar.php');?>
      </div>
      <div class="content-wrapper">
        <div class="inner">
          <p class="desc">Find a nice home for your pet while you're away, they deserve it.</p>
          <br>
          <a class="btn" href="search.php" role="button"><div class="text">Browse Available Services</div></a>
        </div>
      </div>
    </div>
  </body>
</html>
