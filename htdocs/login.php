<?php
  session_start();
  include('connection.php');
  if($_SESSION['already-signup']){
    echo "<script>alert('You already have an account! Please sign in here.')</script>";
    $_SESSION['already-signup'] = false;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="css/form.css?version=2">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <!--===============================================================================================-->
	   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="inner-container">
      <div class="nav-wrapper">
        <?php include('navbar.php') ?>
      </div>
      <div class="content-wrapper">
        <div class="pet-owner-wrapper">
          <div class="form-area pet-owner-content">
            <div class="owner-header">
              <h2>Owner</h2>
            </div>
            <form name="login_form_owner" class="suForm form-horizontal form_font" method="POST" action="login_post_po.php" onsubmit="return ValidateOwner()">
              <div class="form-group">
                <div class="" id="email_div_owner">
                  <input class="form-control" id="email" type="text" name="email" placeholder="Email" value=""/>
                  <div id="email_err_owner"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="" id="pass_div_owner">
                  <input class="form-control" id="password" type="password" name="password" placeholder="Password"/>
                  <div id="pass_err_owner"></div>
                </div>
              </div>
              <div class="sign_up_submit">
                <center>
                  <input type="submit" name="submit" value="Login" class="btn owner-submit"/>
                </center>
              </div>
            </form>
          </div>
        </div>
        <div class="pet-sitter-wrapper">
          <div class="form-area pet-sitter-content">
            <div class="sitter-header">
              <h2>Sitter</h2>
            </div>
            <form name="login_form_sitter" class="suForm form-horizontal form_font" method="POST" action="login_post_ps.php" onsubmit="return ValidateSitter()">
              <div class="form-group">
                <div class="" id="email_div_sitter">
                  <input class="form-control" id="email" type="text" name="email" placeholder="Email" value=""/>
                  <div id="email_err_sitter"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="" id="pass_div_sitter">
                  <input class="form-control" id="password" type="password" name="password" placeholder="Password"/>
                  <div id="pass_err_sitter"></div>
                </div>
              </div>
              <div class="sign_up_submit">
                <center>
                  <input type="submit" name="submit" value="Login" class="btn sitter-submit"/>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer style="font-family:'Quicksand'; font-size:15px;">&copy;CS2102 Project: Pet Care, Group 32</footer>
      <!-- <div class="additional-info-wrapper">
        <div class="additional-info-content">
          <h1 class="wb">Welcome Back</h1>
        </div>
      </div> -->
    </div>
  </body>
</html>
<script type="text/javascript">
  var email_owner = document.forms['login_form_owner']['email'];
  var password_owner = document.forms['login_form_owner']['password'];

  var email_err_owner = document.getElementById("email_err_owner");
  var pass_err_owner = document.getElementById("pass_err_owner");

  email_owner.addEventListener('blur', emailOwnerVerify, true);
  password_owner.addEventListener('blur', passOwnerVerify, true);

  function ValidateOwner() {
   //validate username
   if (email_owner.value.trim() == "") {
     email_owner.style.border = "1px solid red";
     document.getElementById('email_div_owner').style.color = "red";
     email_err_owner.textContent = "Email is required";
     email_owner.focus();
     return false;
   }
   //validate password
   if (password_owner.value == "") {
     password_owner.style.border = "1px solid red";
     document.getElementById('pass_div_owner').style.color = "red";
     pass_err_owner.textContent = "Password is required";
     password_owner.focus();
     return false;
   }
  }

  function emailOwnerVerify() {
   if (email_owner.value.trim() != "") {
    email_owner.style.border = "1px solid #5e6e66";
    document.getElementById('email_div_owner').style.color = "#5e6e66";
    email_err_owner.innerHTML = "";
    return true;
   }
  }

  function passOwnerVerify() {
   if (password_owner.value != "") {
    password_owner.style.border = "1px solid #5e6e66";
    document.getElementById('pass_div_owner').style.color = "#5e6e66";
    pass_err_owner.innerHTML = "";
    return true;
   }
  }

  var email_sitter = document.forms['login_form_sitter']['email'];
  var password_sitter = document.forms['login_form_sitter']['password'];

  var email_err_sitter = document.getElementById("email_err_sitter");
  var pass_err_sitter = document.getElementById("pass_err_sitter");

  email_sitter.addEventListener('blur', emailSitterVerify, true);
  password_sitter.addEventListener('blur', passSitterVerify, true);

  function ValidateSitter() {
   //validate username
   if (email_sitter.value.trim() == "") {
     email_sitter.style.border = "1px solid red";
     document.getElementById('email_div_sitter').style.color = "red";
     email_err_sitter.textContent = "Email is required";
     email_sitter.focus();
     return false;
   }
   //validate password
   if (password_sitter.value == "") {
     password_sitter.style.border = "1px solid red";
     document.getElementById('pass_div_sitter').style.color = "red";
     pass_err_sitter.textContent = "Password is required";
     password_sitter.focus();
     return false;
   }
  }

  function emailSitterVerify() {
   if (email_sitter.value.trim() != "") {
    email_sitter.style.border = "1px solid #5e6e66";
    document.getElementById('email_div_sitter').style.color = "#5e6e66";
    email_err_sitter.innerHTML = "";
    return true;
   }
  }

  function passSitterVerify() {
   if (password_sitter.value != "") {
    password_sitter.style.border = "1px solid #5e6e66";
    document.getElementById('pass_div_sitter').style.color = "#5e6e66";
    pass_err_sitter.innerHTML = "";
    return true;
   }
  }
</script>
