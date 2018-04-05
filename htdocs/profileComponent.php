<div class="form-area profile">
  <div class="header-profile">
    <h2>Update your Profile</h2>
  </div>
  <form name="updateProfile_form" class="form-profile suForm form-horizontal form_font" method="POST" action="updateProfile.php" onsubmit="return ValidateProfile()">
    <div class="form-group row">
      <label class="control-label col-sm-3" for="firstName">First name:</label>
      <div class="col-sm-9" id="firstName_div">
        <input class="form-control" id="firstName" type="text" name="firstName" value="<?= $_SESSION['firstName'] ?>" />
        <div id="firstName_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="lastName">Last name:</label>
      <div class="col-sm-9" id="lastName_div">
        <input class="form-control" id="lastName" type="text" name="lastName" value="<?= $_SESSION['lastName'] ?>" />
        <div id="lastName_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="email">Email:</label>
      <div class="col-sm-9" id="email_div">
        <input class="form-control" id="email" type="text" name="email" value="<?= $_SESSION['email'] ?>" disabled/>
        <div id="email_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="password">Password:</label>
      <div class="col-sm-9" id="password_div">
        <input class="form-control" id="password" type="text" name="password" value="<?= $_SESSION['password'] ?>"/>
        <div id="password_err"></div>
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="address">Address:</label>
      <div class="col-sm-9" id="address_div">
        <input class="form-control" id="address" type="text" name="address" value="<?= $_SESSION['address'] ?>" />
        <div id="address_err"></div>
      </div>
    </div>
    <?php
      $additonalInfo = $_SESSION['additionalInfo'];
      if($_SESSION["userType"] == "ps"){
        echo '<div class="form-group">
                <label class="control-label col-xs-3" for="additionalInfo">Additional Information:</label>
                <div class="col-xs-8" id="additionalInfo_div">
                  <textarea class="profile form-control" id="additionalInfo" name="additionalInfo">', $additonalInfo, '</textarea>
                </div>
              </div>';
      }
    ?>
    <div class="sign_up_submit">
      <center>
        <input type="submit" name="submit" value="Update Profile" class="btn-profile"/>
      </center>
    </div>
  </form>
</div>
<script type="text/javascript">
var firstName = document.forms['updateProfile_form']['firstName'];
var lastName = document.forms['updateProfile_form']['lastName'];
var password = document.forms['updateProfile_form']['password'];
var address = document.forms['updateProfile_form']['address'];

var firstName_err = document.getElementById("firstName_err");
var lastName_err = document.getElementById("lastName_err");
var password_err = document.getElementById("password_err");
var address_err = document.getElementById("address_err");

firstName.addEventListener('blur', firstNameVerify, true);
lastName.addEventListener('blur', lastNameVerify, true);
password.addEventListener('blur', passwordVerify, true);
address.addEventListener('blur', addressVerify, true);

function ValidateProfile() {
 //validate firstName
 if (firstName.value.trim() == "") {
   firstName.style.border = "1px solid red";
   document.getElementById('firstName_div').style.color = "red";
   firstName_err.textContent = "First name is required";
   firstName.focus();
   return false;
 }
 //validate lastName
 if (lastName.value.trim() == "") {
   lastName.style.border = "1px solid red";
   document.getElementById('lastName_div').style.color = "red";
   lastName_err.textContent = "Last name is required";
   lastName.focus();
   return false;
 }
 //validate password
 if (password.value.trim() == "") {
   password.style.border = "1px solid red";
   document.getElementById('password_div').style.color = "red";
   password_err.textContent = "Password is required";
   password.focus();
   return false;
 }
 //validate address
 if (address.value.trim() == "") {
   address.style.border = "1px solid red";
   document.getElementById('address_div').style.color = "red";
   address_err.textContent = "Address is required";
   address.focus();
   return false;
 }
}

function firstNameVerify() {
 if (firstName.value.trim() != "") {
  firstName.style.border = "1px solid #5e6e66";
  document.getElementById('firstName_div').style.color = "#5e6e66";
  firstName_err.innerHTML = "";
  return true;
 }
}

function lastNameVerify() {
 if (lastName.value.trim() != "") {
  lastName.style.border = "1px solid #5e6e66";
  document.getElementById('lastName_div').style.color = "#5e6e66";
  lastName_err.innerHTML = "";
  return true;
 }
}

function addressVerify() {
 if (address.value.trim() != "") {
  address.style.border = "1px solid #5e6e66";
  document.getElementById('address_div').style.color = "#5e6e66";
  address_err.innerHTML = "";
  return true;
 }
}

 function passwordVerify() {
  if (password.value.trim() != "") {
   password.style.border = "1px solid #5e6e66";
   document.getElementById('password_div').style.color = "#5e6e66";
   password_err.innerHTML = "";
   return true;
  }
}
</script>
