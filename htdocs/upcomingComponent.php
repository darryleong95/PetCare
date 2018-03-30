<div class="upcoming">
  <div class="header-upcoming">
    <h2>Upcoming Jobs</h2>
    <p>(Showing 3 Upcoming Jobs)</p>
  </div>
  <div class="content-upcoming">
    <?php
      session_start();
      $id = $_SESSION["id"];
      $result = pg_query($db, "SELECT * FROM request WHERE petsitterid = '$id' AND status = 'accepted'");
      $currentDate = date("Y-m-d");

      while ($row = pg_fetch_array($result)) {
        $startDate      = $row['requeststart'];
        $startDateD     = date($startDate);
        $endDate        = $row['requestend'];
        $bid            = $row['bid'];
        $additionalInfo = $row['message'];
        $id2            = $row['petownerid'];
        $query          = "SELECT * FROM petowner WHERE petownerid = '$id2'";
        $result1        = pg_query($db,$query);
        $counter        = 0;
        $counter2       = 0;
        while($row2 = pg_fetch_array($result1)){
          if($counter<3 && $currentDate < $startDateD){
            echo "<div class='upcoming-result'><p>Pet owner: ", $row2['firstname'], " ", $row2['lastname'], "<br>";
            echo "Start date: ", $startDate, "<br>"; // works just fine
            echo "End date  : ", $endDate, "<br>"; // works just fine
            echo "Bid               : ", $bid, "<br>"; // works just fine
            if(isNotEmpty($additionalInfo)){
              echo "Additional Information: ", $additionalInfo, "<br>";
            }
            echo "</p></div>";
            echo nl2br("<br><br>") ;
            $counter = $counter + 1;
            $counter2 = $counter2 +1;
          }
        }
        if($counter2 == 0){
          echo "<div class='upcoming-no-result'><strong>No upcoming service<strong></div>";
          echo "<form action='receivedRequest.php'>
                  <center>
                    <input type='submit' name='submit' value='Update Profile' class='btn-request'/>
                  </center>
                </form>";
        }
      }
    ?>
  </div>
</div>
