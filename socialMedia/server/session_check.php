<?php

require("server/db_connection.php");

if (empty($_SESSION["id"])) {
  header("Location: index.php");
}else{
  $user_id = $_SESSION["id"];

  $db = Database::connect();
  $query = $db -> prepare("SELECT id, first_name, last_name, username, email, country, state, gender, birth_date, school_level, school_option, profile_image, background_image, suspended, account_type FROM users WHERE id = ?");
  $query -> execute(array($user_id));
  $found_user = $query -> fetch();
  Database::disconnect();
}
 ?>
