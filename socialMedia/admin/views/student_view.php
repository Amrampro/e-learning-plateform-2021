<?php 
    require ("../../server/db_connection.php");

    if (!empty($_GET)){
        $id = $_GET['id'];
        $con = Database::connect();
        $query = $con -> query("SELECT * FROM users WHERE id = '$id'");
        $found = $query -> fetch();
        $con = null;
    }
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <!-- <link rel="stylesheet" href="../../Public/styles/datatables.min.css"> -->
    </head>
    <body>
    <div class="row mx-0 my-5 justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-center">
                    Details on a user
                </h3>
            </div>
            <div class="card-body">
                <form method="post" action="admin.php?page=Controllers/medecins/add_medecin_validation" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" value="<?= $found['first_name'] ?>" name="name" id="name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" value="<?= $found['last_name'] ?>" name="lname" id="lname" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" value="<?= $found['username'] ?>" name="username" id="username" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="<?= $found['email'] ?>" name="email" id="email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" value="<?= $found['country'] ?>" name="country" id="country" readonly>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" value="<?= $found['state'] ?>" name="state" id="state" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" value="<?= $found['phone'] ?>" name="phone" id="phone" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" value="<?= $found['gender'] ?>" name="gender" id="gender" readonly>
                    </div>
                    <div class="form-group">
                        <label for="birth">Birth</label>
                        <input type="text" class="form-control" value="<?= $found['birth_date'] ?>" name="birth" id="birth" readonly>
                    </div>
                    <div class="form-group">
                        <label for="schoollv">School Level</label>
                        <input type="text" class="form-control" value="<?= $found['school_level'] ?>" name="schoollv" id="schoollv" readonly>
                    </div>
                    <div class="form-group">
                        <label for="schoolop">School option</label>
                        <input type="text" class="form-control" value="<?= $found['school_option'] ?>" name="schoolop" id="schoolop" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" value="<?= $found['account_type'] ?>" name="role" id="role" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <?php 
                            $status = "";
                            if ($found['suspended'] == 0) {
                                $status = "active";
                            } else if($found['suspended'] == 1) {
                                $status = "suspended";
                            } else if($found['suspended'] == 2) {
                                $status = "Do not give course";
                            } else {
                                $status = "Not specified";
                            }
                            
                        ?>
                        <input type="text" class="form-control" value="<?= $status ?>" name="status" id="status" readonly>
                    </div>
                    
                    <a href="../index.php" class="btn btn-info">Return</a>
                    <!-- <button name="add_medecin" type="submit" class="btn btn-success">Update</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
    </body>
</html>