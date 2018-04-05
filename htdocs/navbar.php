<?php
  session_start();
 ?>

<?php
if(isset($_SESSION['firstName']) && $_SESSION['email'] != "admin"){
  if($_SESSION['userType'] == "po"){
      echo '<nav class="navbar navbar-expand-lg ">
              <a class="navbar-brand" href="home.php">Pet care</a>
              <div id="navbarNavDropdown" class="navbar-collapse collapse">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="search.php">Search Services</a></li>
                  <li class="nav-item"><a class="nav-link" href="profile_po.php">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="listedPets.php">Pets</a></li>
                  <li class="nav-item"><a class="nav-link" href="madeRequest.php">Requests</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
                </ul>
              </div>
            </nav>';
  }
  else{
    echo '<nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="home.php">Pet care</a>
            <div id="navbarNavDropdown" class="navbar-collapse collapse">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="profile_ps.php">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="listedServices.php">Listed Services</a></li>
                <li class="nav-item"><a class="nav-link" href="receivedRequest.php">Requests</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
              </ul>
            </div>
          </nav>';
  }
}
else{
  if($_SESSION['email'] == "admin"){
    //admin logged in
    echo '<nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="home.php">Pet care</a>
            <div id="navbarNavDropdown" class="navbar-collapse collapse">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="search.php">Search Services</a></li>
                <li class="nav-item"><a class="nav-link" href="adminPage.php">Admin Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
              </ul>
            </div>
          </nav>';
  }
  else{
    echo '<nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="home.php">Pet care</a>
            <div id="navbarNavDropdown" class="navbar-collapse collapse">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="search.php">Search Services</a></li>
                <li class="nav-item"><a class="nav-link" href="signup_po.php">Sign up (Pet Owner)</a></li>
                <li class="nav-item"><a class="nav-link" href="signup_ps.php">Sign up (Pet Sitter)</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
              </ul>
            </div>
          </nav>';
  }
}
 ?>
