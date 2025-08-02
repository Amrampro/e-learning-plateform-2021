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
  <title>About</title>
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

      <!-- Right side  -->
      <div class="col-md-9 col-lg-9 tLARightSide">
        <br>
        <h4><i class="fas fa-info"></i> Personnal Information</h4>
        <p>Here, you will edit all your informations as you like. Be it your name, adresse, or all the other rests.
          On SmeetUp, you are free to do whatever you will like to do as long as it concerns the educational domain.</p>
          <hr>
          <div class="workExperience">
            <h4><i class="fas fa-briefcase"></i> Work Experiences</h4>
            .<br>
            .<br>
            .<br>
            .<br>
          </div>
          <div class="location">
            <h4><i class="fas fa-map"></i> Location</h4>
            <p>228 Wanko street, Cameroon</p>
            .<br>Map goes here<br>.
          </div>
          <div class="TLAInterests">
            <h4><i class="far fa-heart"></i> Interests</h4>
            <li><i class="fas fa-biking"></i></li>
            <li><i class="fas fa-camera-retro"></i></li>
            <li><i class="fas fa-shopping-cart"></i></li>
            <li><i class="fas fa-plane"></i></li>
            <li><i class="fas fa-utensils"></i></li>
          </div>
          <div class="TLALanguage">
            <h4><i class="fas fa-sms"></i> Language</h4>
            <li>English</li>
            <li>French</li>
            <li>Russian</li>
            <li>Arabian</li>
          </div>
        </div>
        <!-- End of Right side  -->
      </div>
    </div>
  </body>
  </html>
