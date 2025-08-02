<div class="col-lg-2 col-md-2 d-none d-md-block d-lg-block">
  <div class="">
    <div class="fst"><!--friend show text-->
      <h5>Latest Courses</h5>
    </div>
    <?php
    $db = Database::connect();
    $query = $db -> query("SELECT * FROM courses ORDER BY id DESC LIMIT 5");
    while($seen_notif = $query -> fetch()){
      $id_prof = $seen_notif["id_prof"];
      $prof_query = $db -> query("SELECT * FROM users WHERE id = '$id_prof'");
      while($found_prof = $prof_query -> fetch()){
        ?>
        <div class="friend_suggest">
          <div class="fsi">
            <img style="width:50px;height:50px;" class="rounded-circle" src="online_courses/img/courses/<?= $seen_notif["image"] ?>" alt="<?= $seen_notif["name"] ?>">
          </div>
          <div class="fsin">
            <a href="online_courses/follow_course/index.php?course_id=<?= $seen_notif["id"] ?>"><p class=""><b><?= $seen_notif["name"] ?></b><br></p></a>
            <a href="online_courses/follow_course/index.php?course_id=<?= $seen_notif["id"] ?>"> + See course</a>
          </div>
          <hr>
        </div>
        <?php
      }
    }
    Database::disconnect();
    ?>
  </div>
</div>
