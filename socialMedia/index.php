<?php

include("server/session_starter.php");
include("server/create_account.php");

if (!empty($_SESSION["id"])) {
  header("Location: newsfeed.php");
}

?>
<!doctype html>
<html lang="en-us">
<head>
  <!-- Including main head informations -->
  <?php include_once("includes/headEssential.php"); ?>
  <!-- End of including main head informations -->

  <link rel="stylesheet" href="css/style.css">
  <title>Login|Register</title>
</head>
<body>
  <!-- Navbar section -->
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
      <a class="navbar-brand" href="#"><img class="navLogo" src="images/logo/Laptop-computer.png" alt=""><strong>SMeetUp</strong></a>
    </nav>
  </div>
  <!-- End of navbar section -->

  <!-- Login section -->
  <div class="container logContainer">
    <div class="row">
      <div class="col-md-6 leftIndexSide">
        <h1>Make Cool Friends!!! </h1>
        <p>
          <video id="index_video" class="col-12" src="videos/index.mp4" autoplay controls></video>
        </p>
        <p id="write">SMeetUp is a friend finder that can be used to connect students all over the world.
          Here you will find the solution to your problem in any domain concerning the school. We have a community
          made up of different variation of education domains.</p>
          <p>What are you waiting for? Join us right now.</p>
          <a href="#">Join Now</a>
        </div>
        <div class="col-md-6 rightIndexSide">
          <form class="form col-md-9" action="" method="post">
            <div id="top">
              <a id="butLog" onclick="login()" href="#">Login</a>
              <a id="butReg" onclick="register()" href="#">Register</a>
            </div>
            <hr>
            <div id="login">
              <h2>login</h2>
              <div class="form-group">
                <p>log into your account</p>
              </div>
              <div class="form-group">
                <label for="name">Email</label>
                <input type="email" id="email" name="user_email" value="" placeholder="email" class="form-control">
                <?php echo $log_email_error ?>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="user_password" value="" placeholder="password" class="form-control">
                <?php echo $log_password_error ?>
              </div>
              <div class="form-group">
                <a href="#">Forgot Password?</a>
              </div>
              <div class="form-group">
                <button type="submit" name="login_but" class="btn btn-default">Login Now</button>
              </div>
              <div class="form-group">
                <h5 class="error_message"><?php echo $not_found_error ?></h5>
              </div>
            </div>
            <div id="register" style="display:none;">
              <h2>Register</h2>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input class="form-control" type="text" name="first_name" value="<?php echo $fname ?>" placeholder="First name">
                  <?php echo $fname_error ?>
                </div>
                <div class="form-group col-md-6">
                  <input class="form-control" type="text" name="last_name" value="<?php echo $lname ?>" placeholder="Last name">
                  <?php echo $lname_error ?>
                </div>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="username" value="<?php echo $uname ?>" placeholder="Username">
                <?php echo $uname_error ?>
              </div>
              <div class="form-group">
                <label>Date of birth</label>
                <input class="form-control" type="date" name="birth_date" value="<?php echo $dbirth ?>" placeholder="Birth">
                <?php echo $dbirth_error ?>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input class="form-control static_field" type="text" name="country" value="Cameroon" placeholder="Country">
                  <?php echo $country_error ?>
                </div>
                <div class="form-group col-md-6">
                  <input class="form-control" type="text" name="state" value="<?php echo $state ?>" placeholder="State">
                  <?php echo $state_error ?>
                </div>
              </div>
              <div class="form-row">
                <!-- <div class="form-group col-md-6">
                <label>Phone</label>
                <input class="form-control" type="number" name="" value="" placeholder="Phone">
              </div> -->
              <div class="form-group col-md-6">
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option value="m">Male</option>
                  <option value="f">Female</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Account type</label>
                <select class="form-control" name="account_type">
                  <option value="Student">Student</option>
                  <option value="Teacher">Teacher</option>
                </select>
              </div>
            </div>
            <!-- Phone option will be invalid for the moment -->
            <!-- <div class="form-group col-md-3">
            <select class="" name="">
            <option value="">+237</option>
            <option value="">+233</option>
            <option value="">+1</option>
          </select>
        </div>
        <div class="form-group col-md-6">
        <input class="form-control" type="number" name="" value="" placeholder="Mobile number">
      </div> -->
      <div class="form-group">
        <input class="form-control" type="email" name="email" value="<?php echo $email ?>" placeholder="Email adress">
        <?php echo $email_error ?>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input class="form-control" type="password" name="password" value="<?php echo $password?>" placeholder="Password">
          <?php echo $password_error ?>
        </div>
        <div class="form-group col-md-6">
          <input class="form-control" type="password" name="password_redo" value="" placeholder="Redo password">
          <?php echo $password_verif_error ?>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>School level</label>
          <select class="form-control" name="school_level">
            <option value="Doctorate +">Doctorate +</option>
            <option value="Doctorate">Doctorate</option>
            <option value="Master 2">Master 2</option>
            <option value="Master 1">Master 1</option>
            <option value="GCE A-Level">GCE A-Level</option>
            <option value="GCE O-Level">GCE O-Level</option>
            <option value="Lower">Lower</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Option</label>
          <input class="form-control" type="text" name="school_option" value="<?php echo $school_option ?>" placeholder="Option">
          <?php echo $school_option_error ?>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" name="signUp" class="btn btn-default">SignUp</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>



<script type="text/javascript">
function login() {
  // To change div to login div
  var x = document.getElementById("login");
  var y = document.getElementById("register");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  }
  //changing colours of buttons
  var butL = document.getElementById("butLog");
  var butR = document.getElementById("butReg");
  butL.style.background="#197095";
  butR.style.background="#27AAE1";
}
/**/
function register() {
  // To change div to register div
  var x = document.getElementById("login");
  var y = document.getElementById("register");
  if (y.style.display === "none") {
    y.style.display = "block";
    x.style.display = "none";
  }
  //changing colours of buttons
  var butL = document.getElementById("butLog");
  var butR = document.getElementById("butReg");
  butL.style.background="#27AAE1";
  butR.style.background="#197095";
}
</script>
<!-- Typewritter -->
<script src="typewritter/core.js" charset="utf-8"></script>
<script type="text/javascript">
var el = document.getElementById("write");
var data = new Typewriter(el,{

}).typeString("Hello! welcome to <span style='color:#27AAE1'>SmeetUp</span>").pauseFor(1000).deleteChars(50).typeString("SMeetUp is a friend finder that can be used to connect students all over the world. ").pauseFor(1000).typeString("Here you will find the solution to your problem in any domain concerning the school. ").pauseFor(1000).typeString("We have a community made up of different variation of education domains.").start();
</script>

</body>
</html>
