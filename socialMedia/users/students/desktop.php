<?php
// Testing if session is valid
include("../../server/session_starter.php");
require("../../server/db_connection.php");
require("../user_serve/upload.php");

if (empty($_SESSION["id"])) {
  header("Location: ../../index.php");
}else{
  $user_id = $_SESSION["id"];

  $db = Database::connect();
  $query = $db -> prepare("SELECT id, first_name, last_name, username, email, country, state, gender, birth_date, school_level, school_option, profile_image, background_image, suspended, account_type FROM users WHERE id = ?");
  $query -> execute(array($user_id));
  $found_user = $query -> fetch();
  Database::disconnect();
}
// End of testing if session is valid
?>
<!doctype html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Font awesome css-->
  <link rel="stylesheet" href="../../fontawesome5/css/all.css">

  <!-- Liaup 1.0.0 css offline link -->
  <link rel="stylesheet" href="../../liaup/css/all.css">

  <!-- Liaup 1.0.0 js offline link for clock -->
  <script type="text/javascript" src="../../liaup/js/liaup-clock.js" defer=""></script>

  <!-- Bootstrap 4.0.0 css offline link -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">

  <!-- Bootstrap 4.0.0 js offline link -->
  <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js" defer=""></script>

  <link rel="stylesheet" href="../css/userStyle.css">
  <title>Desktop</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="task_bar">
        <div class="left_task_bar">
          <li><a href="../../edit_profile.php?id=<?= $user_id ?>" target="_blank"><img src="../icons/settings.png" alt=""></a></li>
          <li onclick="openMp3Player()" class="d-none d-md-inline-block d-lg-inline-block"><a href="#"><img src="../icons/mus_player.png" alt=""></a></li>
          <li><a href="../../online_courses/"><img src="../icons/books.png" alt=""></a></li><!-- For online courses -->
        </div>
        <div class="right_task_bar">
          <li><a href="../../newsfeed_messages.php" target="_blank"><img src="../icons/message.png" alt=""></a></li><!-- Message Icon -->
          <li class="d-none d-md-inline-block d-lg-inline-block"><a href="#"><img src="../icons/vid_player.png" alt=""></a></li>
          <li><a href="../../timeline.php?id=<?= $user_id ?>" target="_blank"><img src="../icons/user.ico" alt=""></a></li>
          <li><div id="liaup_clock" class="clock">Clock loading...</div></li>
        </div>
      </div>
      <div class="center_task_bar">
        <a href="../../newsfeed.php" target="_blank"><img src="../../images/profile/<?= $found_user['profile_image'] ?>" alt=""></a>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">

      <!-- Folders -->
      <div class="folders">
        <!-- For videos -->
        <div onclick="openVideos()" class="videos_section">
          <img src="../icons/folder.ico" alt="">
          <p>Videos</p>
        </div>
        <!-- End for videos -->
        <!-- For images -->
        <div onclick="openImages()" class="images_section">
          <img src="../icons/folder.ico" alt="">
          <p>Images</p>
        </div>
        <!-- End for images -->
        <!-- For audios -->
        <div onclick="openAudios()" class="audios_section">
          <img src="../icons/folder.ico" alt="">
          <p>Audios</p>
        </div>
        <!-- End for audio -->
        <!-- For documents -->
        <div onclick="openDocuments()" class="documents_section">
          <img src="../icons/folder.ico" alt="">
          <p>Documents</p>
        </div>
        <!-- End for documents -->
      </div>
      <!-- End folders -->

      <!-- Folder contents -->
      <div class="folder_contents">

        <!-- Folder video -->
        <div id="videos_content" class="videos_content">
          <div class="content_head">
            <li class="title_name">Videos</li>
            <li>
              <form action="desktop.php" method="POST" enctype="multipart/form-data">
                <label class="label_for_filechoose" for="video_choose"><i class="fas fa-upload"></i> Upload a video</label>
                <input class="file_chooser" type="file" id="video_choose" name="video_file" value="">
                <input type="submit" name="post_video" value="post">
                <?= $videoError ?>
              </form>
            </li>
            <li onclick="close_vid()" class="close_but">Close</li>
          </div>
          <div class="content_body">
            <!-- Video -->
            <?php
            $db = Database::connect();
            $query_vid = $db -> query("SELECT * FROM cloud WHERE id_user = '$id_user' && file_type='mp4'");
            while($found_vid = $query_vid -> fetch()){
              $file_name = substr($found_vid["uploaded_file"], 0 , 5);
              ?>
              <div class="folder_elements">
                <a href="../cloud_zone/videos/<?= $found_vid["uploaded_file"] ?>">
                  <img src="../icons/video_mus.png" alt="">
                  <p><?= $file_name . "..." ?></p>
                </a>
              </div>
              <?php
            }
            Database::disconnect();
             ?>
             <!-- Video -->
          </div>
        </div>
        <!-- End folder video -->

        <!-- Folder Image -->
        <div id="image_content" class="image_content">
          <div class="content_head">
            <li class="title_name">Images</li>
            <li>
              <form action="desktop.php" method="POST" enctype="multipart/form-data">
                <label class="label_for_filechoose" for="image_choose"><i class="fas fa-upload"></i> Upload an image</label>
                <input class="file_chooser" type="file" id="image_choose" name="image_file" value="">
                <input type="submit" name="post_image" value="post">
                <?= $imageError ?>
              </form>
            </li>
            <li onclick="close_im()" class="close_but">Close</li>
          </div>
          <div class="content_body">
            <!-- Image -->
            <?php
            $db = Database::connect();
            $query_vid = $db -> query("SELECT * FROM cloud WHERE id_user = '$id_user' && (file_type='jpg' || file_type='png')");
            while($found_vid = $query_vid -> fetch()){
              $file_name = substr($found_vid["uploaded_file"], 0 , 5);
              ?>
              <div class="folder_elements">
                <a href="../cloud_zone/images/<?= $found_vid["uploaded_file"] ?>">
                  <img src="../icons/video_mus.png" alt="">
                  <p><?= $file_name . "..." ?></p>
                </a>
              </div>
              <?php
            }
            Database::disconnect();
             ?>
            <!-- End image -->
          </div>
        </div>
        <!-- End folder Image -->

        <!-- Folder audio -->
        <div id="audio_content" class="audio_content">
          <div class="content_head">
            <li class="title_name">Audios</li>
            <li>
              <form action="desktop.php" method="POST" enctype="multipart/form-data">
                <label class="label_for_filechoose" for="audio_choose"><i class="fas fa-upload"></i> Upload an audio</label>
                <input class="file_chooser" type="file" id="audio_choose" name="audio_file" value="">
                <input type="submit" name="post_audio" value="post">
                <?= $audioError ?>
              </form>
            </li>
            <li onclick="close_aud()" class="close_but">Close</li>
          </div>
          <div class="content_body">
            <!-- Audio -->
            <?php
            $db = Database::connect();
            $query_vid = $db -> query("SELECT * FROM cloud WHERE id_user = '$id_user' && (file_type='mp3' || file_type='ogg')");
            while($found_vid = $query_vid -> fetch()){
              $file_name = substr($found_vid["uploaded_file"], 0 , 5);
              ?>
              <div class="folder_elements">
                <a id="muss" onclick="see()" customAt="../cloud_zone/audios/<?= $found_vid["uploaded_file"] ?>">
                  <img src="../icons/audio_mus.png" alt="">
                  <p><?= $file_name . "..." ?></p>
                </a>
              </div>
              <?php
            }
            Database::disconnect();
             ?>
            <!-- End audio -->
          </div>
        </div>
        <!-- End folder audio -->

        <!-- Folder document -->
        <div id="document_content" class="documents_content">
          <div class="content_head">
            <li class="title_name">Documents</li>
            <li>
              <form action="desktop.php" method="POST" enctype="multipart/form-data">
                <label class="label_for_filechoose" for="file_choose"><i class="fas fa-upload"></i> Upload a document</label>
                <input class="file_chooser" type="file" id="file_choose" name="file_file" value="">
                <input type="submit" name="post_file" value="post">
                <?= $fileError ?>
              </form>
            </li>
            <li onclick="close_doc()" class="close_but">Close</li>
          </div>
          <div class="content_body">
            <!-- Document -->
            <?php
            $db = Database::connect();
            $query_vid = $db -> query("SELECT * FROM cloud WHERE id_user = '$id_user' && file_type='pdf'");
            while($found_vid = $query_vid -> fetch()){
              $file_name = substr($found_vid["uploaded_file"], 0 , 5);
              ?>
              <div class="folder_elements">
                <a href="../cloud_zone/files/<?= $found_vid["uploaded_file"] ?>">
                  <img src="../icons/document.png" alt="">
                  <p><?= $file_name . "..." ?></p>
                </a>
              </div>
              <?php
            }
            Database::disconnect();
             ?>
            <!-- End document -->
          </div>
        </div>
        <!-- End folder document -->

      </div>
      <!-- End folder contents -->

      <!-- Mp3 Player -->
      <div id="musicplayer_window" class="col-md-3 col-lg-3 mp3Player">
        <div class="music_player_header">
          <i onclick="closeMp3Player()" class="fas fa-times close_player"></i>
          <i onclick="minimizeMp3Player()" class="fas fa-window-minimize minimize_player"></i>
        </div>
        <div class="simple_disk_image">
          <img src="../icons/disk.png" alt="">
        </div>
        <div class="audio_player">
          <!-- <li class="mus_title"><p>Sound name</p></li> -->
          <li><i class="fas fa-fast-backward"></i></li>
          <li id="playPause_btn" onclick="playPause()"><i class="fas fa-play"></i></li>
          <li><i class="fas fa-fast-forward"></i></li>
          <li onclick="stop()"><i class="fas fa-stop"></i></li>
          <li><a href="../audio/iPhone"><i class="fas fa-download"></i></a></li>
          <audio id=audio>
            <source id="mussrc" src="../audio/iPhone.mp3" type="audio/mpeg">
            </audio>
          </div>
        </div>
        <!-- End Mp3 Player -->

      </div>
    </div>

    <script src="../js/folders.js" charset="utf-8"></script>
    <script src="../js/audioControls.js" charset="utf-8"></script>
    <script>
      function see() {
        var muss = document.getElementById("muss").getAttribute("customAt");
        document.getElementById("musicplayer_window").style.display="block";
        // var mussrc = document.getElementById("mussrc").setAttribute("src","525");
        document.getElementById("mussrc").setAttribute("src",''+muss);
        var muu = document.getElementById("mussrc").getAttribute("src");
        alert('Element gotten : '+muss+'\n\n element changed : '+mussrc+' \n\n music src : '+muu);
      }
    </script>
  </body>
  </html>
