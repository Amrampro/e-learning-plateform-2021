<?php
session_start();
if (empty($_SESSION["id"])) {
  header("Location: 404notLogged.php");
}
 ?>
