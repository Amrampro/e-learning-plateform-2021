<div onclick="show_main_sideMenu_left()" id="main_sideMenu_left_but" class="main_sideMenu_left_but">
  <img class="rounded-circle img-thumbnail" src="images/profile/person.jpg" alt="">
</div>
<!-- <div onclick="hide_main_sideMenu_left_el()" id="main_sideMenu_left" class="col-lg-3 col-md-3 main_sideMenu_left"> -->
<div id="main_sideMenu_left" class="col-lg-3 col-md-3 main_sideMenu_left">
  <div class="profile_info">
    <div class="">
      <a href="timeline.php?id=<?= $found_user["id"] ?>">
        <img style="width:100px;height:100px;" class="rounded-circle img-thumbnail" src="images/profile/<?php echo $found_user["profile_image"] ?>" alt="<?php echo $found_user["username"] ?>">
      </a>
    </div>
    <div class="person_personnal_info">
      <strong><a href="timeline.php?id=<?= $found_user["id"] ?>">My account</a></strong>
      <p>+<i class="fas fa-user"></i> 1999 followers</p>
    </div>
  </div>
  <div class="profile_menu">
    <li><a href="newsfeed.php"><i style="color:#90C84B;" class="fas fa-newspaper"></i> My newsfeed</a></li>
    <hr>
    <li><a href="newsfeed_people_nearby.php"><i style="color:#662D91;" class="fas fa-users"></i> People nearby</a></li>
    <hr>
    <li><a href="newsfeed_friends.php"><i style="color:#EF4380;" class="fas fa-user-friends"></i> Friends</a></li>
    <hr>
    <li><a href="newsfeed_messages.php"><i style="color:#F7941E;" class="fas fa-envelope"></i> Messages</a></li>
    <hr>
    <li><a href="newsfeed_image.php"><i style="color:#1C75BC;" class="fas fa-images"></i> Images</a></li>
    <hr>
    <li><a href="newsfeed_video.php"><i style="color:#9E1F63;" class="fas fa-video"></i> Videos</a></li>
    <hr>
  </div>
  <div class="friends_Online">
    <a class="col-lg-12 col-md-12 btn chatOnline" href="#">Chat online</a>
    <img style="width:100px;height:100px;" class="rounded-circle img-thumbnail" src="images/profile/person.jpg" alt="">
    <img style="width:100px;height:100px;" class="rounded-circle img-thumbnail" src="images/profile/person.jpg" alt="">
    <img style="width:100px;height:100px;" class="rounded-circle img-thumbnail" src="images/profile/person.jpg" alt="">
    <img style="width:100px;height:100px;" class="rounded-circle img-thumbnail" src="images/profile/person.jpg" alt="">
    <img style="width:100px;height:100px;" class="rounded-circle img-thumbnail" src="images/profile/person.jpg" alt="">
    <img style="width:100px;height:100px;" class="rounded-circle img-thumbnail" src="images/profile/person.jpg" alt="">
  </div>
</div>

<script type="text/javascript">
<?php require("js/show_sidebars.js") ?>
</script>
