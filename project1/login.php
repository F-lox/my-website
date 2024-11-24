<?php include './dashboard/function.php'   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
<?php Login(); ?>
    <main>
      <section id="seclogin">
         <div id="seclogin_inner"><br>
         <a href="index.php" id="control2">Go back to home</a>
              <form action="" method="post" id="post1">
                <div>
                    <label for="email"></label>
                    <input type="email" name="email" placeholder="Enter your email address" id="email">
                </div>
                <div>
                    <label for="password"></label>
                    <input type="password" name="password" placeholder="Enter your password" id="password">
                    <img src="" id="hide1" alt="">
                    <img src="" id="view1" alt="">
                </div>
                <button id="btn1" name="loginBtn">Login</button> 
                
                 <p id="ins">Dont have an account yet? <a href="register.php" id="btn2">Signup</a></p>  
              </form>
              <h1 id="login_h1">Vloggy</h1>
            </div>
        </section>
    </main>
    
    <script src="js/script.js"></script>
</body>
</html>