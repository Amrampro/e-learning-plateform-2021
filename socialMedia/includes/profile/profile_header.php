<header style="background-image: url('images/profile/cover/<?= $found_timeline_info["background_image"] ?>')" class="edit_prof col-md-12 col-lg-12">
  <?= $modif_profile_background ?>
  <div class="small_nav">
    <?= $modif_profile_image ?>
    <img src="images/profile/<?= $found_timeline_info["profile_image"] ?>" class="rounded-circle img-thumbnail" alt="">
    <a href="timeline.php?id=<?= $id_timeliner ?>"><i class="fas fa-clock"></i> <span class="d-none d-md-inline-block">Timeline</span></a>
    <a href="<?= $edit_info ?>?id=<?= $id_timeliner ?>"><i class="fas fa-user"></i> <span class="d-none d-md-inline-block">About</span></a>
    <a href="timeline_album.php?id=<?= $id_timeliner ?>"><i class="fas fa-images"></i> <span class="d-none d-md-inline-block">Album</span></a>
    <a href="timeline_friends.php?id=<?= $id_timeliner ?>"><i class="fas fa-users"></i> <span class="d-none d-md-inline-block">Friends</span></a>
    <!-- <p class="">1,999 People following</p> -->
    <a class="right_small_nav" href="#">+ <i class="fas fa-user"></i> <span class="d-none d-md-inline-block">Add friend</span></a>
  </div>
</header>
