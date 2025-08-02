<?php

if (!empty($_SESSION["id"])) {
  $id_user = $_SESSION["id"];
}

$imageError = $fileError = $audioError = $videoError = $image = $image = $audio = $video = "";

// --------------------------------- For Videos --------------------------------------------
if (isset($_POST["post_video"])) {
  $video = $_FILES["video_file"]["name"];

  $videoPath = '../cloud_zone/videos/' . basename($video);
  $videoExtension = pathinfo($videoPath, PATHINFO_EXTENSION);

  $isFileOk = false;

  if(!empty($video)){
    $isFileOk = true;

    if ($videoExtension != "mp4") {
      $videoError = "Take only files of type .mp4";
      $isFileOk = false;
      echo '<script> alert("Error: Only files of type .mp4 accepted"); </script>';
    }
    if ($_FILES["video_file"]["size"] > 10000000) {
      $videoError = "The file should not weigh more than 10Mb";
      $isFileOk = false;
      echo '<script> alert("Error: The file should not weigh more than 10Mb"); </script>';
    }
    if(file_exists($videoPath))
    {
      $videoError = "File already exists";
      $isFileOk = false;
      echo '<script> alert("Error: File already exists"); </script>';
    }
   if($isFileOk){
     // copy($_FILES["video_file"]["tmp_name"], $videoPath); // <-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
     if(!move_uploaded_file($_FILES["video_file"]["tmp_name"], $videoPath)){
       $videoError = "An error occured while uploading the file. Try again later";
       $isFileOk = false;
      }
    }
  }
  if ($isFileOk) {
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO cloud (id_user,uploaded_file,file_type) values(?, ?, ?)");
      $statement->execute(array($id_user,$video,$videoExtension));
      Database::disconnect();
      // header("location: newsfeed.php");
  }
}
// --------------------------------- End For Videos --------------------------------------------

// --------------------------------- For Image --------------------------------------------
if (isset($_POST["post_image"])) {

  $image = $_FILES["image_file"]["name"];

  $imagePath = '../cloud_zone/images/' . basename($image);
  $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);

  $isFileOk = false;

  if(!empty($image)){
    $isFileOk = true;

    if ($imageExtension != "jpg" && $imageExtension != "png") {
      $imageError = "Take only files of type .jpg or .png";
      $isFileOk = false;
      echo '<script> alert("Error: Only files of type .jpg or .png accepted"); </script>';
    }
    if ($_FILES["image_file"]["size"] > 5000000) {
      $imageError = "The file should not weigh more than 5Mb";
      $isFileOk = false;
      echo '<script> alert("Error: The file should not weigh more than 5Mb"); </script>';
    }
    if(file_exists($imagePath))
    {
      $imageError = "File already exists";
      $isFileOk = false;
      echo '<script> alert("Error: File already exists"); </script>';
    }
   if($isFileOk){
     // copy($_FILES["image_file"]["tmp_name"], $imagePath); // <-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
     if(!move_uploaded_file($_FILES["image_file"]["tmp_name"], $imagePath)){
       $imageError = "An error occured while uploading the file. Try again later";
       $isFileOk = false;
       echo '<script> alert("Error: An error occured while uploading the file. Try again later"); </script>';
      }
    }
  }
  if ($isFileOk) {
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO cloud (id_user,uploaded_file,file_type) values(?, ?, ?)");
      $statement->execute(array($id_user,$image,$imageExtension));
      Database::disconnect();
      // header("location: newsfeed.php");
  }
}
// --------------------------------- End For Image --------------------------------------------

// --------------------------------- For Audio --------------------------------------------
if (isset($_POST["post_audio"])) {

  $audio = $_FILES["audio_file"]["name"];

  $audioPath = '../cloud_zone/audios/' . basename($audio);
  $audioExtension = pathinfo($audioPath, PATHINFO_EXTENSION);

  $isFileOk = false;

  if(!empty($audio)){
    $isFileOk = true;

    if ($audioExtension != "mp3" && $audioExtension != "ogg") {
      $audioError = "Take only files of type .mp3";
      echo '<script> alert("Error: Only files of type .mp3 accepted"); </script>';
      $isFileOk = false;
    }
    if ($_FILES["audio_file"]["size"] > 5000000) {
      $audioError = "The file should not weigh more than 5Mb";
      $isFileOk = false;
      echo '<script> alert("Error: The file should not weigh more than 5Mb"); </script>';
    }
    if(file_exists($audioPath))
    {
      $audioError = "File already exists";
      $isFileOk = false;
      echo '<script> alert("Error: File already exists"); </script>';
    }
   if($isFileOk){
     // copy($_FILES["image_file"]["tmp_name"], $audioPath); // <-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
     if(!move_uploaded_file($_FILES["audio_file"]["tmp_name"], $audioPath)){
       $audioError = "An error occured while uploading the file. Try again later";
       $isFileOk = false;
       echo '<script> alert("Error: An error occured while uploading the file. Try again later"); </script>';
      }
    }
  }
  if ($isFileOk) {
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO cloud (id_user,uploaded_file,file_type) values(?, ?, ?)");
      $statement->execute(array($id_user,$audio,$audioExtension));
      Database::disconnect();
      // header("location: newsfeed.php");
  }
}
// --------------------------------- End For Audio --------------------------------------------

// --------------------------------- For File --------------------------------------------
if (isset($_POST["post_file"])) {

  $file = $_FILES["file_file"]["name"];

  $filePath = '../cloud_zone/files/' . basename($file);
  $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

  $isFileOk = false;

  if(!empty($file)){
    $isFileOk = true;

    if ($fileExtension != "pdf") {
      $fileError = "Take only files of type .pdf";
      $isFileOk = false;
      echo '<script> alert("Error: Only files of type pdf accepted"); </script>';
    }
    if ($_FILES["file_file"]["size"] > 15000000) {
      $fileError = "The file should not weigh more than 15Mb";
      $isFileOk = false;
      echo '<script> alert("The file should not weigh more than 15Mb"); </script>';
    }
    if(file_exists($filePath))
    {
      $fileError = "File already exists";
      $isFileOk = false;
      echo '<script> alert("File already exists"); </script>';
    }
   if($isFileOk){
     // copy($_FILES["file_file"]["tmp_name"], $filePath); // <-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
     if(!move_uploaded_file($_FILES["file_file"]["tmp_name"], $filePath)){
       $fileError = "An error occured while uploading the file. Try again later";
       $isFileOk = false;
      echo '<script> alert("An error occured while uploading the file. Try again later"); </script>';
      }
    }
  }
  if ($isFileOk) {
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO cloud (id_user,uploaded_file,file_type) values(?, ?, ?)");
      $statement->execute(array($id_user,$file,$fileExtension));
      Database::disconnect();
      // header("location: newsfeed.php");
  }
}
// --------------------------------- End For File --------------------------------------------
 ?>