<?php

require("db_connection.php");

if (!empty($_POST)) {
  $id = checkInput($_POST["replyer_id"]);
  $rep_message = checkInput($_POST["replyer_message"]);
  $pub_id = checkInput($_POST["pub_id"]);

  $isSuccess = true;

  if (empty($rep_message)) {
    $isSuccess = false;
  }

  if ($isSuccess) {
    $db = Database::connect();
    $query = $db->prepare("INSERT INTO replies(id_publication, id_replyer, reply_message) VALUES (?, ?, ?)");
    $query -> execute(array($pub_id, $id, $rep_message));
    Database::disconnect();
  }

  header("Location: ../newsfeed.php");
}

function checkInput($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
