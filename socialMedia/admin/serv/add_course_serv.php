<?php 

require ("../../server/db_connection.php");

$connect = Database::connect();

  if (isset($_POST['sub'])) {

	$name = $_POST['name'];
	$description = $_POST['description'];
	$file = $_FILES['image']['name'];
	$teacher = $_POST['teacher'];
		
	$filePath = '../../online_courses/img/courses/' . basename($file);
    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

    $file = str_replace('.','-',basename($file, $fileExtension));
    $newfile = $file.time().".".$fileExtension;
    $newfilePath = '../../online_courses/img/courses/' . basename($file);
    
	$fileTmp = $_FILES["image"]["tmp_name"];
	
	$isFileOk = true;

    if($isFileOk){
      if(!move_uploaded_file($fileTmp, '../../online_courses/img/courses/' . $newfile)){
        $fileError = "An error occured while uploading the file. Try again later";
        $isFileOk = false;
      }
	}
	if($isFileOk){
		$statement = $connect->prepare("INSERT INTO courses(id_prof, name, description, image) values (?, ?, ?, ?)");
		$statement->execute(array($teacher,$name,$description,$newfile));
		Database::disconnect();
		header("location: ../index.php?page=courses");
	  }
      }
?>