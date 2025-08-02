<?php
// Testing if session is valid
include("server/session_starter.php");
include_once("server/session_check.php");
// End of testing if session is valid

// Checking if id is gotten
require("server/id_getter.php");
// End checking if id is gotten
?>

<!doctype html>
<html lang="en-us">
<head>

  <!-- Including main head informations -->
  <?php include_once("includes/headEssential.php"); ?>
  <!-- End of including main head informations -->

  <link rel="stylesheet" href="css/main.css">
  <title>timeline friends</title>
</head>
<body>
  <div class="container">
    <div class="row">

      <!-- Profile header -->
      <?php include_once("includes/profile/profile_header.php") ?>
      <!-- End profile header -->

      <!-- Left side  -->
      <div class="col-md-3 col-lg-3">
        <?php include_once("includes/profile/profile_owner_name.php") ?>
      </div>
      <!-- End of Left Side -->

      <div class="col-md-7 col-lg-7 timelinefriends">
        <!-- First friend -->
        <div class="friend_box">
          <img src="images/profile/night.jpg" style="width:100%;height:auto;" alt="">
          <div class="friend_box_info">
            <img style="width:80px;height:auto;" class="rounded-circle img-thumbnail friend_box_f_image" src="images/profile/person.jpg" alt="">
            <div class="friend_box_ad">
              <a href="timeline_album.php"><b>Dianna Ambia</b></a>
              <p>Social engineer</p>
            </div>
          </div>
        </div>
        <!-- End First friend -->
        <!-- Second friend -->
        <div class="friend_box">
          <img src="images/profile/night.jpg" style="width:100%;height:auto;" alt="">
          <div class="friend_box_info">
            <img style="width:80px;height:auto;" class="rounded-circle img-thumbnail friend_box_f_image" src="images/profile/person.jpg" alt="">
            <div class="friend_box_ad">
              <a href="timeline_album.php"><b>Dianna Ambia</b></a>
              <p>Social engineer</p>
            </div>
          </div>
        </div>
        <!-- End Second friend -->
        <!-- Third friend -->
        <div class="friend_box">
          <img src="images/profile/night.jpg" style="width:100%;height:auto;" alt="">
          <div class="friend_box_info">
            <img style="width:80px;height:auto;" class="rounded-circle img-thumbnail friend_box_f_image" src="images/profile/person.jpg" alt="">
            <div class="friend_box_ad">
              <a href="timeline_album.php"><b>Dianna Ambia</b></a>
              <p>Social engineer</p>
            </div>
          </div>
        </div>
        <!-- End Third friend -->
        <!-- Fourth friend -->
        <div class="friend_box">
          <img src="images/profile/night.jpg" style="width:100%;height:auto;" alt="">
          <div class="friend_box_info">
            <img style="width:80px;height:auto;" class="rounded-circle img-thumbnail friend_box_f_image" src="images/profile/person.jpg" alt="">
            <div class="friend_box_ad">
              <a href="timeline_album.php"><b>Dianna Ambia</b></a>
              <p>Social engineer</p>
            </div>
          </div>
        </div>
        <!-- End Fourth friend -->
        <!-- Firth friend -->
        <div class="friend_box">
          <img src="images/profile/night.jpg" style="width:100%;height:auto;" alt="">
          <div class="friend_box_info">
            <img style="width:80px;height:auto;" class="rounded-circle img-thumbnail friend_box_f_image" src="images/profile/person.jpg" alt="">
            <div class="friend_box_ad">
              <a href="timeline_album.php"><b>Dianna Ambia</b></a>
              <p>Social engineer</p>
            </div>
          </div>
        </div>
        <!-- End Firth friend -->
      </div>
    </div>
  </div>
</body>
</html>
