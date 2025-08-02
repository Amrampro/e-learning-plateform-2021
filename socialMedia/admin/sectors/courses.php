<div class="row ml-3 no-gutters">
                <div class="col-12 shadow-lg p-2">
                    <div class="text-right">
                        <button class="btn btn-sm text-dark fermer"><i class="fa fa-chevron-down"></i></button>
                        <!-- <button class="btn btn-sm text-dark"><i class="fa fa-times"></i></button> -->
                    </div>
                    <div class="text-center text-info p-2 border-bottom border-dark ml-2 mr-2" style="font-size: x-large;">
                        LIST OF COURSES
                    </div>
                    <div class="p-2 toggle">
                        <script type="text/javascript" src='DataTables/media/js/jquery.js'></script>
                        <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('.tab').DataTable();
                            });
                        </script>
                        <a href="index.php?page=add_course" class="btn btn-success"><i class="fas fa-plus"></i> Add a course</a>
                        <table class="tab display cell-border stripe container-fluid table table-striped table-bordered col-sm-12">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Course Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Teachers Name
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $db = Database::connect();
                              $query = $db -> query("SELECT * FROM courses");
                              while($trouve = $query -> fetch()){
                                $trainer = $trouve['id_prof'];
                                $sql = $db -> query("SELECT * FROM users WHERE id = '$trainer'");
                                $found_trainer = $sql -> fetch();
                                $trainer_name = $found_trainer["first_name"];
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
                                        <?= $trainer_name ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm bg-transparent" href="index.php?id_supc=<?= $trouve['id'] ?>"><i class="fa fa-trash-alt text-danger"></i> delete</a>
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