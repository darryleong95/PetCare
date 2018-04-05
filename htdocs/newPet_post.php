<?php
  session_start();
  include('connection.php');
  // FILE UPLOAD
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $isFile   = 1;
  $fileSize = 1;
  $fileType = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $id = $_SESSION["id"];

  $allPets = pg_query($db, "SELECT * FROM has_pet");
  if(pg_num_rows($allPets) != 0){
    while($row = pg_fetch_array($allPets)){
      $numRow = $row['petid'] + 1;
    }
  }
  else{
    $numRow = 0;
  }

  $result = pg_query($db, "SELECT * FROM petowner WHERE email = '$email'");

  if(isset($_POST['submit'])){
    //image check
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {}
    else{
      $isFile = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $fileSize = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $fileType = 0;
    }
    //end of image check
    if($_POST['gender'] == 'Male'){
      $gender = "t";
    }
    else{
      $gender = "f";
    }

    $flag = false;

    if($_FILES["fileToUpload"]["name"] == ""){
      //no file chosen
      $flag = true;
    }
    if($isFile === 1 && $fileSize === 1 && $fileType === 1){
      $flag = true;
    }

    if($flag){
      $petname = pg_escape_string($_POST[petName]);
      $breed   = pg_escape_string($_POST[breed]);
      $additionalInfo = pg_escape_string($_POST[additionalInfo]);
      if($_FILES["fileToUpload"]["name"] == ""){
        $execute = pg_query($db, "INSERT INTO has_pet(petid,petName,sex,breed,dob,additionalInfo,petownerid,pettype)
        VALUES('$numRow','$petname','$gender','$breed','$_POST[dob]','$additionalInfo','$id','$_POST[type]')");
      }
      else{
        $execute = pg_query($db, "INSERT INTO has_pet(petid,petName,sex,breed,dob,additionalInfo,petownerid,pettype,img)
        VALUES('$numRow','$petname','$gender','$breed','$_POST[dob]','$additionalInfo','$id','$_POST[type]','$target_file')");
      }
      if($execute){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $_SESSION['new-pet-pass'] = true;
        header("Location:listedPets.php");
      }
      else{
        $_SESSION['new-pet-fail'] = true;
        header("Location:profile_po.php");
      }
    }
    else{
    //   echo "<script>alert('"
    //   if($isFile === 0){
    //     echo "Selected file was not an Image. ";
    //   }
    //   if($fileSize === 0){
    //     echo "Selected file was too large (> 500kb). ";
    //   }
    //   if($fileType === 0){
    //     echo "Only JPG, JPEG, PNG & GIF files are allowed.";
    //   }
    //   echo "')</script>";
    //   echo "Hello there";
    //   include("profile_po.php");
    }
  }

 ?>
