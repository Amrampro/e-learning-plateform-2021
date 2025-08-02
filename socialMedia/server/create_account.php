<?php

require("db_connection.php");

$fname = $lname = $uname = $dbirth = $country = $state = $gender = $ac_type = $email = $password = $password_verif = $school_level = $school_option = "";
$fname_error = $lname_error = $uname_error = $dbirth_error = $country_error = $state_error = $gender_error = $ac_type_error = $email_error = $password_error = $password_verif_error = $school_level_error = $school_option_error = $log_email_error = $log_password_error = "";
$passfinal = "";
$not_found_error = "";


// Inserting a new user into the database
if (isset($_POST["signUp"])) {

  $fname = $_POST["first_name"];
  $lname = $_POST["last_name"];
  $uname = $_POST["username"];
  $dbirth = $_POST["birth_date"];
  $country = $_POST["country"];
  $state = $_POST["state"];
  $gender = $_POST["gender"];
  $ac_type = $_POST["account_type"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password_verif = $_POST["password_redo"];
  $school_level = $_POST["school_level"];
  $school_option = $_POST["school_option"];

  $isFilled = true;
  $isSuccess = false;
  $allowEmail = false;

  // Verifying if fills are filled

  if (empty($fname)) {
    $fname_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  if (empty($lname)) {
    $lname_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  if (empty($uname)) {
    $uname_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  if (empty($dbirth)) {
    $dbirth_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  if (empty($country)) {
    $country_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  // elseif ($country!="Cameroon") {
  //   $country_error = '<p class="error_message">Do not modify the field country<p>';
  //   $isFilled = false;
  // }
  if (empty($state)) {
    $state_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  if (empty($email)) {
    $email_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  if (empty($password)) {
    $password_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  if (empty($password_verif)) {
    $password_verif_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }
  if (empty($school_option)) {
    $school_option_error = '<p class="error_message">This field should not be empty!<p>';
    $isFilled = false;
  }

  // Verifying if passwords are correct
  if ($isFilled) {
    if ($password != $password_verif) {
      $password_verif_error = '<p class="error_message">Passwords are not the same!<p>';
      $isSuccess = false;
    }else {
      $passfinal = password_hash($password, PASSWORD_DEFAULT);
      $isSuccess = true;
    }
  }

  // Verifying if email is already in the database
  if ($isSuccess) {
    $db = database::connect();
    $query = $db->query("SELECT * FROM users WHERE email LIKE '$email'");
    $found = $query -> fetchall(PDO::FETCH_ASSOC);
    if (is_array($found) && count($found)>0 ) {
      $email_error = '<p class="error_message">This Email already exists!<p>';
      $allowEmail = false;
    }else{
      $allowEmail = true;
    }
    database::disconnect();
  }

  // Inserting data in database
  if ($allowEmail) {
    $db = database::connect();
    $query = $db -> prepare("INSERT INTO users (first_name, last_name, username, email, password, country, state, gender, birth_date, school_level, school_option, account_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query -> execute(array($fname, $lname, $uname, $email, $passfinal, $country, $state, $gender, $dbirth, $school_level, $school_option, $ac_type));
    database::disconnect();
  }
}
// End of inserting a new user into the database


// Connecting into the user account
if (isset($_POST["login_but"])) {
  $email = $_POST["user_email"];
  $password = $_POST["user_password"];

  $isFilled = true;

  if (empty($email)) {
    $log_email_error = '<p class="error_message">Fill this field<p>';
    $isFilled = false;
  }
  if (empty($password)) {
    $log_password_error = '<p class="error_message">Fill this field<p>';
    $isFilled = false;
  }

  if ($isFilled) {
    $db = database::connect();
    $query = $db->query("SELECT * FROM users WHERE email LIKE '$email'");
    $found = $query -> fetchall(PDO::FETCH_ASSOC);
    if (is_array($found) && count($found)>0 ) {
      //Verification if hash password is the same
      $passwordInDb = $found[0]['password'];
      // var_dump($passwordInDb);
      if (password_verify($password, $passwordInDb)) {
        session_start();
        $_SESSION["id"] = $found[0]['id'];
        $_SESSION["username"] = $found[0]['last_name'];
        $_SESSION["isadmin"] = $found[0]['account_type'];
        $_SESSION["SmeetUpInfo"] = $found[0];
        header("Location: newsfeed.php");
      }else {
        $log_password_error = '<p class="error_message">Password Incorrect!<p>';
      }
    }else{
      $log_email_error = '<p class="error_message">Incorrect email<p>';
    }
    database::disconnect();
  }
}
// End of connecting into the user account
?>
