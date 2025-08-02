<div class="row ml-3 no-gutters">
                <div class="col-12 shadow-lg p-2">
                    <div class="text-right">
                        <button class="btn btn-sm text-dark fermer"><i class="fa fa-chevron-down"></i></button>
                        <!-- <button class="btn btn-sm text-dark"><i class="fa fa-times"></i></button> -->
                    </div>
                    <div class="text-center text-info p-2 border-bottom border-dark ml-2 mr-2" style="font-size: x-large;">
                        LIST OF STUDENTS
                    </div>
                    <div class="p-2 toggle">
                        <script type="text/javascript" src='DataTables/media/js/jquery.js'></script>
                        <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('.tab').DataTable();
                            });
                        </script>
                        <table class="tab display cell-border stripe container-fluid table table-striped table-bordered col-sm-12">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Login
                                    </th>
                                    <th>
                                        Contacts
                                    </th>
                                    <th>
                                        Account type
                                    </th>
									<th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $db = Database::connect();
                              $query = $db -> query("SELECT * FROM users WHERE account_type = 'Student'");
                              while($trouve = $query -> fetch()){
								$status = "";
                                $status_action="id_sus";
								if ($trouve['suspended'] == 0) {
									$status = "active";
                                    $status_action="id_sus";
								} else if($trouve['suspended'] == 1) {
									$status = "suspended";
                                    $status_action="id_re_sus";
								} else {
									$status = "Not specified";
								}
                               ?>
                                <tr>
                                    <td>
                                        <?= $trouve['id'] ?>
                                    </td>
                                    <td>
                                        <?= $trouve['first_name'] ?>
                                    </td>
                                    <td>
                                        <?= $trouve['email'] ?>
                                    </td>
                                    <td>
                                        <?= $trouve['phone'] ?>
                                    </td>
                                    <td>
                                        <?= $trouve['account_type'] ?>
                                    </td>
									<td>
                                        <?= $status ?>
                                    </td>
                                    <td>
										<a class="btn btn-sm bg-transparent" href="views/student_view.php?id=<?= $trouve['id'] ?>"><i class="fa fa-eye text-success"></i></a>
										<a class="btn btn-sm bg-transparent" href="index.php?<?= $status_action . '=' . $trouve['id'] ?>"><i class="fa fa-times text-warning"></i></a>
                                        <a class="btn btn-sm bg-transparent" href="index.php?id_sup=<?= $trouve['id'] ?>"><i class="fa fa-trash-alt text-danger"></i></a>
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