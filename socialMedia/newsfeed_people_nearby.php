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
  <title>newsfeed people nearby</title>
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

      <!-- Friends suggest display -->
      <div class="col-lg-7 col-md-7">

        <!-- Post article -->
        <?php include_once("includes/post_form.php") ?>
        <!-- End of post article -->

        <!-- Friend suggest -->
        <div class="friend_sug col-md-12 col-lg-12">
          <?php
          $user_id = $_SESSION['id'];
          $db = Database::connect();
          $query = $db->prepare("SELECT * FROM users WHERE id != ?");
          $query -> execute(array($user_id));
          while($found_nearby = $query -> fetch()){
            ?>
            <div class="people_nearby">
              <div class="firend_details">
                <img style="width:80px;height:80px;" class="rounded-circle" src="images/profile/<?php echo $found_nearby["profile_image"] ?>" alt="<?php echo $found_nearby["username"] ?>">
              </div>
              <div class="friend_details_right">
                <p><b><?php echo $found_nearby["username"] ?></b><br><?php echo $found_nearby["school_option"] ?><br><i class="fas fa-map-pin"></i> <i><?php echo $found_nearby["state"] . ", " . $found_nearby["country"] ?></i></i></p>
              </div>
              <div class="but_add_friend">
                <a class="add_friend_btn" href="btn btn-info">+ Add friend</a>
              </div>
            </div>
            <hr>
            <?php
          }
          Database::disconnect();
          ?>
        </div>
        <!-- End of friend suggest -->

      </div>
      <!-- End of Friends suggest display -->

      <!-- Friends suggest bloc(it woun't be displayed on small screens) -->
      <?php include_once("includes/sideMenu_right.php") ?>
      <!-- End of friends suggest bloc -->

    </div>
  </div>
</body>
</html>
