<!DOCTYPE html>
<html>
  <header>
    <title>New Service</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

    <script type="text/javascript" src="http://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

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
                    <li class="active"><a href="#">New Service</a></li>
                    <li><a href="listedServices.php">Listed Service</a></li>
                    <li><a href="listedPets.php">View Pets</a></li>
                </ul>
            </nav>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="form-area">
            <div class="header">
              <h2>List your Services</h2>
            </div>
            <form name="service_form" class="suForm form-horizontal form_font" method="POST" action="" onsubmit="return Validate()">
              <div class="form-group">
                <label class="control-label col-xs-3" for="un">Title:</label>
                <div id="title_div" class="col-xs-8">
                  <input class="form-control" id="un" type="text" name="title" placeholder="Title" value=""/>
                  <div id="title_err"></div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4" for="price">Price:</label>
                <div id="price_div" class="col-xs-8">
                  <input class="form-control" id="price" type="number" name="price"/>
                  <div id="price_err"></div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4" for="datefilter">Select date range:</label>
                <div id="datefilter_div" class="col-xs-8">
                  <input type="text" name="datefilter" value="" />
                  <div id="datefilter_err"></div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3" for="addtionalInfo">Additional Information:</label>
                <div class="col-xs-8">
                  <textarea class="form-control" rows = "3" id="addtionalInfo" name="addtionalInfo" placeholder="Anything potential service users might want to know! (Optional)"></textarea>
                </div>
              </div>

              <div class="sign_up_submit">
                <input type="submit" name="register" value="List" class="btn"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
 var title = document.forms['service_form']['title'];
 var price = document.forms['service_form']['price'];

 var title_err = document.getElementById("title_err");
 var price_err = document.getElementById("price_err");

 title.addEventListener('blur', titleVerify, true);
 price.addEventListener('blur', priceVerify, true);

 function Validate() {
  // validate title
  if (title.value == "") {
    title.style.border = "1px solid red";
    document.getElementById('title_div').style.color = "red";
    title_err.textContent = "Title is required";
    title.focus();
    return false;
  }
  //validate price
  if (Number(price.value) <= 0) {
    price.style.border = "1px solid red";
    document.getElementById('price_div').style.color = "red";
    price_err.textContent = "Price listed must be greater than 0";
    price.focus();
    return false;
  }
}

function titleVerify() {
  if (title.value != "") {
   title.style.border = "1px solid #5e6e66";
   document.getElementById('title_div').style.color = "#5e6e66";
   title_err.innerHTML = "";
   return true;
  }
}

function priceVerify() {
  if (price.value < 0) {
   price.style.border = "1px solid #5e6e66";
   document.getElementById('price_div').style.color = "#5e6e66";
   price_err.innerHTML = "";
   return true;
  }
}
</script>
