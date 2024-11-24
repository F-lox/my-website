<?php include './dashboard/function.php'   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>vloggy</title>
</head>
<body>
<header>
        <nav id="navcon">
           <div id="logo"><h1><a href="" id="logo">Vloggy</a></h1></div>
             <ul id="ul1">
                    <li id="home1"><a href="index.php">Home</a></li>
                    <li id="home2"><a href="category.php?cat=news">News</a></li>
                    <li id="home3"><a href="category.php?cat=fashion">Fashion</a></li>
              </ul>

              <div class="dropdown">
                <button class="dropbtn">More</button>
                <div class="dropdown-content">
                    <a href="category.php?cat=sports">Sports</a>
                    <a href="category.php?cat=tech">Tech</a>
                    <a href="category.php?cat=lifestyle">Lifestyle</a>
           </div>   
               
           </nav>  
           <?php  
              if(isset($_SESSION['username'])){
                CheckProfileImage_FrontEnd();
              }else{
                echo '  <button id="btn"><a href="login.php">Sign In</a></button>';
              }
              ?>
             <!-- <a href="login.php" id="btn">Sign In</a> -->
              <!-- <a href="login.php" id="btn">Sign In</a> -->
              <!-- <a href="../index.php" id="webcap"><img src="img/avatargirl.jpg" id="avata" alt=""></a> -->
            
              <ul id="icons">
                    <li><a href=""><img src="img/alphabet-x-icon.png" id="icon" alt=""></a></li>
                    <li><a href=""><img src="img/facebook-round-color-icon.png" id="icon" alt=""></a></li>
                    <li><a href=""><img src="img/ig-instagram-icon.png" id="icon" alt=""></a></li>
                    <li><a href=""><img src="img/linkedin-app-icon.png" id="icon" alt=""></a></li>
               </ul>
               
            
          
    </header>
