<?php
	require '../server/db_connection.php';
	include "serv/is_connected.php";

	$nameError = $passwordError = $emailError = $courseError = $phone_numberError = $name = $password = $email = $course = $phone_number = "";

	if(!empty($_POST))
	{
		$first_name = checkInput($_POST['name']);
		$last_name = checkInput($_POST['name']);
		$password = checkInput($_POST['password']);
		$email = checkInput($_POST['email']);
		$phone_number  = checkInput($_POST['phone_number']);

    $isSuccess = true;

		if(empty($name))
		{
			$nameError = 'Ce champ ne peut pas etre vide';
			$isSuccess = false;
		}
		if(empty($password))
		{
			$passwordError = 'Ce champ ne peut pas etre vide';
			$isSuccess = false;
		}
		if(empty($email)){
			$emailError = 'Ce champ ne peut pas etre vide';
			$isSuccess = false;
		}
		if(empty($phone_number))
		{
      $phone_numberError = 'Ce champ ne peut pas etre vide';
			$isSuccess = false;
	  }

	if($isSuccess)
	{
		$db = Database::connect();
		if($isFileUpdated){
		$statement = $db->prepare("UPDATE admin SET username = ?, password = ?, email = ?, admin.number = ? WHERE id = 1");
		$statement->execute(array($name,$password,$email,$phone_number));
		}
		else
		{
      $statement = $db->prepare("UPDATE admin SET username = ?, password = ?, email = ?, admin.number = ? WHERE id = 1");
  		$statement->execute(array($name,$password,$email,$phone_number));
		}
		Database::disconnect();
		header("location: logout.php");
	}

	}
  else
	{
		$db = Database::connect();
		$statement = $db->prepare("SELECT * FROM admin WHERE id = 1");
		$statement->execute(array());
		$item = $statement->fetch();
		$name = $item['username'];
		$password = $item['password'];
		$email = $item['email'];
		$phone_number = $item['number'];

		Database::disconnect();
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
	<title>Mettre Mes Infos A Jour | ASG</title>
	<link href="../img/logo/logo.png" rel="shortcut icon"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<h1 class="text-logo"> Gestion Admin </h1>
	<div class="container admin">
		<div class="row">

			<h2><strong>Mettre A Jour </strong></h2>
				<br>
				<form class="form" role="form" action=" <?php echo 'updateMyInformations.php'; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Nom : </label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
						<span class="help-inline"><?php echo $nameError; ?></span>
					</div>
					<div class="form-group">
						<label for="password">Mot de Passe: </label>
						<input type="text" class="form-control" id="password" name="password" placeholder="password" value="<?php echo $password; ?>">
						<span class="help-inline"><?php echo $passwordError; ?></span>
					</div>
          <div class="form-group">
						<label for="name">Email : </label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
						<span class="help-inline"><?php echo $emailError; ?></span>
					</div>
          <div class="form-group">
						<label for="name">Numéro de Téléphone : </label>
						<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Numéro de Téléphone" value="<?php echo $phone_number; ?>">
						<span class="help-inline"><?php echo $phone_numberError; ?></span>
					</div>
				<br>
				<div class="form-action">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
					<a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
				</div>
				</form>
		</div>
	</div>

</body>
</html>
