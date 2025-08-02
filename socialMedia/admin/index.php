<?php
require ("../server/db_connection.php");
    session_start();

    // if ($_SESSION["isadmin"] == "Student") {
    //     header("Location: ../newsfeed.php");
    // } else if ($_SESSION["isadmin"] == "Teacher"){
    //     header("Location: ../online_courses/prof/index.php");
    // }

    if ($_SESSION["isadmin"] != "admin") {
        if ($_SESSION["isadmin"] == "Teacher"){
            header("Location: ../online_courses/prof/index.php");
        } else {
            header("Location: ../newsfeed.php");
        }
    }

	if($_SESSION["id"]) {
        // Delete course
		if(!empty($_GET["id_supc"])){
			$id_sup = $_GET["id_supc"];
			$con = Database::connect();
			$query = $con -> query("DELETE FROM courses WHERE id = '$id_sup'");
			$query -> execute();
			$con = null;
			header("Location: index.php?page=courses");
		}
        
        // Delete a user
		if(!empty($_GET["id_sup"])){
			$id_sup = $_GET["id_sup"];
			$con = Database::connect();
			$query = $con -> query("DELETE FROM users WHERE id = '$id_sup'");
			$query -> execute();
			$con = null;
			header("Location: index.php");
		}
        // Suspend a user
		if(!empty($_GET["id_sus"])){
			$id_sus = $_GET["id_sus"];
			$con = Database::connect();
			$query = $con -> prepare("UPDATE users SET suspended = ? WHERE id = ?");
			$query -> execute(Array(1, $id_sus));
			$con = null;
			header("Location: index.php");
		}else if(!empty($_GET["id_re_sus"])){
            $id_sus = $_GET["id_re_sus"];
			$con = Database::connect();
			$query = $con -> prepare("UPDATE users SET suspended = ? WHERE id = ?");
			$query -> execute(Array(0, $id_sus));
			$con = null;
			header("Location: index.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pannel D'administration</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome5/css/all.css">
	<link rel="stylesheet" type="text/css" href="vendor/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/jquery-ui-themes-1.12.1/themes/flick/jquery-ui.min.css">
    <link rel="stylesheet" href="jQuery/jquery-te-1.4.0.css">
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!-- <nav class="navbar bg-info text-white fixed-top p-2" style="justify-content: space-between;">
        <div class="nav-brand" style="min-width: 20%; justify-content: space-between; display: flex;">
            <div>
                <i class="fa fa-circle-notch" style="margin-right: 5px;"></i>
                <span>Envol</span>
            </div>
            <div class="d-flex">
                <button class="btn btn-sm text-light btnSideBar"><i class="fa fa-list"></i></button>
            </div>
        </div>
        <div>
            <button class="btn btn-sm text-light"><i class="fa fa-user-alt"></i></button>
            <button class="btn btn-sm text-light"><i class="fa fa-bell"></i></button>
        </div>
    </nav> -->
    <!-- <br><br> -->
    <div class="container-fuild contenu row">
        <div class="sidebar bg-dark col-md-2 col-sm-12 text-white pt-2">
            <div class="text-center p-4">
                <img src="../images/admin/R.png" width="80px" height="80px" alt="admin" style="border-radius: 100px;">
            </div>
            <div id="accordion">
                <div class="card ml-1 mb-2" style="background-color: rgba(255, 255, 255, 0.05);">
                  <div class="card-header border-0 p-1 pl-2 pr-2" style="background-color: rgba(255, 255, 255, 0.05); border-radius: 0;">
                    <a class="card-link justify-content-between d-flex text-white" href="index.php?page=default">
                      <span>
                          <i class="fa fa-home mr-1"></i>
                          <span>Home</span>
                      </span>
                    </a>
                  </div>
                </div>
                <div class="card ml-1 mb-2" style="background-color: rgba(255, 255, 255, 0.05);">
                  <div class="card-header border-0 p-1 pl-2 pr-2" style="background-color: rgba(255, 255, 255, 0.05); border-radius: 0;">
                    <a class="card-link justify-content-between d-flex text-white" href="index.php?page=students">
                      <span>
                          <i class="fa fa-user-alt mr-1"></i>
                          <span>Students</span>
                      </span>
                    </a>
                  </div>
                </div>
                <div class="card ml-1 mb-2" style="background-color: rgba(255, 255, 255, 0.05);">
                  <div class="card-header border-0 p-1 pl-2 pr-2" style="background-color: rgba(255, 255, 255, 0.05); border-radius: 0;">
                    <a class="card-link justify-content-between d-flex text-white" href="index.php?page=trainers">
                      <span>
                          <i class="fa fa-briefcase mr-1"></i>
                          <span>Trainers</span>
                      </span>
                    </a>
                  </div>
                </div>
                <div class="card ml-1 mb-2" style="background-color: rgba(255, 255, 255, 0.05);">
                  <div class="card-header border-0 p-1 pl-2 pr-2" style="background-color: rgba(255, 255, 255, 0.05); border-radius: 0;">
                    <a class="card-link justify-content-between d-flex text-white" href="index.php?page=courses">
                      <span>
                          <i class="fa fa-hourglass-half mr-1"></i>
                          <span>Courses</span>
                      </span>
                    </a>
                  </div>
                </div>
                <div class="card ml-1 mb-2" style="background-color: rgba(255, 255, 255, 0.05);">
                  <div class="card-header border-0 p-1 pl-2 pr-2" style="background-color: rgba(255, 255, 255, 0.05); border-radius: 0;">
                        <a class="card-link justify-content-between d-flex text-white" data-toggle="collapse" href="#collapse2">
                            <span>
                                <i class="fa fa-edit mr-1"></i>
                                <span>My informations</span>
                            </span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                  </div>
                  <div id="collapse2" class="collapse p-1" data-parent="#accordion">
                        <div class="card-body p-1 pl-1 pr-1" style="border-top: 1px solid white;">
                            <ul class="list-group" >
                                <li class="list-group-item bg-transparent border-0 p-0 mb-1 pl-1" style="border-radius: 0;">
                                    <a href="#" class="card-link text-white p-0 m-0">
                                       <i class="fa fa-plus mr-1"></i>
                                        <span>Ajouter Prestataire</span>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-1 pl-1" style="border-radius: 0;">
                                    <a href="#" class="card-link text-white p-0 m-0">
                                        <i class="fa fa-plus mr-1"></i>
                                        <span>Liste des Prestataires</span>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-1 pl-1" style="border-radius: 0;">
                                    <a href="#" class="card-link text-white p-0 m-0">
                                        <i class="fa fa-plus mr-1"></i>
                                        <span>Envoyer des Mails</span>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-1 pl-1" style="border-radius: 0;">
                                    <a href="#" class="card-link text-white p-0 m-0">
                                        <i class="fa fa-envelope mr-1"></i>
                                        <span>Ajouter Contact</span>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-1 pl-1" style="border-radius: 0;">
                                    <a href="#" class="card-link text-white p-0 m-0">
                                        <i class="fa fa-user-alt mr-1"></i>
                                        <span>Liste Contact</span>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-1 pl-1" style="border-radius: 0;">
                                    <a href="#" class="card-link text-white p-0 m-0">
                                        <i class="fa fa-share-square mr-1"></i>
                                        <span>Envoyer des SMS</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                  </div>
                </div>
                <div class="card ml-1 mb-2" style="background-color: rgba(255, 255, 255, 0.05);">
                  <div class="card-header border-0 p-1 pl-2 pr-2" style="background-color: rgba(255, 255, 255, 0.05); border-radius: 0;">
                        <a class="card-link justify-content-between d-flex text-white" data-toggle="collapse" href="#collapse4">
                            <span>
                                <i class="fa fa-dollar-sign mr-1"></i>
                                <span>Credentials</span>
                            </span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                  </div>
                  <div id="collapse4" class="collapse p-1" data-parent="#accordion">
                        <div class="card-body p-1 pl-3 pr-3">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        </div>
                  </div>
                </div>

            </div>
        </div>
        <div class="col-md-10 col-sm-12 container-fluid pt-4 pl-2">
            <?php 
                if (!empty($_GET["page"])) {
                    if ($_GET['page'] == "students") {
                        include ("sectors/students.php");
                    } else if ($_GET['page'] == "trainers") {
                        include ("sectors/trainers.php");
                    } else if ($_GET['page'] == "courses") {
                        include ("sectors/courses.php");
                    } else if ($_GET['page'] == "add_course") {
                        include ("add_course.php");
                    } else if ($_GET['page'] == "default") {
                        include ("sectors/default.php");
                    }
                } else {
                    include ("sectors/default.php");
                }
                
                
            ?>
        </div>
    </div>



	<script type="text/javascript" src="vendor/js/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/js/popper.min.js"></script>
	<script type="text/javascript" src="vendor/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/fonts/js/all.js"></script>
	<script type="text/javascript" src="vendor/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="vendor/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script>
        $('.fermer').click(function(){
            $('.toggle').toggle("blind",1000);
        });
        $('.btnSideBar').click(function(){
            $('.sidebar').toggle("slide",1000);
        });

    </script>
</body>
</html>
<?php
if (!empty($_SESSION["username"])) {

}
}else {
	header("Location: 404notLogged.php");
}
?>