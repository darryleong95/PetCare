<?php
  include('connection.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign up form</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="inner-container">
      <div class="nav-wrapper">
        <?php include('navbar.php');?>
      </div>
      <div class="content-wrapper">
        <div class="form-area">
          <div class="header-owner">
            <h2>Sign up form (Pet Owner)</h2>
          </div>
          <form name="signup_form" class="suForm form-horizontal form_font" method="POST" action="signup_post_po.php" onsubmit="return Validate()">
            <div class="form-group">
              <div class="" id="firstName_div">
                <input class="form-control" id="firstName" type="text" name="firstName" placeholder="First Name (required)" value=""/>
                <div id="firstName_err"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="" id="lastName_div">
                <input class="form-control" id="lastName" type="text" name="lastName" placeholder="Last Name (required)" value=""/>
                <div id="lastName_err"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="" id="email_div">
                <input class="form-control" id="email" type="text" name="email" placeholder="Enter email (required)" value=""/>
                <div id="email_err"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="" id="password_div">
                <input class="form-control" id="password" type="password" name="password" placeholder="Enter password (required)"/>
                <div id="password_err"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="" id="address_div">
                <input class="form-control" id="address" type="text" name="address" placeholder="Enter address (required)" value=""/>
                <div id="address_err"></div>
              </div>
            </div>
            <div class="sign_up_submit">
              <center>
                <input type="submit" name="submit" value="Sign up!" class="btn owner"/>
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>
    <footer style="font-family:'Quicksand'; font-size:15px;">&copy;CS2102 Project: Pet Care, Group 32</footer>
  </body>
</html>
<script type="text/javascript">
  var firstName = document.forms['signup_form']['firstName'];
  var lastName = document.forms['signup_form']['lastName'];
  var email = document.forms['signup_form']['email'];
  var password = document.forms['signup_form']['password'];
  var address = document.forms['signup_form']['address'];

  var firstName_err = document.getElementById("firstName_err");
  var lastName_err = document.getElementById("lastName_err");
  var email_err = document.getElementById("email_err");
  var password_err = document.getElementById("password_err");
  var address_err = document.getElementById("address_err");

  firstName.addEventListener('blur', firstNameVerify, true);
  lastName.addEventListener('blur', lastNameVerify, true);
  email.addEventListener('blur', emailVerify, true);
  password.addEventListener('blur', passwordVerify, true);
  address.addEventListener('blur', addressVerify, true);

  function Validate() {
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
   //validate email
   if (email.value.trim() == "") {
     email.style.border = "1px solid red";
     document.getElementById('email_div').style.color = "red";
     email_err.textContent = "Email is required";
     email.focus();
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

    function emailVerify() {
     if (email.value.trim() != "") {
      email.style.border = "1px solid #5e6e66";
      document.getElementById('email_div').style.color = "#5e6e66";
      email_err.innerHTML = "";
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
