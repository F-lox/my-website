<?php include "function.php"  ?>
<?php 
        if(!isset($_SESSION['username'])){
            header('Location: ../login.php');
        }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>head</title>
</head>
<body>
    <aside>
        <div id="vlogham">
        <h1 id="vlog_dashboard"><a href="../index.php">Vloggy</a></h1>
        <img src="img/menu-burger.png" id="hamburger" alt="">
        </div>
        
        <ul id="dash">
            <li id="dashli1"><img src="img/house.png" alt="" id="boardhome1"><a href="index.php" id="mydash">Dashboard</a></li>
            <li id="dashli2"><img src="img/more.png" alt="" id="boardhome2"><a href="post_vlog.php" id="mypost">Post a New Vlog</a></li>
            <li id="dashli3"><img src="img/resume.png" alt="" id="boardhome3"><a href="my_vlog.php" id="myvlog">My Vlogs</a></li>
            <li id="dashli4"><img src="img/profile.png" alt="" id="boardhome4"><a href="profile.php" id="myprofile">My Profile</a></li>
            <li id="dashli5"><img src="img/logout.png" alt="" id="boardhome5"><a href="logout.php" id="mylogout">Logout</a></li>
        </ul>
    </aside>
    <main>
        <header>
            <nav id="navdash">
                <div id="logo_dashboard"><h3>Hello,</h3></div>
                  <ul>
                    <h3 id="dash_user"><?php
                    if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];

                    }else{
                        echo 'username not set';
                    }
                    ?></h3>
                  </ul>
                  <!-- <article id="switchBtnCon">
                       <div id="switchBtn"></div>
                  </article> -->
                  <ul id="dashcons">
                    <!-- <li><img src="img/email.png" id="notify" alt=""><a href=""></a></li>
                    <li><img src="img/notification.png" id="notify" alt=""><a href=""></a></li> -->
                    <a href="my_vlog.php"><img src="img/attachment.png" id="notify3" alt=""></a>
                    <?php CheckProfileImageDashboard() ?>
                    <!-- <a href="profile.php" id="profile_imgdashcon"><img src="img/profile1.png" id="notify2" alt=""></a> -->
                  </ul>

            </nav>
        </header>