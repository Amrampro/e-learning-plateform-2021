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
  <title>timeline album</title>
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

      <!-- Right side -->
      <div class="col-md-9 col-lg-9 album_right">
        <img class="album_image" src="images/profile/night.jpg" alt="">
        <img class="album_image" src="images/profile/night.jpg" alt="">
        <img class="album_image" src="images/profile/night.jpg" alt="">
        <img class="album_image" src="images/profile/night.jpg" alt="">
        <img class="album_image" src="images/profile/night.jpg" alt="">
        <img class="album_image" src="images/profile/night.jpg" alt="">
        <img class="album_image" src="images/profile/night.jpg" alt="">
      </div>
      <!-- End right side -->
    </div>
  </div>
</body>
</html>
