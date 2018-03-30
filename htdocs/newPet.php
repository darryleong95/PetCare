<?php
  session_start();
  include('connection.php');
  include 'navbar.php';
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
  <script type="text/javascript" src="http://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</header>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <?php include 'sidebar_po.php' ?>
      </div>
      <div class="col-sm-9">
        <div class="form-area">
          <div class="header">
            <h2>Add a Pet!</h2>
          </div>
            <form name="pet_form" class="suForm form-horizontal form_font" method="POST" action="newPet_post.php" onsubmit="return Validate()">
              <div class="form-group">
                <label class="control-label col-xs-3" for="petName">Pet name:</label>
                <div class="col-xs-8" id="petName_div">
                  <input class="form-control" id="petName" type="text" name="petName" placeholder="Enter Pet name (required)" value=""/>
                  <div id="petName_err"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-4" for="dob">Date of birth:</label>
                <div class="col-xs-8" id="dob_div">
                  <input class="form-control" id="dob" type="date" name="dob"/>
                  <div id="dob_err"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-3" for="gender">Gender :</label>
                <select class="form-control input-small" id="gender" name="gender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-3" for="type">Pet type:</label>
                <select class="form-control input-small" id="type" name="type">
                  <option value="Dog">Dog</option>
                  <option value="Cat">Cat</option>
                  <option value="Rabbit">Rabbit</option>
                  <option value="Hamster">Hamster</option>
                  <option value="Bird">Bird</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-3" for="breed">Breed:</label>
                <div class="col-xs-8" id="breed_div">
                  <input class="form-control" id="breed" type="text" name="breed" placeholder="Enter breed (required) Please fill 'unsure' if not certain" value=""/>
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
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
 var petName = document.forms['pet_form']['petName'];
 var dob = document.forms['pet_form']['dob'];
 var breed = document.forms['pet_form']['breed'];

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

  var d1 = Date.parse(moment());
  var d2 = Date.parse(dob.value);

  if (dob.value && d1 < d2) {
    dob.style.border = "1px solid red";
    document.getElementById('dob_div').style.color = "red";
    dob_err.textContent = "Please specify possible DOB of your pet";
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
