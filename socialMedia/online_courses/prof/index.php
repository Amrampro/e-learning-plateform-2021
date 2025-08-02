<?php 
    session_start();
    if ($_SESSION["isadmin"] != "Teacher") {
        header("Location: ../../newsfeed.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Course</title>
</head>
<style>
    .hee{
        background: url("../img/courses_bg.jpg");
        height: 300px;
    }
    .imm{
        width: 100%;
        height: 250px;
        overflow: hidden;
    }
    .spad{
        margin-top: 3%;
    }
</style>
<body>
    <div class="container-fluid">
       <div class="row">
        <div class="col-md-12 hee">
            
        </div>
       </div>
    </div>

	<!-- course section -->
	<section class="spad">
		<div class="container">
			<div class="row">
				<?php
				require '../../server/db_connection.php';
				$db = Database::connect();
				$statement = $db->query('SELECT courses.id, courses.id_prof,  courses.name, courses.description, courses.image FROM courses WHERE id_prof='.$_SESSION["id"]);
				while($item = $statement->fetch()){
					?>
					<div class='col-lg-4 col-md-6'>
						<div class='categorie-item'>
							<div class="imm">
                                <img src="../img/courses/<?= $item['image'] ?>" alt="" width="100%" height="auto">
                            </div>
							<div class='ci-text'>
								<h5><?= $item['name'] ?></h5>
								<p><?= $item['description'] ?></p>
								<!-- <span>120 Etudiants</span> -->
								<a class="btn btn-success" href="chapters.php?course_id=<?= $item['id'] ?>"><i class=""></i> More details</a>
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


    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>