<?php
if (empty($_GET["course_id"])) {
    header("Location: ../../newsfeed.php");
} else {
    $cid = $_GET["course_id"];
}

	require '../../server/db_connection.php';

	$chapter_nameError = $descriptionError = $file_locationError = $ecrit_coursError = $video_fileError = $courseError = $chapter_name = $description = $file_location = $ecrit_cours = $video_file = $course = "";

	if(!empty($_POST))
	{
		$chapter_name = checkInput($_POST['chapter_name']);
		$description = checkInput($_POST['description']);
		$file_location = checkInput($_FILES['file_location']['name']);// Ici c est *_FILE* et non *_POST* par ce que c est une file_location
		$video_file = checkInput($_FILES['video_file']['name']);
		$ecrit_cours = checkInput($_POST['ecrit_cours']);
		$course = checkInput($_POST['course']);

        $file_locationPath = '../files/' . basename($file_location);
		$file_locationExtension = pathinfo($file_locationPath, PATHINFO_EXTENSION);

		$video_filePath = '../videos/' . basename($video_file);
		$video_fileExtension = pathinfo($video_filePath, PATHINFO_EXTENSION);

		$isSuccess = true;
		$isUploadSuccess = false;

		if(empty($chapter_name))
		{
			$chapter_nameError = 'Ce champ ne peut pas etre vide';
			$isSuccess = false;
		}
		if(empty($description))
		{
			$descriptionError = 'Ce champ ne peut pas etre vide';
			$isSuccess = false;
		}
		if(empty($ecrit_cours)){
			$ecrit_coursError = 'Ce champ ne peut pas etre vide';
			$isSuccess = false;
		}
		if(empty($video_file))
		{
			// $video_fileError = 'Ce champ ne peut pas etre vide';
            // $isSuccess = false;
            $video_file = null;
		}else{
		$isUploadSuccess = true;

		if($video_fileExtension != "mp3")
		{
			$video_fileError = "Les fichiers autorisés sont uniquement des .mp3";
			$isUploadSuccess = false;
		}
		if(file_exists($video_filePath))
		{
			$video_fileError = "Le fichier existe déjà";
			$isUploadSuccess = false;
		}
		if($_FILES["video_file"]["size"] > 100000000)
		{
			$video_fileError = "Le fichier ne doit pas depasser les 100MB";
			$isUploadSuccess = false;
		}
		if($isUploadSuccess){
			if(!move_uploaded_file($_FILES["video_file"]["tmp_name"], $video_filePath)){
				$video_fileError = "Une erreur s'est produit lors du téléchargement";
			$isUploadSuccess = false;
		}
	}
	}
		if(empty($course))
		{
			$courseError = 'Ce champ ne peut pas etre vide';
			$isSuccess = false;
		}
		if(empty($file_location))
		{
			// $file_locationError = 'Ce champ ne peut pas etre vide';
            // $isSuccess = false;
            $file_location = null;
		}else{
		$isUploadSuccess = true;

		if($file_locationExtension != "pdf")
		{
			$file_locationError = "Les fichiers autorisés sont uniquement des .pdf";
			$isUploadSuccess = false;
		}
		if(file_exists($file_locationPath))
		{
			$file_locationError = "Le fichier existe déjà";
			$isUploadSuccess = false;
		}
		if($_FILES["file_location"]["size"] > 10000000)
		{
			$file_locationError = "Le fichier ne doit pas depasser les 10MB";
			$isUploadSuccess = false;
		}
		if($isUploadSuccess){
			if(!move_uploaded_file($_FILES["file_location"]["tmp_name"], $file_locationPath)){
				$file_locationError = "Une erreur s'est produit lors du téléchargement";
			$isUploadSuccess = false;
		}
	}
	}

	if($isSuccess && $isUploadSuccess)
	{
		$db = Database::connect();
		$statement = $db->prepare("INSERT INTO chapters (name,description,file_location,full_course,video_file,course) values(?, ?, ?, ?, ?, ?)");
		$statement->execute(array($chapter_name,$description,$file_location,$ecrit_cours,$video_file,$course));
		Database::disconnect();
		header("location: index.php");
	}

	}

	function checkInput($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link href="../img/logo/logo.png" rel="shortcut icon"/>
	<meta charset="utf-8">
	<meta chapter_name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../fontawesome5/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../admin/vendor/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../../admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="../../admin/vendor/jquery-ui-themes-1.12.1/themes/flick/jquery-ui.min.css">
    <link rel="stylesheet" href="../../admin/jQuery/jquery-te-1.4.0.css">
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Add chapter</title>
    <style>
        body{
            background-color: rgba(124, 124, 124, .1);
        }
        form{
            background-color: #fff;
            padding: 35px;
            border-radius: 5px;
            box-shadow: 0px 0px 20px #000;
        }
    </style>
</head>
<body>
	<h1 class="text-logo" style="text-align: center;"> Course management </h1>
	<div class="container">
		<div class="row">
				<br>
				<form class="form col-md-12" role="form" action="add_course.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="chapter_name">Chapter name: </label>
						<input type="text" class="form-control" id="chapter_name" name="chapter_name" placeholder="Nom" value="<?php echo $chapter_name; ?>">
						<span class="help-inline"><?php echo $chapter_nameError; ?></span>
					</div>
					<div class="form-group">
						<label for="description">Description: </label>
						<input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
						<span class="help-inline"><?php echo $descriptionError; ?></span>
					</div>
                    <div class="form-group">
                        <input type="hidden" name="course" value="<?= $cid ?>">
					</div>
					<div class="form-group">
						<label for="file_location"> Select a pdf file for this chapter </label>
						<input type="file" id="file_location" name="file_location">
						<span class="help-inline"><?php echo $file_locationError; ?></span>
					</div>
					<div class="form-group">
						<label for="video_file"> Select a video file for this chapter </label>
						<input type="file" id="video_file" name="video_file">
						<span class="help-inline"><?php echo $video_fileError; ?></span>
					</div>
					<div class="form-group">
						<label for="course"> Write your full course </label>
						<textarea rows="10" type="text" class="form-control" id="ecrit_cours" name="ecrit_cours" placeholder="Insert your text here..."></textarea>
						<span class="help-inline"><?php echo $ecrit_coursError; ?></span>
					</div>
				<br>
				<div class="form-action">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Add chapter</button>
				</div>
				</form>
		</div>
	</div>

</body>
</html>
