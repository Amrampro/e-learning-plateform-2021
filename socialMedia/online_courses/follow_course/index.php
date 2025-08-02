<?php
require ("../../server/db_connection.php");

if (!empty($_GET)) {
  $course_id = $_GET["course_id"];
  if (!empty($_GET["id"])) {
    $id = $_GET["id"];
  } else {
    $id = "";
  }
}
?>

<!doctype html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Page Title</title>
  <link rel="stylesheet" href="style.css">
  <!-- Lien vers mon fichier bootstrap -->
  <!-- <link rel="stylesheet" href="vendor/css/bootstrap.min.css"> -->
  <!-- Lien vers mon fichier bootstrap -->
  <link rel="stylesheet" href="vendor/fonts/css/all.css">
</head>
<body>
  <!-- <div class="head">
  <i class="fas fa-boak"></i><b>Amram</b>
  <span class="float-right"><i class="fas fa-user"></i> <i class="fas fa-bell"></i></span>
</div> -->
<div id="fill_in" class="">
  <div id="left_side" class="leftside">
    <?php
    $db = Database::connect();
    $query = $db -> query("SELECT * FROM courses WHERE id = '$course_id'");
    while ($found_course = $query -> fetch()) {
      $teacher_id = $found_course["id_prof"];
      $query_teacher = $db -> query("SELECT * FROM users WHERE id = '$teacher_id'");
      $found_teacher = $query_teacher -> fetch();
      ?>
      <li><img src="../../images/profile/<?= $found_teacher['profile_image'] ?>" width="100px" height="100px" alt=""></li>
      <li>Nom : <?= $found_teacher["first_name"] . " " . $found_teacher["last_name"] ?></li>
      <li>Pseudo : <?= $found_teacher["username"] ?></li>
      <li>Email : <a href="mailto:<?= $found_teacher["email"] ?>"><?= $found_teacher["email"] ?></a></li>
      <li>Cours : <?= $found_course['name'] ?></li>
      <?php
    }
    Database::disconnect();
    ?>
    <hr>
    <?php
    $db = Database::connect();
    $query = $db->query("SELECT * FROM chapters WHERE course = '$course_id'");
    while ($found_chap = $query -> fetch()) {
      ?>
      <a class="chaps_titles" href="index.php?course_id=<?= $course_id ."&id=". $found_chap["id"] ?>"><?= $found_chap["name"] ?></a>
      <?php
    }
    Database::disconnect();
    ?>
  </div>
  <div id="right_side" class="rside_int">
    <?php require 'course_nav.php'; ?>
    <div class="course_content">
      <?php
      if (empty($id)) {
        $db = Database::connect();
        $query = $db->query("SELECT * FROM chapters WHERE course = '$course_id' LIMIT 1");
        while ($found_chap = $query -> fetch()) {
          ?>
          <h1><?= $found_chap["name"] ?></h1>
          <p><?= $found_chap["full_course"] ?></p>
          <a href="#" class="download_file"><i class="fas fa-download"></i> Download file</a>
          <?php
        }
        Database::disconnect();
      } else {
        $db = Database::connect();
        $query = $db->query("SELECT * FROM chapters WHERE id = '$id'");
        while ($found_chap = $query -> fetch()) {
          ?>
          <h1><?= $found_chap["name"] ?></h1>
          <p><?= $found_chap["full_course"] ?></p>
          <a href="../files/<?= $found_chap['file_location'] ?>" class="download_file"><i class="fas fa-download"></i> Download file</a>
          <?php
        }
        Database::disconnect();
      }
      ?>
    </div>
  </div>
</div>
</body>
</html>
