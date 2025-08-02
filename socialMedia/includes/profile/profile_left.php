<div class="col-md-3 col-lg-3">

  <?php include_once("profile_owner_name.php") ?>

  <!-- This will ONLY BE DISPLAYED ON PC -->

  <div class="d-none d-md-block d-lg-block">
    <div class="left_side_menu d-md-block d-lg-block">
      <li class="active" id="basic_informations_but" onclick="basic()"><i class="fas fa-info-circle"></i> <span class="d-none d-md-inline-block">Basic Information</span></li>
      <li id="education_and_work_but" onclick="education()"><i class="fas fa-university"></i> <span class="d-none d-md-inline-block">Education and work</span></li>
      <li id="my_interests_but" onclick="interests()"><i class="far fa-heart"></i> <span class="d-none d-md-inline-block">My Interests</span></li>
      <li id="account_settings_but" onclick="account()"><i class="fas fa-sliders-h"></i> <span class="d-none d-md-inline-block">Account Settings</span></li>
      <li id="change_password_but" onclick="passwordC()"><i class="fas fa-lock"></i> <span class="d-none d-md-inline-block">Change Password</span></li>
    </div>
  </div>

  <!-- This will ONLY BE DISPLAYED ON PHONE -->

  <div class="left_side_menu phone_profile_left d-md-none d-lg-none">
    <li class="pActive" id="basic_informations_but" onclick="basic()"><i class="fas fa-info-circle"></i> <span class="d-none d-md-inline-block">Basic Information</span></li>
    <li id="education_and_work_but" onclick="education()"><i class="fas fa-university"></i> <span class="d-none d-md-inline-block">Education and work</span></li>
    <li id="my_interests_but" onclick="interests()"><i class="far fa-heart"></i> <span class="d-none d-md-inline-block">My Interests</span></li>
    <li id="account_settings_but" onclick="account()"><i class="fas fa-sliders-h"></i> <span class="d-none d-md-inline-block">Account Settings</span></li>
    <li id="change_password_but" onclick="passwordC()"><i class="fas fa-lock"></i> <span class="d-none d-md-inline-block">Change Password</span></li>
  </div>

</div>
