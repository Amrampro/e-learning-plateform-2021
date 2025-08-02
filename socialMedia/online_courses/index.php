<?php
// include "includes/sessionStarter.php";
// include "serv/testBanned.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Course section</title>
	<meta charset='UTF-8'>
	<meta name='description' content='E-Learning'>
	<meta name='keywords' content='education, afrisante'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- Favicon -->
	<link rel='icon' href='../images/logo/Laptop-computer.png'>

	<!-- Google Fonts -->
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i'>

	<!-- Stylesheets -->
	<link rel='stylesheet' href='css/bootstrap.min.css'/>
	<link rel='stylesheet' href='css/font-awesome.min.css'/>
	<link rel='stylesheet' href='css/owl.carousel.css'/>
	<link rel='stylesheet' href='css/style.css'/>
	<link rel="stylesheet" href="css/courseStatus.css">

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="head_side">
				<h2>Available courses</h2>
				<p>Select an online cours and start following its chapters online</p>
			</div>
		</div>
	</div>

	<!-- course section -->
	<section class="categories-section spad">
		<div class="container">
			<div class="row">
				<?php
				require '../server/db_connection.php';
				$db = Database::connect();
				$statement = $db->query('SELECT courses.id, courses.id_prof,  courses.name, courses.description, courses.image FROM courses');
				while($item = $statement->fetch()){
					?>
					<div class='col-lg-4 col-md-6'>
						<div class='categorie-item'>
							<div class="ci-thumb set-bg" data-setbg="img/courses/<?= $item['image'] ?>"></div>
							<div class='ci-text'>
								<h5><?= $item['name'] ?></h5>
								<p><?= $item['description'] ?></p>
								<!-- <span>120 Etudiants</span> -->
								<a class="btn btn-success" href="follow_course/index.php?course_id=<?= $item['id'] ?>"><i class=""></i> Read course</a>
								<!-- <br><br><center> $status </center> -->
							</div>
						</div>
					</div>
					<?php
				}
				Database::disconnect();
				?>

			</div>

		</section>


		<!-- footer section -->
		<?php //include "includes/footer.php" ?>
		<!-- footer section end -->


		<!--====== Javascripts & Jquery ======-->
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/mixitup.min.js"></script>
		<script src="js/circle-progress.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/main.js"></script>
	</body>
	</html>
