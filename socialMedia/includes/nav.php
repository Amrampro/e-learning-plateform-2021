<!doctype html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>nav</title>
  <style media="screen">
    nav{
      /* background: #000000; */
      background: rgba(0, 0, 0, .9);
      /* width: 100%;
      margin: -8px;
      position: fixed; */
      padding: 40px;
      margin-bottom: 0px;
      font-family: arial;
      text-align: right;
      z-index: 1;
      width: 100%;
    }
    .nav_link{
      /* background: red; */
      padding: 15px;
      color: #ffffff;
      text-decoration: none;
      font-weight: bold;
      transition: .5s;
    }
    .nav_link:hover{
      color: #27AAE1;
      text-decoration: none;
    }
    .profile_set{
      display: none;
    }
    .profile_set a{
      display: block;
    }
    .disconnect{
      background: none;
      border: 2px solid red;
      color: red;
      border-radius: 5px;
      overflow: hidden;
      position: relative;
    }
    .disconnect:hover{
      background: red;
      color: white;
    }
    .logo_col{
      color: #27AAE1;
    }
    nav .logo{
      float: left;
      margin-top: -35px;
    }
    @media screen and (max-width: 915px){
      nav{
        text-align: left;
        height: 100px;
        overflow: hidden;
        z-index: 1;
      }
      #menu_top{
        transition: .5s;
      }
      nav a{
        display: block;
      }
      nav .logo{
      float: none;
      }
      nav .menu_but{
        pointer-events: none;
        width: 45px;
        height: 45px;
        border: 2px solid #ffffff;
        border-radius: 5px;
        float: right;
        margin-top: -15px;
        padding: 5px;
      }
      .menu_but::before{
        content: "";
        position: absolute;
        width: 30px;
        height: 5px;
        background: green;
        box-shadow: 0px 12px red;
      }
      .menu_but::after{
        content: "";
        position: absolute;
        width: 30px;
        height: 5px;
        background: yellow;
        margin-top: 25px;
        animation-name: middle_star;
        animation-duration: 2s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        box-shadow: 0px -13px 0px 0px red;
      }
      @keyframes middle_star{
        0%{
          box-shadow: 0px -13px 0px 0px red;
        }
        50%{
          box-shadow: 0px -13px 5px 1px yellow;
        }
        100%{
          box-shadow: 0px -13px 0px 0px red;
        }
      }

    }
  </style>
</head>
<body>
  <nav id="menu_top" onclick="show_nav()">
    <div class="menu_but" onclick="show_nav()"></div>
    <a class="logo nav_link" href="admin/index.php"><img class="navLogo" src="images/logo/Laptop-computer.png" alt="">SMeet<span class="logo_col">Up</span></a>
    <a class="nav_link" href="newsfeed.php">Home</a>
    <a class="nav_link" href="timeline.php?id=<?= $found_user["id"] ?>">Timeline</a>
    <a class="nav_link" href="users/students/desktop.php">Cloud Service</a>
    <a class="nav_link" href="online_courses/">Online Course</a>
    <a class="nav_link" href="contact.php">Contact</a>
    <a class="disconnect nav_link" href="disconnect.php">Disconnect</a>
  </nav>

  <script>
    
    function  show_nav() {
      var navi = document.getElementById("menu_top");
      if (navi.style.height == "100%") {
        navi.style.height = "100px";
      } else {
        navi.style.height = "100%";
      }
    }
  </script>

</body>
</html>
