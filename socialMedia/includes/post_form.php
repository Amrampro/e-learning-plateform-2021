<a href="post_article.php">
  <div class="publish_set col-md-12 col-lg-12">
    <form class="post_form" action="post_article.php" method="">
      <li><img style="width:60px;height:60px;" class="rounded-circle" src="images/profile/<?php echo $found_user["profile_image"] ?>" alt="<?php echo $found_user["username"] ?>"></li>
      <li class="d-none d-md-inline-block"><input class="form-control" type="text" name="post" value="" placeholder="Post"></li>
      <li><input type="submit" class="btn submit_post_but" value="Publish"></li>
    </form>
    <hr>
  </div>
</a>
