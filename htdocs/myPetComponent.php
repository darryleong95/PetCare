<div class="myPet">
  <div class="header-myPet">
    <h2>My Pets</h2>
  </div>
  <div class="content-upcoming">
    <?php
      session_start();
      $id = $_SESSION["id"];
      $result = pg_query($db, "SELECT * FROM has_pet WHERE petownerid = '$id'");
      while ($row = pg_fetch_array($result)) {
        echo "<div class='myPet-result'>";
        echo "<span>" . $row['petname'] . "</span><br>";
        if(!$row['img']){
          //set default pic
          echo "<div><img alt='Pet-image' class='pet-img' src='uploads/emptyProfile.png'>";
        }
        else{
          $img = $row['img'];
          echo "<div><img alt='Pet-image' class='pet-img' src='" . $img . "'>";
        }
        echo "</div>Breed: " . $row['breed'] . "<br>";
        echo "Date of birth: " . $row['dob'] . "<br>";
        echo "</div>";
      }
    ?>
  </div>
</div>
