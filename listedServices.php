<!DOCTYPE html>
<html>
<header>
  <title>Registered Pets</title>

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
                  <li><a href="profile.php">Profile</a></li>
                  <li><a href="newPet.php">New Pet</a></li>
                  <li><a href="newService.php">New Service</a></li>
                  <li class="active"><a href="#">Listed Service</a></li>
                  <li><a href="listedPets.php">View Pets</a></li>
              </ul>
          </nav>
        </div>
      </div>
      <div class="col-sm-9">

          <div class="header">
            <h2>Pets Services</h2>
          </div>
          <div class="content-wrapper">
            <div class="dummyContent">
              <h2>Title1</h2>
              <h6>Date Range: 02/03/2018 - 03/03/2018</h6>
              <h6>Price per day: $12</h6>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <br>
            <div class="dummyContent">
              <h2>Title2</h2>
              <h6>Date Range: 02/03/2018 - 03/03/2018</h6>
              <h6>Price per day: $12</h6>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <br>
            <div class="dummyContent">
              <h2>Title3</h2>
              <h6>Date Range: 02/03/2018 - 03/03/2018</h6>
              <h6>Price per day: $12</h6>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>

    </div>
  </div>
  <?php?>
</body>
</html>
