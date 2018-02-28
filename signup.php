<!DOCTYPE html>
<html>
<header>
  <title>Sign up form</title>

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
    <form class="suForm form-horizontal form_font" method="POST" action="">
      <div class="form-group">
        <label class="control-label col-xs-3" for="un">Username:</label>
        <div class="col-xs-8">
          <input class="form-control" id="un" type="text" name="username" placeholder="Enter preferred username (required)" value=""/>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" for="pw">Password</label>
        <div class="col-xs-8">
          <input class="form-control" id="pw" type="password" name="password" placeholder="Enter password (required)"/>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-4" for="email">Email</label>
        <div class="col-xs-8">
          <input class="form-control" id="email" type="text" name="email" placeholder="Enter email (required)" value=""/>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" for="phoneNum">Contact Number</label>
        <div class="col-xs-8">
          <input class="form-control" id="phoneNum" type="text" name="phoneNum" placeholder="Enter contact number (optional)" value=""/>
        </div>
      </div>
      <div class="sign_up_submit">
        <center>
          <input class="btn" id="submitBtn" type="submit" value="Sign Up"/>
        </center>
      </div>
    </form>
  </div>
</body>
</html>
