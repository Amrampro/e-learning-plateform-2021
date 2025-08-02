<?php
// Testing if session is valid
include("server/session_starter.php");
include_once("server/session_check.php");
// End of testing if session is valid
?>

<!doctype html>
<html lang="en-us">
<head>
  <!-- Including main head informations -->
  <?php include_once("includes/headEssential.php"); ?>
  <!-- End of including main head informations -->

  <link rel="stylesheet" href="css/main.css">
  <title>Friends</title>
</head>
<body>

<!-- Navbar -->
<?php require ("includes/nav.php"); ?>
  <!-- End navbar -->
  
  <div class="container">
    <div class="row">

      <!-- Profile menu(Woun't be displayed on phone screens) -->
      <?php include_once("includes/sideMenu_left.php") ?>
      <!-- End of profile menu -->

      <!-- Friends display -->
      <div class="col-lg-7 col-md-7 newsfeedfriends">

        <!-- Post article -->
        <?php include_once("includes/post_form.php") ?>
        <!-- End of post article -->

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
      <!-- End of friends display -->

      <!-- Friends suggest bloc(it woun't be displayed on small screens) -->
      <?php include_once("includes/sideMenu_right.php") ?>
      <!-- End of friends suggest bloc -->

    </div>
  </div>
</body>
</html>
