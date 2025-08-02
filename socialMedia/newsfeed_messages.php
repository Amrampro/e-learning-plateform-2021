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
  <title>Messages</title>
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

      <!-- Messages display -->
      <div class="col-lg-7 col-md-7">

        <!-- Post article -->
        <?php include_once("includes/post_form.php") ?>
        <!-- End of post article -->

        <!-- Messages -->
        <div class="message_box">
          <div class="message_senders_info col-5">
            <!-- First_person -->
            <div class="friend_message">
              <div class="msi">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="msin">
                <p class=""><b>Dianna Ambia</b></p>
                <p class="message_brief">Here is your last message...</p><hr>
              </div>
            </div>
            <!-- End First_person -->
            <!-- Second_person -->
            <div class="friend_message">
              <div class="msi">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="msin">
                <p class=""><b>Dianna Ambia</b></p>
                <p class="message_brief">Here is your last message...</p><hr>
              </div>
            </div>
            <!-- End Second_person -->
            <!-- Third_person -->
            <div class="friend_message">
              <div class="msi">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="msin">
                <p class=""><b>Dianna Ambia</b></p>
                <p class="message_brief">Here is your last message...</p><hr>
              </div>
            </div>
            <!-- End Third_person -->
            <!-- Fourth_person -->
            <div class="friend_message">
              <div class="msi">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="msin">
                <p class=""><b>Dianna Ambia</b></p>
                <p class="message_brief">Here is your last message...</p><hr>
              </div>
            </div>
            <!-- End Fourth_person -->
            <!-- Fith_person -->
            <div class="friend_message">
              <div class="msi">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="msin">
                <p class=""><b>Dianna Ambia</b></p>
                <p class="message_brief">Here is your last message...</p><hr>
              </div>
            </div>
            <!-- End Fith_person -->
            <!-- Sixth_person -->
            <div class="friend_message">
              <div class="msi">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="msin">
                <p class=""><b>Dianna Ambia</b></p>
                <p class="message_brief">Here is your last message...</p><hr>
              </div>
            </div>
            <!-- End Sixth_person -->
            <!-- Seventh_person -->
            <div class="friend_message">
              <div class="msi">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="msin">
                <p class=""><b>Dianna Ambia</b></p>
                <p class="message_brief">Here is your last message...</p><hr>
              </div>
            </div>
            <!-- End Seventh_person -->
          </div>
          <div class="message_content col-7">
            <!-- Friends_full_message -->
            <div class="friends_full_message">
              <div class="conv_image">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="conv_message">
                <h6><b>Linda Cruiz</b></h6>
                <p>Bjr bro comment tu vas!</p>
              </div>
            </div>
            <!-- End Friends_full_message -->
            <!-- my_message -->
            <div class="my_message">
              <div class="conv_message">
                <h6><b>Linda Cruiz</b></h6>
                <p>Je vais bien, frère et toi? Tu n'est pas venus à l'école aujourd'hui pourquoi ?</p>
              </div>
              <div class="conv_image">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
            </div>
            <!-- End my_message -->
            <!-- my_message -->
            <div class="my_message">
              <div class="conv_message">
                <h6><b>Linda Cruiz</b></h6>
                <p>Mais sinon on a rien fait de gave</p>
              </div>
              <div class="conv_image">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
            </div>
            <!-- End my_message -->
            <!-- Friends_full_message -->
            <div class="friends_full_message">
              <div class="conv_image">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="conv_message">
                <h6><b>Linda Cruiz</b></h6>
                <p>Okay. Demain je serai la</p>
              </div>
            </div>
            <!-- End Friends_full_message -->
            <!-- my_message -->
            <div class="my_message">
              <div class="conv_message">
                <h6><b>Linda Cruiz</b></h6>
                <p>Viens avec ton ordinateur portable stp...</p>
              </div>
              <div class="conv_image">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
            </div>
            <!-- End my_message -->
            <!-- Friends_full_message -->
            <div class="friends_full_message">
              <div class="conv_image">
                <img style="width:40px;height:40px;" class="rounded-circle" src="images/profile/person.jpg" alt="">
              </div>
              <div class="conv_message">
                <h6><b>Linda Cruiz</b></h6>
                <p>Ma batterie a des petits soucis mais okay il y'a la lumière je vais apporter</p>
              </div>
            </div>
            <!-- End Friends_full_message -->
          </div>

          <!-- To send message -->
          <div class="col-7 send_message_form">
            <form action="" method="POST"><br>
              <div class="form-row">
                <div class="form-group col-md-10">
                  <input type="text" class="form-control" id="message" placeholder="Message...">
                </div>
                <div class="form-group col-md-1">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
          <!-- End send message -->

        </div>
        <!-- End Messages -->

      </div>
      <!-- End Messages display -->

      <!-- Friends suggest bloc(it woun't be displayed on small screens) -->
      <?php include_once("includes/sideMenu_right.php") ?>
      <!-- End of friends suggest bloc -->
    </div>
  </div>
</body>
</html>
