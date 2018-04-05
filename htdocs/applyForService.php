<?php
  session_start();
  include('connection.php');
  if($_SESSION['made-request-fail']){
    echo "<script>alert('Unable to make a request, please try again.')</script>";
    $_SESSION['made-request-fail'] = false;
  }
  if($_SESSION['made-request-pass']){
    echo "<script>alert('Total number of pets you have exceeds sitter's capacity.')</script>";
    $_SESSION['made-request-pass'] = false;
  }
?>
<!DOCTYPE html>
<html>
<header>
  <title>Apply for: <?= $_SESSION['title'] ?> </title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</header>
<body>
  <div class="inner-container.apply">
    <div class="nav-wrapper">
      <?php include('navbar.php'); ?>
    </div>
    <div class="overall-wrapper">
      <div class="content-wrapper">
        <div class="apply-outer">
          <div class="apply-inner">
            <form name="apply_form" class="suForm form-horizontal form_font" method="POST" action="applyForService_post.php" onsubmit="return Validate()">
              <div class="form-group row">
                <label class="control-label col-sm-4 apply" for="startDate">Start Date:</label>
                <div id="startDate_div" class="col-sm-5">
                  <input class="form-control" size="21" type="date" id="startDate" name="startDate" value= '<?= $_SESSION['startDate']?>' />
                  <div id="startDate_err"></div>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4 apply" for="endDate">End Date:</label>
                <div id="endDate_div" class="col-sm-5">
                  <input class="form-control" size="21" type="date" id="endDate" name="endDate" value= '<?= $_SESSION['endDate']?>' />
                  <div id="endDate_err"></div>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4 apply" for="bid">Bid: </label>
                <div id="bid_div" class="col-sm-5">
                  <input class="form-control" type="number" id="bid" name="bid" placeholder="Place your bid here" value= '<?= $_SESSION['price']?>' step="0.01" />
                  <div id="bid_err"></div>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4 apply" for="additionalInfo">Additional Information:</label>
                <div class="col-sm-8">
                  <textarea class="form-control apply" rows = "4" id="additionalInfo" name="additionalInfo" placeholder="How many pets do you have? Anything the sitter should know?" /></textarea>
                </div>
              </div>
                <!-- check whether there have been accepted reqeuests already -->
                <?php
                include('connection.php');
                  //check whether sitter has already accepted any requests
                  $q1 = "SELECT * FROM request WHERE serviceid = '$_POST[id]' AND status = 'ACCEPTED'";
                  $results = pg_query($db,$q1);

                  //check whether pet owner has already made a request
                  $id = $_SESSION["id"];
                  $q2 = "SELECT * FROM request WHERE serviceid = '$_POST[id]' AND petownerid = '$id'";
                  $results2 = pg_query($db,$q2);

                  //compare email
                  $psid = $_SESSION['petsitterid'];
                  $q3 = "SELECT * FROM petsitter WHERE petsitterid = '$psid'";
                  $results3 = pg_query($db,$q3);

                  //check whether sitter has already accepted any requests
                  $q4 = "SELECT * FROM request WHERE serviceid = '$_POST[id]' AND petownerid = '$id'";
                  $results4 = pg_query($db,$q4);

                  while($row = pg_fetch_array($results3)){
                    $sitterEmail = $row['email'];
                  }

                  if(is_null($_SESSION["id"])){
                    echo "<div class='form-group alert alert-warning'>
                      <center><strong>You must be logged in to make a Request.</strong></center>
                      </div>
                      <div class='form-group sign_up_submit'>
                        <center>
                          <input type='submit' name='submit' value='Register my Pet!' class='btn apply' disabled/>
                        </center>
                      </div>";
                  }
                  else{
                    if($_SESSION["userType"] == "po"){
                      if($_SESSION["email"] && $sitterEmail ==  $_SESSION["email"]){
                        // tell them that they cannot register
                        echo "<div class='form-group alert alert-warning'>
                          <center><strong>You cannot register for you own service</strong><center>
                          </div>
                          <div class='form-group sign_up_submit'>
                            <center>
                              <input type='submit' name='submit' value='Register my Pet!' class='btn apply' disabled/>
                            </center>
                          </div>
                          ";
                      }
                      else{
                        if(pg_num_rows($results2) != 0){
                          echo "<div class='form-group alert alert-warning'>
                            <center><strong>You have already made a request for this Sitter.</center></strong>
                            </div>
                            <div class='form-group sign_up_submit'>
                              <center>
                                <input type='submit' name='submit' value='Register my Pet!' class='btn apply' disabled/>
                              </center>
                            </div>
                            ";
                        }
                        else if(pg_num_rows($results) != 0){
                          while($row = pg_fetch_array($results)){
                            $start = $row['requeststart'];
                            $end   = $row['requestend'];
                            if($row['petownerid'] == $_SESSION["id"]){
                              echo "<div class='form-group alert alert-warning'>
                                <center><strong>You have already made a request for this Sitter.</strong><center>
                                </div>
                                <div class='form-group sign_up_submit'>
                                  <center>
                                    <input type='submit' name='submit' value='Register my Pet!' class='btn apply' disabled/>
                                  </center>
                                </div>
                                ";
                            }
                            else{
                              echo "<div class='form-group alert alert-warning'>
                                <center><strong>*Please note that the sitter has already accepted a booking from $start to $end*</strong><center>
                                </div>
                                <div class='form-group sign_up_submit'>
                                  <center>
                                    <input type='submit' name='submit' value='Register my Pet!' class='btn apply'/>
                                  </center>
                                </div>";
                            }
                          }
                        }
                        else{
                          echo "
                            <div class='form-group sign_up_submit'>
                              <center>
                                <input type='submit' name='submit' value='Register my Pet!' class='btn apply'/>
                              </center>
                            </div>";
                        }
                      }
                    }
                    else{
                      echo "<div class='form-group alert alert-warning'>
                            <center><strong>Please log into your Owner account to make a request</strong></center>
                            </div>
                            <div class='form-group sign_up_submit'>
                              <center>
                                <input type='submit' name='submit' value='Register my Pet!' class='btn apply' disabled/>
                              </center>
                            </div>
                            ";
                        }
                  }
                 ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
 var bid = document.forms['apply_form']['bid'];
 var startDate = document.forms['apply_form']['startDate'];
 var endDate = document.forms['apply_form']['endDate'];

 var bid_err = document.getElementById("bid_err");
 var startDate_err = document.getElementById("startDate_err");
 var endDate_err = document.getElementById("endDate_err");

 bid.addEventListener('blur', bidVerify, true);
 startDate.addEventListener('blur', startDateVerify, true);
 endDate.addEventListener('blur', endDateVerify, true);

 function Validate() {

   //validate startDate
   if (!startDate.value) {
     startDate.style.border = "1px solid red";
     document.getElementById('startDate_div').style.color = "red";
     startDate_err.textContent = "Please specify Start date of Service";
     startDate.focus();
     return false;
   }

   if(startDate.value < <?= $_SESSION['startDate'] ?>){
     startDate.style.border = "1px solid red";
     document.getElementById('startDate_div').style.color = "red";
     startDate_err.textContent = "Please specify a date within the range of the Service";
     startDate.focus();
     return false;
   }

   //validate endDate : Empty
   if (!endDate.value) {
     endDate.style.border = "1px solid red";
     document.getElementById('endDate_div').style.color = "red";
       endDate_err.textContent = "Please specify End date of Service";
     endDate.focus();
     return false;
   }

   //validate endDate : Time less than start date
   if (endDate.value && startDate.value && endDate.value < startDate.value) {
     endDate.style.border = "1px solid red";
     document.getElementById('endDate_div').style.color = "red";
     endDate_err.textContent = "End date cannot preceed Start date";
     endDate.focus();
     return false;
   }

   if(endDate.value > <?= $_SESSION['endDate'] ?>){
     endDate.style.border = "1px solid red";
     document.getElementById('endDate_div').style.color = "red";
     endDate_err.textContent = "Please specify a date within the range of the Service";
     endDate.focus();
     return false;
   }

  //validate price
  if (Number(bid.value) < <?= $_SESSION['price']?>) {
    bid.style.border = "1px solid red";
    document.getElementById('bid_div').style.color = "red";
    bid_err.textContent = "Bid must be greater than specified minimum from the Pet sitter ";
    bid.focus();
    return false;
  }
}

function startDateVerify() {
  if (startDate.value) {
   startDate.style.border = "1px solid #5e6e66";
   document.getElementById('startDate_div').style.color = "#5e6e66";
   startDate_err.innerHTML = "";
   return true;
  }
}

function endDateVerify() {
  if (endDate.value) {
   endDate.style.border = "1px solid #5e6e66";
   document.getElementById('endDate_div').style.color = "#5e6e66";
   endDate_err.innerHTML = "";
   return true;
  }
}

function bidVerify() {
  if (bid.value != "") {
   bid.style.border = "1px solid #5e6e66";
   document.getElementById('bid_div').style.color = "#5e6e66";
   bid_err.innerHTML = "";
   return true;
  }
}
</script>
