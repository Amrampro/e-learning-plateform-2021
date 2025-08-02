<!DOCTYPE html>
<html>
<head>
	<title>Ajouter Un Article | ASG</title>
	<link href="../img/logo/logo.png" rel="shortcut icon"/>
	<meta charset="utf-8">
	<meta chapter_name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<h1 class="text-logo"> Course management </h1>
	<div class="container admin">
		<div class="row">

			<!-- <h2><strong>Ajouter </strong></h2> -->
				<br>
				<form class="form" role="form" action="serv/add_course_serv.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="chapter_name">Course name: </label>
						<input type="text" class="form-control" id="chapter_name" name="name" placeholder="Name" required>
						<span class="help-inline"></span>
					</div>
					<div class="form-group">
						<label for="description">Description: </label>
						<input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
					</div>
					<div class="form-group">
						<label for="file_location"> Upload image: </label>
						<input type="file" id="file_location" name="image">
					</div>
					<div class="form-group">
						<label for="questions">Select Teacher :</label>
							<select name="teacher">
							<?php
                              $db = Database::connect();
                              $query = $db -> query("SELECT * FROM users WHERE account_type='Teacher'");
                              while($trouve = $query -> fetch()){
                                $pName = $trouve['first_name'] . ' ' . $trouve['last_name'];
                                $pId = $trouve["id"];
							?>
								<option value="<?= $pId ?>"><?= $pName ?></option>
							<?php 
							  }
							  $db = null;
							?>
							</select>
					</div>
				<br>
				<div class="form-action">
					<button type="submit" class="btn btn-success" name="sub"><span class="glyphicon glyphicon-pencil"></span> Add course</button>
				</div>
				</form>
		</div>
	</div>

</body>
</html>
