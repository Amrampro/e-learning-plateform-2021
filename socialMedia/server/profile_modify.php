<?php 

require "db_connection.php";

  // Profile image
  if (isset($_POST["front"])) {
    $file = $_FILES["fimage"]["name"];
    $idd = $_POST["id"];
    // if no image is gotten
    if ($file == null || $file == "") {
      header("location: ../timeline.php?id=$idd");
    }
    // if the uploaded file is an image
    // var_dump(''.$file);
    // die('');

    $filePath = '../images/profile/' . basename($file);
    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

    $file = str_replace('.','-',basename($file, $fileExtension));
    $newfile = $file.time().".".$fileExtension;
    $newfilePath = '../images/profile/' . basename($file);
    
    $fileTmp = $_FILES["fimage"]["tmp_name"];
    // var_dump(''.$newfile);
    // die('');
  

    $isFileOk = true;

    if($isFileOk){
      // die(''.$newfile);
      // move_uploaded_file($fileTmp, '../images/profile/' . $newfile);
      // copy($_FILES["fimage"]["tmp_name"], $filePath); //<-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
      if(!move_uploaded_file($fileTmp, '../images/profile/' . $newfile)){
        $fileError = "An error occured while uploading the file. Try again later";
        $isFileOk = false;
      }
      // die("Entered");
    }

    if($isFileOk){
      $db = Database::connect();
      $statement = $db->prepare("UPDATE users set profile_image = ? WHERE id = ?");
      $statement->execute(array($newfile,$idd));
      Database::disconnect();
      header("location: ../timeline.php?id=$idd");
    }

  }

  // Cover image

  if (isset($_POST["back"])) {
    $file = $_FILES["bimage"]["name"];
    $idd = $_POST["id"];
    // if no image is gotten
    if ($file == null || $file == "") {
      header("location: ../timeline.php?id=$idd");
    }
    // if the uploaded file is an image
    // var_dump(''.$file);
    // die('');

    $filePath = '../images/profile/cover/' . basename($file);
    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

    $file = str_replace('.','-',basename($file, $fileExtension));
    $newfile = $file.time().".".$fileExtension;
    $newfilePath = '../images/profile/cover/' . basename($file);
    
    $fileTmp = $_FILES["bimage"]["tmp_name"];
    // var_dump(''.$newfile);
    // die('');
  

    $isFileOk = true;

    if($isFileOk){
      // die(''.$newfile);
      // move_uploaded_file($fileTmp, '../images/profile/' . $newfile);
      // copy($_FILES["fimage"]["tmp_name"], $filePath); //<-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
      if(!move_uploaded_file($fileTmp, '../images/profile/cover/' . $newfile)){
        $fileError = "An error occured while uploading the file. Try again later";
        $isFileOk = false;
      }
      // die("Entered");
    }

    if($isFileOk){
      $db = Database::connect();
      $statement = $db->prepare("UPDATE users set background_image = ? WHERE id = ?");
      $statement->execute(array($newfile,$idd));
      Database::disconnect();
      header("location: ../timeline.php?id=$idd");
    }

  }
?>