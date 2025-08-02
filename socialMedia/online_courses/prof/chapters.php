<?php 
    require '../../server/db_connection.php';

    if (empty($_GET['course_id'])) {
        header("Location: ../../newsfeed.php");
    } else {
        $id = $_GET['course_id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../fontawesome5/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../admin/vendor/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../../admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="../../admin/vendor/jquery-ui-themes-1.12.1/themes/flick/jquery-ui.min.css">
    <link rel="stylesheet" href="../../admin/jQuery/jquery-te-1.4.0.css">
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Chapters</title>
</head>
<body>
<div class="row ml-3 no-gutters">
                <div class="col-12 shadow-lg p-2">
                    <div class="text-right">
                        <button class="btn btn-sm text-dark fermer"><i class="fa fa-chevron-down"></i></button>
                        <!-- <button class="btn btn-sm text-dark"><i class="fa fa-times"></i></button> -->
                    </div>
                    <div class="text-center text-info p-2 border-bottom border-dark ml-2 mr-2" style="font-size: x-large;">
                        LIST OF CHAPTERS
                    </div>
                    <div class="p-2 toggle">
                        <script type="text/javascript" src='DataTables/media/js/jquery.js'></script>
                        <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('.tab').DataTable();
                            });
                        </script>
                        <a href="add_course.php?course_id=<?= $id ?>" class="btn btn-success"><i class="fas fa-plus"></i> Add a chapter</a>
                        <table class="tab display cell-border stripe container-fluid table table-striped table-bordered col-sm-12">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Chapter Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $db = Database::connect();
                              $query = $db -> query("SELECT * FROM chapters WHERE course = '$id'");
                              while($trouve = $query -> fetch()){
                               ?>
                                <tr>
                                    <td>
                                        <?= $trouve['id'] ?>
                                    </td>
                                    <td>
                                        <?= $trouve['name'] ?>
                                    </td>
                                    <td>
                                        <?= $trouve['description'] ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm bg-transparent" href="add_course.php?id=<?= $trouve['id'] ?>"><i class="fa fa-eye text-info"></i> Details</a>
                                        <a class="btn btn-sm bg-transparent" href="add_course.php?id=<?= $trouve['id'] ?>"><i class="fa fa-trash-alt text-danger"></i> delete</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                $db = null;
                                 ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>
</html>