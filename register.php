<?php include './dashboard/function.php'   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<?php signup() ?>
    <!-- <div id="success_box" class="animate__animated animate__backInLeft">Registration was successful</div>
    <div id="error_box" class="animate__animated animate__backInLeft">Registration was not successful</div> -->



    <main>
        <section id="sec0">
        <div id="sec0_inner"><br>
               <a href="index.php" id="control">Go back to home</a> 
                <br> <form action="" method="post" id="post2">
                    <h1 id="h1a">Sign Up to Vloggy</h1>
                        <div>
                            <label for="user name"></label>
                            <input type="text" name="username" placeholder="Enter your preferred username" id="user2">
                         </div>
                         <div>
                                <label for="first name"></label>
                            <input type="text" name="firstname" placeholder="Enter your first name" id="fname">
                        </div>
                        <div>
                                <label for="last name"></label>
                            <input type="text" name="lastname"  placeholder="Enter your last name" id="lname">
                        </div>
                        <div>
                            <label for="email"></label>
                            <input type="text" name="email" placeholder="Enter your email address" id="email2">
                        </div>
                         <div>
                                <label for="password"></label>
                            <input type="password" name="password" placeholder="Enter your password" id="password2">
                            <img src="img/hide.png" id="hide1" alt="">
                            <img src="img/view.png" id="view1" alt="">
                        </div>
                        <div>
                                <label for="confirm password"></label>
                            <input type="password" name="confirmpassword" placeholder="Enter your confirm password" id="confirmpassword2">
                            <img src="img/hide.png" id="hide2" alt="">
                            <img src="img/view.png" id="view2" alt="">
                        </div>
                        <button id="btn3" name="registerBtn">Register</button><br><br>
                        <p id="redirect_regis">Already have an account? <a href="login.php">Login</a> here</p>
                     </form><br><br>
            </div>
        </section>
    </main>
    
    <script src="js/script.js"></script>
</body>
</html>