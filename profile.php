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
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="home.php">PetCare</a>
      </div>
      <ul class="nav navbar-right">
        <li class="navigation_bar_list"><a href="searchPage.php">Search Services</a></li>
        <li class="navigation_bar_list"><a href="#">Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="wrapper">
          <nav id="sidebar">
              <!-- Sidebar Header -->
              <div class="sidebar-header">
                  <h3>User menu</h3>
              </div>
              <!-- Sidebar Links -->
              <ul class="list-unstyled components">
                  <li class="active"><a href="#">Profile</a></li>
                  <li><a href="newPet.php">New Pet</a></li>
                  <li><a href="newService.php">New Service</a></li>
                  <li><a href="listedServices.php">Listed Service</a></li>
                  <li><a href="listedPets.php">View Pets</a></li>
              </ul>
          </nav>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="form-area">
          <div class="header">
            <h2>Profile Page</h2>
          </div>
          <form class="suForm form-horizontal form_font" method="POST" action="">
            <div class="form-group">
              <label class="control-label col-xs-3" for="name">Name:</label>
              <div class="col-xs-8">
                <input class="form-control" id="name" type="text" name="name" placeholder="" value=""/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-4" for="username">Change Username:</label>
              <div class="col-xs-8">
                <input class="form-control" id="username" type="text" name="username"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-3" for="password">Change Password:</label>
              <div class="col-xs-8">
                <input class="form-control" id="password" type="text" name="password" placeholder="" value=""/>
              </div>
            </div>
            <div class="sign_up_submit">
              <center>
                <input class="btn" id="submitBtn" type="submit" value="Sign Up"/>
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include 'profile.php';?>
</body>
</html>
