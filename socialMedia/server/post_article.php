<?php
// $userId = $_SESSION["SmeetUpInfo"]["id"];
$userId = $_SESSION["id"];

$imageError = $picvidError = $fileError = $comment = $picvid = $file = $upload = $picture = $video = "";

if (!empty($_POST)) {
  $picvid = $_FILES['picvid']['name'];
  $comment = $_POST["comment"];
  $upload = $_POST["uploadToGallery"];
  $file = $_FILES["chose_file"]["name"];

  // if the uploaded file is an image
  $imagePath = 'images/posted/' . basename($picvid);
  $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);

  // if the uploaded file is a video
  $videoPath = 'videos/posted/' . basename($picvid);
  $videoExtension = pathinfo($videoPath, PATHINFO_EXTENSION);

  // for uploaded file
  $filePath = 'files/main/' . basename($file);
  $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

  $isSuccess = true;
  $isUploadSuccess = true;
  $isFileOk = false;

  if(!empty($file)){
    $isFileOk = true;

    if ($fileExtension != "pdf" && $fileExtension != "doc" && $fileExtension != "docx") {
      $fileError = "Take only files of type .pdf, .doc, .docx";
      $isFileOk = false;
    }
    if ($_FILES["chose_file"]["size"] > 5000000) {
      $fileError = "The file should not weigh more than 5Mb";
      $isFileOk = false;
    }
    if($isFileOk){
      // copy($_FILES["picvid"]["tmp_name"], $imagePath); //<-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
      if(!move_uploaded_file($_FILES["chose_file"]["tmp_name"], $filePath)){
        $fileError = "An error occured while uploading the file. Try again later";
        $isFileOk = false;
      }
    }
  }

  if (!empty($picvid)) {
    $isUploadSuccess = true;

    if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" && $imageExtension != "mp4") {
      $picvidError = "Take only files of type .jpg, png, jpeg, gif, mp4";
      $isUploadSuccess = false;
    } else {
      // If it is an image
      if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif") {
        // die("it is video");
        $video = $picvid;
        $picture = 0;

        $imagePath = $videoPath;
        if(file_exists($imagePath))
        {
          // $newImageName = $imageName.time().".".$ext;
          $imageError = "File already exists";
          $isUploadSuccess = false;
        }
        if($_FILES["picvid"]["size"] > 100000000)
        {
          $imageError = "The file musn't be more than 100Mb";
          $isUploadSuccess = false;
        }
        if($isUploadSuccess){
          // copy($_FILES["picvid"]["tmp_name"], $imagePath); <-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
          if(!move_uploaded_file($_FILES["picvid"]["tmp_name"], $imagePath)){
            $imageError = "An error occured while uploading the video. Try again later";
            $isUploadSuccess = false;
          }
        } // If it is a video
      } else if ($imageExtension != "mp4"){
        // die("it is image");
        $video = 0;
        $picture = $picvid;

        if(file_exists($imagePath))
        {
          $imageError = "File already exists";
          $isUploadSuccess = false;
        }
        if($_FILES["picvid"]["size"] > 10000000)
        {
          $imageError = "The file musn't be more than 10Mb";
          $isUploadSuccess = false;
        }
        if($isUploadSuccess){
          // copy($_FILES["picvid"]["tmp_name"], $imagePath); <-- Cette ligne va aussi copier le fichier. Il joue le même rôle que celle d'en bas
          if(!move_uploaded_file($_FILES["picvid"]["tmp_name"], $imagePath)){
            $imageError = "An error occured while uploading the image. Try again later";
            $isUploadSuccess = false;
          }
        }
      }
    }
  } else {
    $video = 0;
    $picture = 0;
    $isSuccess = false;
    $imageError = "You must insert either an image or a video";

  }

  if ($isFileOk) {
    if($isSuccess && $isUploadSuccess)
    {
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO publication (id_user,pub_commentary,picture,video,file) values(?, ?, ?, ?, ?)");
      $statement->execute(array($userId,$comment,$picture,$video,$file));
      Database::disconnect();
      header("location: newsfeed.php");
    }
  }else if($isSuccess && $isUploadSuccess){
    $db = Database::connect();
    $statement = $db->prepare("INSERT INTO publication (id_user,pub_commentary,picture,video) values(?, ?, ?, ?)");
    $statement->execute(array($userId,$comment,$picture,$video));
    Database::disconnect();
    header("location: newsfeed.php");
  }

}

function checkInput($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
