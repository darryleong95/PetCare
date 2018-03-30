<?php
  session_start();
  include('connection.php');
  include 'navbar.php';
?>
<!DOCTYPE html>
<html>
  <header>
    <title>New Service</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

    <script type="text/javascript" src="http://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

  </header>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <?php include 'sidebar_ps.php' ?>
        </div>
        <div class="col-sm-9">
          <div class="form-area">
            <div class="header">
              <h2>List your Services</h2>
            </div>
            <form name="service_form" class="suForm form-horizontal form_font" method="POST" action="newService_post.php" onsubmit="return Validate()">
              <div class="form-group">
                <label class="control-label col-xs-3" for="title">Title:</label>
                <div id="title_div" class="col-xs-8">
                  <input class="form-control" id="title" type="text" name="title" placeholder="Title" />
                  <div id="title_err"></div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4" for="price">Cost/Day:</label>
                <div id="price_div" class="col-xs-8">
                  <input class="form-control" id="price" type="number" name="price" step="0.01" min="1" />
                  <div id="price_err"></div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4" for="max">Maximum number of Pets: </label>
                <div id="max_div" class="col-xs-8">
                  <input class="form-control" id="max" type="number" name="max"/>
                  <div id="max_err"></div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4" for="startDate">Start Date:</label>
                <div id="startDate_div" class="col-xs-8">
                  <input size="21" type="date" id="startDate" name="startDate"/>
                  <div id="startDate_err"></div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4" for="endDate">End Date:</label>
                <div id="endDate_div" class="col-xs-8">
                  <input size="21" type="date" id="endDate" name="endDate"/>
                  <div id="endDate_err"></div>
                </div>
              </div>

              <div class="sign_up_submit">
                <input type="submit" name="submit" value="List" class="btn"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
 var title = document.forms['service_form']['title'];
 var price = document.forms['service_form']['price'];
 var max = document.forms['service_form']['max'];
 var startDate = document.forms['service_form']['startDate'];
 var endDate = document.forms['service_form']['endDate'];

 var title_err = document.getElementById("title_err");
 var price_err = document.getElementById("price_err");
 var max_err = document.getElementById("max_err");
 var startDate_err = document.getElementById("startDate_err");
 var endDate_err = document.getElementById("endDate_err");

 title.addEventListener('blur', titleVerify, true);
 price.addEventListener('blur', priceVerify, true);
 max.addEventListener('blur', maxVerify, true);
 startDate.addEventListener('blur', startDateVerify, true);
 endDate.addEventListener('blur', endDateVerify, true);

 function Validate() {

  // validate title
  if (title.value == "") {
    title.style.border = "1px solid red";
    document.getElementById('title_div').style.color = "red";
    title_err.textContent = "Title is required";
    title.focus();
    return false;
  }
  //validate price
  if (Number(price.value) <= 0) {
    price.style.border = "1px solid red";
    document.getElementById('price_div').style.color = "red";
    price_err.textContent = "Price listed must be greater than 0";
    price.focus();
    return false;
  }

  //validate max
  if (Number(max.value) <= 0) {
    max.style.border = "1px solid red";
    document.getElementById('max_div').style.color = "red";
    max_err.textContent = "Max number of Pets must be greater than 0";
    max.focus();
    return false;
  }

  //validate startDate
  if (!startDate.value) {
    startDate.style.border = "1px solid red";
    document.getElementById('startDate_div').style.color = "red";
    startDate_err.textContent = "Please specify Start date of Service";
    startDate.focus();
    return false;
  }

  var d1 = Date.parse(moment());
  var d2 = Date.parse(startDate.value);

  if (startDate.value && d2 < d1) {
    startDate.style.border = "1px solid red";
    document.getElementById('startDate_div').style.color = "red";
    startDate_err.textContent = "Please specify a possible Start date";
    startDate.focus();
    return false;
  }

  //validate endDate : Empty
  if (!endDate.value) {
    endDate.style.border = "1px solid red";
    document.getElementById('endDate_div').style.color = "red";
      endDate_err.textContent = "Please specify End date of Service";
    endDate.focus();
    return false;
  }

  //validate endDate : Time less than start date
  if (endDate.value && startDate.value && newEndDate < newStartDate) {
    endDate.style.border = "1px solid red";
    document.getElementById('endDate_div').style.color = "red";
    endDate_err.textContent = "End date cannot preceed Start date";
    endDate.focus();
    return false;
  }
}

function titleVerify() {
  if (title.value != "") {
   title.style.border = "1px solid #5e6e66";
   document.getElementById('title_div').style.color = "#5e6e66";
   title_err.innerHTML = "";
   return true;
  }
}

function priceVerify() {
  if (price.value > 0) {
   price.style.border = "1px solid #5e6e66";
   document.getElementById('price_div').style.color = "#5e6e66";
   price_err.innerHTML = "";
   return true;
  }
}

function maxVerify() {
  if (max.value > 0) {
   max.style.border = "1px solid #5e6e66";
   document.getElementById('max_div').style.color = "#5e6e66";
   max_err.innerHTML = "";
   return true;
  }
}

function startDateVerify() {
  if (startDate.value) {
   startDate.style.border = "1px solid #5e6e66";
   document.getElementById('startDate_div').style.color = "#5e6e66";
   startDate_err.innerHTML = "";
   return true;
  }
}

function endDateVerify() {
  if (endDate.value) {
   endDate.style.border = "1px solid #5e6e66";
   document.getElementById('endDate_div').style.color = "#5e6e66";
   endDate_err.innerHTML = "";
   return true;
  }
}
</script>
