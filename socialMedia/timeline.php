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
  <title>timeline</title>
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

      <div class="col-md-6 col-lg-6">
        <?php
        $db = Database::connect();
        $query = $db -> query("SELECT * FROM publication WHERE id_user = '$id_timeliner' ORDER BY id DESC");
        while($found_pub = $query->fetch()){
          $publication_id = $found_pub["id"];
          $publisherId = $found_pub["id_user"];
          $query_publisher = $db -> query("SELECT username, school_option, profile_image FROM users WHERE id = '$publisherId'");
          while($found_publisher_info = $query_publisher->fetch()){
            ?>
            <div class="publication">
              <div class="publication_image">
                <?php if ($found_pub["picture"] == 0) { ?>
                  <video style="width:100%;height:auto;" controls>
                    <source src="videos/video.mp4" type="video/mp4">
                    </video>
                  <?php } else if ($found_pub["video"] == 0){ ?>
                    <img class="" style="width:100%;height:auto;" src="images/posted/<?php echo $found_pub["picture"] ?>" alt="">
                  <?php } ?>
                </div>
                <div class="container publication_info">
                  <div class="pub_info_image">
                    <img style="width:70px;height:auto;" src="images/profile/<?php echo $found_publisher_info["profile_image"] ?>" alt="">
                  </div>
                  <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <p class="pub_name">
                      <b><a href="timeline.php?id=<?= $publisherId ?>"><?php echo $found_publisher_info["username"] ?></a></b>
                      <span class="pub_stat"><?php echo $found_publisher_info["school_option"] ?></span>
                    </p>
                    <p class="pub_date">Published on <?php echo $found_pub["pub_date"] ?></p>
                  </div>
                  <div class="like_unlike col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <?php if ($found_pub["file"] == 0 || empty($found_pub["file"])) { ?>
                      <i class="far fa-heart liked"> 10</i>
                    <?php } else { ?>
                      <i class="far fa-heart liked"> 10</i>
                      <a href="files/main/<?= $found_pub["file"] ?>" download><i class="fas fa-download disliked"></i></a>
                    <?php } ?>
                  </div>
                </div>
                <hr>
                <!-- Section for the publication_text -->
                <div class="container publication_text">
                  <p><?php echo $found_pub["pub_commentary"] ?></p>
                </div>
                <!-- End publication_text -->
                <hr>
                <!-- Section for comments -->
                <div class="container comments_show col-10">
                  <?php
                  $retrive_reply = $db->query("SELECT * FROM replies WHERE id_publication = '$publication_id'");
                  while ($found_replies = $retrive_reply->fetch()) {
                    $id_replyer = $found_replies["id_replyer"];
                    $replyer_identity = $db -> query("SELECT id, username, profile_image FROM users WHERE id = '$id_replyer'");
                    $found_replyer_identity = $replyer_identity -> fetch();
                    ?>
                    <div class="publication_comments">
                      <div class="commenter_picture">
                        <img src="images/profile/<?= $found_replyer_identity["profile_image"] ?>" alt="">
                      </div>
                      <div class="col-9">
                        <p class="commenter">
                          <a href="timeline.php?id=<?= $id_replyer ?>">
                            <b><?= $found_replyer_identity["username"] ?></b>
                          </a>
                          <?= $found_replies["reply_message"] ?>
                        </p>
                      </div>
                    </div><br>
                  <?php } ?>
                </div>
                <div class="post_comment">
                  <form action="server/reply_post.php" method="POST">
                    <div class="form-row reply_pub">
                      <div class="form-group replyer_image">
                        <img src="images/profile/<?= $found_user["profile_image"] ?>" alt="">
                      </div>
                      <div class="form-group replyer_message col-8">
                        <input type="hidden" name="pub_id" value="<?php echo $found_pub["id"]; ?>">
                        <input type="hidden" name="replyer_id" value="<?php echo $user_id; ?>">
                        <input type="text" name="replyer_message" class="reply_field form-control" placeholder="Comment this post">
                      </div>
                      <div class="form-group send_btn">
                        <button type="submit" class="btn btn-primary">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- End of comments -->
              </div>
              <br>
              <?php
            }
          }
          Database::disconnect();
          ?>
        </div>
        <!-- End of Left Side -->

      </div>
    </div>
  </body>
  </html>
