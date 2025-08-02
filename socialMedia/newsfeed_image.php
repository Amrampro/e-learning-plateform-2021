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
  <title>Newsfeed images</title>
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

      <!-- News image display -->
      <div class="col-lg-7 col-md-7 newsfeedimage">

        <!-- Post article -->
        <?php include_once("includes/post_form.php") ?>
        <!-- End of post article -->
        <?php
        $db = Database::connect();
        $query = $db -> query("SELECT * FROM publication WHERE video = '0' ORDER BY id DESC");
        while($found_pub = $query->fetch()){
          $publisherId = $found_pub["id_user"];
          $query_publisher = $db -> query("SELECT username, school_option, profile_image FROM users WHERE id = '$publisherId'");
          while($found_publisher_info = $query_publisher->fetch()){
            ?>
            <!-- First image -->
            <div class="posted_image">
              <div class="simple_image">
                <img src="images/posted/<?php echo $found_pub["picture"] ?>" alt="image">
              </div>
              <p> <i class="fas fa-heart liked"> 50</i></p>
              <hr>
              <div class="image_owner_info">
                <div class="image_owner_picture">
                  <img style="width:50px;height:50px;" class="rounded-circle" src="images/profile/<?php echo $found_publisher_info["profile_image"] ?>" alt="">
                </div>
                <div class="image_owner_ad">
                  <a href="timeline_album.php"><b><?php echo $found_publisher_info["username"] ?></b></a>
                  <p><?php echo $found_publisher_info["school_option"] ?></p>
                </div>
              </div>
            </div>
            <!-- End First image -->
            <?php
          }
        }
        Database::disconnect();
        ?>

      </div>
      <!-- End of News image display -->

      <!-- Friends suggest bloc(it woun't be displayed on small screens) -->
      <?php include_once("includes/sideMenu_right.php") ?>
      <!-- End of friends suggest bloc -->
    </div>
  </div>
</body>
</html>
