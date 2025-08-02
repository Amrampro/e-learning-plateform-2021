<?php
if (!empty($_GET)) {
  $id_timeliner = $_GET["id"];

  $db = Database::connect();
  $query_timeline_info = $db -> query("SELECT * FROM users WHERE id = '$id_timeliner'");
  $found_timeline_info = $query_timeline_info -> fetch();
  Database::disconnect();

  if ($user_id == $id_timeliner) {
    // To get modifications of images
    $modif_profile_background = '<span onclick="bac()" class="profile_background_modif"><a href="#"><i class="fas fa-pen-square"></i></a></span>';
    $modif_profile_image = '<span onclick="fro()" class="profile_picture_modif"><a href="#"><i class="fas fa-pen-square"></i></a></span>';

    // To access edit page
    $edit_info = "edit_profile.php";
  }else{
    $modif_profile_background = $modif_profile_image = "";
    
    $edit_info = "timeline_about.php";
  }
}else{
  die("no id gotten");
}
 ?>

 <!-- Updating images -->
<div>
  <form id="front" action="server/profile_modify.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id_timeliner ?>">
    <input type="file" name="fimage" accept="image/jpeg,image/png">
    <button name="front" class="btn btn-info">Update profile image</button>
  </form>

  <form id="back" action="server/profile_modify.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $id_timeliner ?>">
    <input type="file" name="bimage" accept="image/jpeg,image/png">
    <button name="back" class="btn btn-info">Update cover image</button>
  </form>
</div>
<style>
  #front, #back{
    background: aqua;
    width: 500px;
    position: absolute;
    z-index: 1;
    margin-top: 1%;
    padding: 5px;
    border-radius: 5px;
  }
</style>
<script>
  document.getElementById("back").style.display = "none";
  document.getElementById("front").style.display = "none";
  function bac() {
    document.getElementById("front").style.display = "none";
    document.getElementById("back").style.display = "block";
  }
  function fro() {
    document.getElementById("back").style.display = "none";
    document.getElementById("front").style.display = "block";
  }
</script>