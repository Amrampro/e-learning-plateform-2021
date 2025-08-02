<?php
// Testing if session is valid
include("server/session_starter.php");
require("server/session_check.php");
// End of testing if session is valid

//Including the post_article server
require("server/post_article.php");

?>

<!doctype html>
<html lang="en-us">
<head>
  <!-- Including main head informations -->
  <?php include_once("includes/headEssential.php"); ?>
  <!-- End of including main head informations -->

  <link rel="stylesheet" href="css/main.css">
  <title>Post an article</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Navbar -->

      <!-- End navbar -->
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 article_form">
        <form action="post_article.php" method="POST" enctype="multipart/form-data">
          <div class="col-12 main_poster_info">
            <div class="profile_poster_image">
              <img style="width:70px;height:70px;" class="rounded-circle" src="images/profile/<?php echo $found_user["profile_image"] ?>" alt="<?php echo $found_user["username"] ?>">
            </div>
            <div class="profile_poster_info">
              <p><?php echo $found_user["username"] ?></p>
              <select class="" name="" disabled>
                <option value=""><i class=""></i> Public</option>
                <option value=""><i class=""></i> Only my category</option>
              </select>
              <select class="" name="uploadToGallery">
                <option value="not_save"><i class=""></i> Do not upload to my gallery</option>
                <option value="save"><i class=""></i> Upload to my gallery</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="col-12 form-control" name="comment" rows="8" cols="80" placeholder="Write something new..."></textarea>
          </div>
          <div class="form-group">
            <label for="photo_video"><i class="fas fa-image"></i> / <i class="fas fa-video"></i> Photo / Video <sub class="infi_nb">(To properly show your image, chose an image of height 350px)</sub></label><br>
            <input type="file" name="picvid" class="photo_video_post" id="photo_video">
            <span class="help-inline"><?php echo $imageError; ?></span>
          </div>
          <div class="form-group">
            <label for="file"><i class="fas fa-file"></i> PDF : </label>
            <input type="file" name="chose_file" class="photo_video_post" id="file">
            <span class="help-inline"><?php echo $fileError; ?></span>
          </div>
          <button type="submit" name="post_article" class="btn btn-primary">Post</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
