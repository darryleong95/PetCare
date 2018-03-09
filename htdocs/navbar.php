<?php
  session_start();
 ?>

<?php
if(isset($_SESSION['firstName']) && $_SESSION['email'] != "admin"){
  if($_SESSION['userType'] == "po"){
    echo '<nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="home.php">PetCare</a>
              </div>
              <ul class="nav navbar-right">
                <li class="navigation_bar_list"><a href="searchPage.php">Search Services</a></li>
                <li class="navigation_bar_list"><a href="profile_po.php">Profile</a></li>
                <li class="navigation_bar_list"><a href="logout.php">Log out</a></li>
              </ul>
            </div>
          </nav>';
  }
  else{
    echo '<nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="home.php">PetCare</a>
              </div>
              <ul class="nav navbar-right">
                <li class="navigation_bar_list"><a href="profile_ps.php">Profile</a></li>
                <li class="navigation_bar_list"><a href="logout.php">Log out</a></li>
              </ul>
            </div>
          </nav>';
  }
}
else{
  if($_SESSION['email'] == "admin"){
    //admin logged in
    echo '<nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="home.php">PetCare</a>
              </div>
              <ul class="nav navbar-right">
                <li class="navigation_bar_list"><a href="searchPage.php">Search Services</a></li>
                <li class="navigation_bar_list"><a href="adminPage.php">Admin profile</a></li>
                <li class="navigation_bar_list"><a href="logout.php">Log out</a></li>
              </ul>
            </div>
          </nav>';
  }
  else{
    echo '<nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="home.php">PetCare</a>
              </div>
              <ul class="nav navbar-right">
                <li class="navigation_bar_list"><a href="searchPage.php">Search Services</a></li>
                <li class="navigation_bar_list"><a href="signup_po.php">Sign up (Pet Owner)</a></li>
                <li class="navigation_bar_list"><a href="signup_ps.php">Sign up (Pet Sitter)</a></li>
                <li class="navigation_bar_list"><a href="login_po.php">Login (Pet Owner)</a></li>
                <li class="navigation_bar_list"><a href="login_ps.php">Login (Pet Sitter)</a></li>
              </ul>
            </div>
          </nav>';
  }
}
 ?>
