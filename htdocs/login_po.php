<?php
  session_start();
  include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<header>
  <title>Login</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</header>
<body>
  <div class="form-area">
    <div class="header">
      <h2>Log in here (Pet owner)</h2>
    </div>
    <form name="login_form" class="suForm form-horizontal form_font" method="POST" action="login_post_po.php" onsubmit="return Validate()">
      <div class="form-group">
        <label class="control-label col-xs-3" for="email">Email:</label>
        <div class="col-xs-8" id="email_div">
          <input class="form-control" id="email" type="text" name="email" placeholder="Enter Email (required)" value=""/>
          <div id="email_err"></div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" for="password">Password: </label>
        <div class="col-xs-8" id="pass_div">
          <input class="form-control" id="password" type="password" name="password" placeholder="Enter password (required)"/>
          <div id="pass_err"></div>
        </div>
      </div>
      <div class="sign_up_submit">
        <center>
          <input type="submit" name="submit" value="Login" class="btn"/>
        </center>
      </div>
    </form>
  </div>
</body>
</html>
<script type="text/javascript">
  var email = document.forms['login_form']['email'];
  var password = document.forms['login_form']['password'];

  var email_err = document.getElementById("email_err");
  var pass_err = document.getElementById("pass_err");

  email.addEventListener('blur', emailVerify, true);
  password.addEventListener('blur', passVerify, true);

  function Validate() {
   //validate username
   if (email.value.trim() == "") {
     email.style.border = "1px solid red";
     document.getElementById('email_div').style.color = "red";
     email_err.textContent = "Email is required";
     email.focus();
     return false;
   }
   //validate password
   if (password.value == "") {
     password.style.border = "1px solid red";
     document.getElementById('pass_div').style.color = "red";
     pass_err.textContent = "Password is required";
     password.focus();
     return false;
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

  function passVerify() {
   if (password.value != "") {
    password.style.border = "1px solid #5e6e66";
    document.getElementById('breed_div').style.color = "#5e6e66";
    pass_err.innerHTML = "";
    return true;
   }
  }
</script>
