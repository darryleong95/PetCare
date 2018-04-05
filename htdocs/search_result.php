<?php
  session_start();
  include('connection.php');
  if(isset($_POST['submit'])){
    //counters
    $keyCounter = 1;
    $priceCounter = 1;
    $startCounter = 1;
    $endCounter = 1;
    //starting base
    $query = "SELECT * FROM service";

    if(isset($_POST[title]) && trim($_POST[title]) != ''){
      $keyCounter = 0;
    }
    if(isset($_POST[price]) && trim($_POST[price]) != ''){
      $priceCounter = 0;
      $a = $_POST[price];
      $query = $query . " WHERE price <= $a";
    }
    if(isset($_POST[startDate]) && trim($_POST[startDate]) != ''){
      $startCounter = 0;
      $a = pg_escape_string($_POST[startDate]);
      if($priceCounter != 0){
        $query = $query . " WHERE servicestart <= '$a'";
      }
      else{
        $query = $query . " AND servicestart <= '$a'";
      }
    }
    if(isset($_POST[endDate]) && trim($_POST[endDate]) != ''){
      $endCounter = 0;
      $a = pg_escape_string($_POST[endDate]);
      if($priceCounter != 0 && $startCounter != 0){
        $query = $query . " WHERE serviceend >= '$a'";
      }
      else{
        $query = $query . " AND serviceend >= '$a'";
      }
    }
    $query = $query . ";";
    $a = new DateTime(pg_escape_string($_POST[startDate]));
    $b = new DateTime(pg_escape_string($_POST[endDate]));
    if($startCounter == 0 && $endCounter == 0 && $a >= $b){
      $_SESSION["bad-search"] = true;
      header("Location:search.php");
    }
    else{
      $_SESSION["query"] = $query;
      $_SESSION["key"] = $_POST[title];
      $_SESSION["keyCounter"] = $keyCounter;
      header("Location:search_results.php");
    }
  }
?>
