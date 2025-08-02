<?php

  if(!isset($_SESSION)) session_start();
  require 'db_connection.php';
  $conn = Database::connect();
  // code traitement
  #je recupre mes variables
  $id_pub = (int) $_GET['id_pub'];
  $id_user = (int) $_SESSION['id'];
  $type = $_GET['type'];

  if($type!="like"){
    $conn->exec("delete from likes where id_user = $id_user and id_pub = $id_pub ");
  }else{
    $conn->exec("insert into likes set id_pub = $id_pub ,  id_user = $id_user ");
  }
  $select = $conn->query("select count(id) as nb from likes where id_pub = $id_pub ");
  $res = $select->fetch();
  $res = $res['nb'];
  echo $res;


  // fin du code
  $conn  = null;
 ?>
