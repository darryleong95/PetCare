<?php
  session_start();
?>
<?php
  $db = pg_connect("host=localhost port=5433 dbname=cs2102 user=postgres password=darrylimJy1995");
  session_start();
  if (!$db) {
    die('Connection failed.??');
  }
  if(isset($_POST['submit'])){
    $q = "SELECT * FROM service WHERE serviceid = '$_POST[id]'";
    $execute = pg_query($db,$q);
    while($row = pg_fetch_array($execute)) {
        $_SESSION['startDate'] = $row['servicestart'];
        $_SESSION['endDate']   = $row['serviceend'];
        $_SESSION['title']     = $row['servicetitle'];
        $_SESSION['max']       = $row['max'];
        $_SESSION['price']     = $row['price'];
        $_SESSION['ps_email']  = $row['email'];
        $_SESSION['serviceid'] = $row['serviceid'];
    }
  }
  else{
    echo "Fatal error occured, please try again";
  }
?>

<!DOCTYPE html>
<html>
<header>
  <title>New Pet</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/sideBar.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</header>
<body>
  <!--  1) Date range, 2) Pets involved, 3) Additional Queries-->
  <form name="apply_form" class="suForm form-horizontal form_font" method="POST" action="applyForService_post.php" onsubmit="return Validate()">
    <div class="form-group">
      <label class="control-label col-xs-4" for="startDate">Start Date:</label>
      <div id="startDate_div" class="col-xs-8">
        <input size="21" type="date" id="startDate" name="startDate" value= '<?= $_SESSION['startDate']?>' />
        <div id="startDate_err"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-4" for="endDate">End Date:</label>
      <div id="endDate_div" class="col-xs-8">
        <input size="21" type="date" id="endDate" name="endDate" value= '<?= $_SESSION['endDate']?>' />
        <div id="endDate_err"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-4" for="endDate">Bid: </label>
      <div id="bid_div" class="col-xs-8">
        <input type="number" id="bid" name="bid" placeholder="Place your bid here" value= '<?= $_SESSION['price']?>' step="0.01" />
        <div id="bid_err"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-3" for="additionalInfo">Additional Information:</label>
      <div class="col-xs-8">
        <textarea class="form-control" rows = "3" id="additionalInfo" name="additionalInfo" placeholder="How many pets do you have? Anything the sitter should know?"></textarea>
      </div>
    </div>

    <div class="sign_up_submit">
      <center>
        <input type="submit" name="submit" value="Register my Pet!" class="btn"/>
      </center>
    </div>

  </form>
</body>
</html>
<script type="text/javascript">
 var bid = document.forms['apply_form']['bid'];
 var startDate = document.forms['apply_form']['startDate'];
 var endDate = document.forms['apply_form']['endDate'];

 var bid_err = document.getElementById("bid_err");
 var startDate_err = document.getElementById("startDate_err");
 var endDate_err = document.getElementById("endDate_err");

 bid.addEventListener('blur', bidVerify, true);
 startDate.addEventListener('blur', startDateVerify, true);
 endDate.addEventListener('blur', endDateVerify, true);

 function Validate() {

   //validate startDate
   if (!startDate.value) {
     startDate.style.border = "1px solid red";
     document.getElementById('startDate_div').style.color = "red";
     startDate_err.textContent = "Please specify Start date of Service";
     startDate.focus();
     return false;
   }

   if(startDate.value < <?= $_SESSION['startDate'] ?>){
     startDate.style.border = "1px solid red";
     document.getElementById('startDate_div').style.color = "red";
     startDate_err.textContent = "Please specify a date within the range of the Service";
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
   if (endDate.value && startDate.value && endDate.value < startDate.value) {
     endDate.style.border = "1px solid red";
     document.getElementById('endDate_div').style.color = "red";
     endDate_err.textContent = "End date cannot preceed Start date";
     endDate.focus();
     return false;
   }

   if(endDate.value > <?= $_SESSION['endDate'] ?>){
     endDate.style.border = "1px solid red";
     document.getElementById('endDate_div').style.color = "red";
     endDate_err.textContent = "Please specify a date within the range of the Service";
     endDate.focus();
     return false;
   }

  //validate price
  if (Number(bid.value) < <?= $_SESSION['price']?>) {
    bid.style.border = "1px solid red";
    document.getElementById('bid_div').style.color = "red";
    bid_err.textContent = "Bid must be greater than specified minimum from the Pet sitter ";
    bid.focus();
    return false;
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

function bidVerify() {
  if (bid.value != "") {
   bid.style.border = "1px solid #5e6e66";
   document.getElementById('bid_div').style.color = "#5e6e66";
   bid_err.innerHTML = "";
   return true;
  }
}
</script>
