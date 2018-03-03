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
        $_SESSION['startDate'] = $row['serviceStart'];
        $_SESSION['endDate']   = $row['serviceend'];
        $_SESSION['title']     = $row['servicetitle'];
        $_SESSION['max']       = $row['max'];
        $_SESSION['price']     = $row['price'];
        $_SESSION['ps_email']  = $row['email'];
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
  <form name="apply_form" class="suForm form-horizontal form_font" method="POST" action="newPet_post.php" onsubmit="return Validate()">
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

    <div class="form-group">
      <label class="control-label col-xs-3" for="breed">Breed:</label>
      <div class="col-xs-8" id="breed_div">
        <input class="form-control" id="breed" type="text" name="breed" placeholder="Enter breed (required)" value=""/>
        <div id="breed_err"></div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-3" for="additionalInfo">Additional Information:</label>
      <div class="col-xs-8">
        <textarea class="form-control" rows = "3" id="additionalInfo" name="additionalInfo" placeholder="Anything potential service users might want to know! (Optional)"></textarea>
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
 var petName = document.forms['apply_form']['petName'];
 var dob = document.forms['apply_form']['dob'];
 var breed = document.forms['apply_form']['breed'];

 var petName_err = document.getElementById("petName_err");
 var dob_err = document.getElementById("dob_err");
 var breed_err = document.getElementById("breed_err");

 petName.addEventListener('blur', petNameVerify, true);
 dob.addEventListener('blur', dobVerify, true);
 breed.addEventListener('blur', breedVerify, true);

 function Validate() {
  //validate name
  if (petName.value.trim() == "") {
    petName.style.border = "1px solid red";
    document.getElementById('petName_div').style.color = "red";
    petName_err.textContent = "Pet name is required";
    petName.focus();
    return false;
  }
  //validate dob
  if (!dob.value) {
    dob.style.border = "1px solid red";
    document.getElementById('dob_div').style.color = "red";
      dob_err.textContent = "Please specify DOB of your pet";
    dob.focus();
    return false;
  }
  //validate breed
  if (breed.value == "") {
    breed.style.border = "1px solid red";
    document.getElementById('breed_div').style.color = "red";
    breed_err.textContent = "Breed is required";
    breed.focus();
    return false;
  }
}

function petNameVerify() {
  if (petName.value.trim() != "") {
   petName.style.border = "1px solid #5e6e66";
   document.getElementById('petName_div').style.color = "#5e6e66";
   petName_err.innerHTML = "";
   return true;
  }
}

function dobVerify() {
  if (dob.value != "") {
   dob.style.border = "1px solid #5e6e66";
   document.getElementById('dob_div').style.color = "#5e6e66";
   dob_err.innerHTML = "";
   return true;
  }
}

function breedVerify() {
  if (breed.value != "") {
   breed.style.border = "1px solid #5e6e66";
   document.getElementById('breed_div').style.color = "#5e6e66";
   breed_err.innerHTML = "";
   return true;
  }
}
</script>
