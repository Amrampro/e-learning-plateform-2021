<?php

if (!empty($_SESSION["id"])) {
  $id_user = $_SESSION["id"];
}

$imageError = $fileError = $audioError = $videoError = $image = $image = $audio = $video = "";

// --------------------------------- For Videos --------------------------------------------
if (isset($_POST["post_video"])) {
  $image = $_FILES["image_file"]["name"];

  $imagePath = '../cloud_zone/videos/' . basename($image);
  $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);

  $isFileOk = false;

  if(!empty($image)){
    $isFileOk = true;

    if ($imageExtension != "jpg" || $imageExtension != "png") {
      $imageError = "Take only files of type .jpg or .png";
      $isFileOk = false;
    }
    if ($_FILES["video_file"]["size"] > 5000000) {
      $imageError = "The file should not weigh more than 5Mb";
      $isFileOk = false;
    }
    if(file_exists($imagePath))
    {
      $imageError = "File already exists";
      $isFileOk = false;
    }
   if($isFileOk){
     // copy($_FILES["video_file"]["tmp_name"], $imagePath); // <-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
     if(!move_uploaded_file($_FILES["video_file"]["tmp_name"], $imagePath)){
       $imageError = "An error occured while uploading the file. Try again later";
       $isFileOk = false;
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
// --------------------------------- End For Videos --------------------------------------------
 ?>
