<?php $spec = Database::connect(); ?>
<div class="ad">
    <h1>Admin Panel</h1>
</div>
<div class="stats col-md-12">
    <h2>Basic stats</h2>
    <hr>
    <div class="students col-md-4">
        <li>Total Students</li>
        <li><img src="images/students.png" width="100px" height="100px"></li>
        <?php 
        $ts = $spec -> query("SELECT count(*) as stuss from users WHERE account_type = 'Student'");
        $tss = $ts -> fetch();
        ?>
        <li class="inf"><?= $tss["stuss"] ?> Students</li>
    </div>
    <div class="teachers col-md-3">
        <li>Total Teachers</li>
        <li><img src="images/default.jpg" width="100px" height="auto"></li>
        <?php 
        $tts = $spec -> query("SELECT count(*) as teachs from users WHERE account_type = 'Teacher'");
        $ttss = $tts -> fetch();
        ?>
        <li class="inf"><?= $ttss["teachs"] ?> Teachers</li>
    </div>
    <div class="total col-md-4">
        <li>Total Users</li>
        <li><img src="images/total.jpg" width="100px" height="auto"></li>
        <?php 
        $tu = $spec -> query("SELECT count(*) as usss from users");
        $ttu = $tu -> fetch();
        ?>
        <li class="inf"><?= $ttu["usss"] ?> Users (including administrator)</li>
    </div>
    <br><br><br><br>
    <h2>Course stats</h2>
    <hr>
    <div class="total col-md-4">
        <li>Total Courses</li>
        <li><img src="images/books.png" width="100px" height="auto"></li>
        <?php 
        $c = $spec -> query("SELECT count(*) as courss from courses");
        $cc = $c -> fetch();
        ?>
        <li class="inf"><?= $cc["courss"] ?> Courses</li>
    </div>
    <div class="total col-md-4">
        <li>Total Chapters available</li>
        <li><img src="images/books.png" width="100px" height="auto"></li>
        <?php 
        $ch = $spec -> query("SELECT count(*) as chapss from chapters");
        $cch = $ch -> fetch();
        ?>
        <li class="inf"><?= $cch["chapss"] ?> Chapters</li>
    </div>
</div>
<style>
    .ad{
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 20px;
    }
    .stats{
        text-align: center;
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0px 0px 40px #000000;
        width: 95%;
    }
    li{
        display: block;
    }
    .stats div{
        display: inline-block;
    }
    .inf{
        font-size: 20px;
        font-weight: bold;
        color: #27AAE1;
        transition: .5s;
    }
    .inf:hover{
        font-size: 25px;
    }
</style>