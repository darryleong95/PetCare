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
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="home.php">PetCare</a>
      </div>
      <ul class="nav navbar-right">
        <li class="navigation_bar_list"><a href="#">Search Services</a></li>
        <li class="navigation_bar_list"><a href="signup.php">Sign up</a></li>
      </ul>
    </div>
  </nav>
  <div class="form-area">
    <div class="header">
      <h2>Sign up form</h2>
    </div>
    <form name="signup_form" class="suForm form-horizontal form_font" method="POST" action="" onsubmit="return Validate()">
      <div class="form-group">
        <label class="control-label col-xs-3" for="username">Username:</label>
        <div class="col-xs-8" id="user_div">
          <input class="form-control" id="username" type="text" name="username" placeholder="Enter username (required)" value=""/>
          <div id="user_err"></div>
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
          <input type="submit" name="register" value="Login" class="btn"/>
        </center>
      </div>
    </form>
  </div>
</body>
</html>
<script type="text/javascript">
  var username = document.forms['signup_form']['username'];
  var password = document.forms['signup_form']['password'];

  var user_err = document.getElementById("user_err");
  var pass_err = document.getElementById("pass_err");

  username.addEventListener('blur', userVerify, true);
  password.addEventListener('blur', passVerify, true);

  function Validate() {
   //validate username
   if (username.value.trim() == "") {
     username.style.border = "1px solid red";
     document.getElementById('user_div').style.color = "red";
     user_err.textContent = "Username is required";
     username.focus();
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

  function userVerify() {
   if (username.value.trim() != "") {
    username.style.border = "1px solid #5e6e66";
    document.getElementById('user_div').style.color = "#5e6e66";
    user_err.innerHTML = "";
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
