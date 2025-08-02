<?php
// Testing if session is valid
include("server/session_starter.php");
include_once("server/session_check.php");
// End of testing if session is valid

// Checking if id is gotten
require("server/id_getter.php");
// End checking if id is gotten

// Refusing any modification if userId aren't the same
if ($user_id != $id_timeliner) {
  header("Location: index.php");
}
?>
<!doctype html>
<html lang="en-us">
<head>
  <!-- Including main head informations -->
  <?php include_once("includes/headEssential.php"); ?>
  <!-- End of including main head informations -->

  <link rel="stylesheet" href="css/main.css">
  <title>Edit profile</title>
</head>
<body>
  <div class="container">
    <div class="row">

      <!-- Profile header -->
      <?php include_once("includes/profile/profile_header.php") ?>
      <!-- End profile header -->

      <!-- Left side  -->
      <?php include_once("includes/profile/profile_left.php") ?>
      <!-- End of Left Side -->

      <!-- Right side  -->
      <div class="col-md-9 col-lg-9 edit_element">
        <!-- basic informations -->
        <div id="basic_informations" class="">
          <?php include_once("includes\profile\update_basic.php") ?>
        </div>
        <!-- End basic informations -->
        <!-- Education and work -->
        <div id="education_and_work" class="page_Hidden">
          <?php include_once("includes\profile\update_education_and_work.php") ?>
        </div>
        <!-- End Education and work -->
        <!-- My Interests -->
        <div id="my_interests" class="page_Hidden">
          <?php include_once("includes\profile\my_interests.php") ?>
        </div>
        <!-- End My Interests -->
        <!-- Account settings -->
        <div id="account_settings" class="page_Hidden">
          <?php include_once("includes\profile\account_setting.php") ?>
        </div>
        <!-- End Account settings -->
        <!-- Change password -->
        <div id="change_password" class="page_Hidden">
          <?php include_once("includes\profile\password_change.php") ?>
        </div>
        <!-- End Change password -->
      </div>
      <!-- End Right side  -->

    </div>
  </div>

  <script src="js/profile_edit.js" charset="utf-8"></script>
</body>
</html>
