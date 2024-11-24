
<?php
     ob_start();
     session_start();

       ini_set('display_errors', 1);
       ini_set('display_startup_errors', 1);
       error_reporting(E_ALL);

     $conn = new mysqli('localhost','root','','project1');

     // checks if Database is connected. If it is true it will output 'connected'
     if ($conn) {
        // echo "connected";
     }

     function signup(){
        global $conn;

        if(isset($_POST['registerBtn'])){
            $username = htmlspecialchars($_POST['username']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);

            $password = htmlspecialchars($_POST['password']);
            $confirmpassword = htmlspecialchars($_POST['confirmpassword']);

            // Check if Email already exist
            $checkemail = "SELECT * FROM registration_table WHERE `email` = '$email'";
            $Emailresult = $conn->query($checkemail);

            // Checking if Username already exist
            $checkusername = "SELECT * FROM registration_table WHERE `username` = '$username'";
            $Usernameresult = $conn->query($checkusername);

            if($password !== $confirmpassword){
                echo '<h2>password does not match</h2>';


            }elseif(strlen($password) < 5){
                echo '<h2>password is too short</h2>';

            }
elseif(mysqli_num_rows($Emailresult) > 0){
        echo '<h2>Email already exist</h2>';
}elseif(mysqli_num_rows($Usernameresult) > 0){
        echo '<h2>Username already exist</h2>';

}else{

    // INSERT INTO - inserts new data into registration_table.
    $sql = "INSERT INTO registration_table
    (`username`, `firstname`, `lastname`, `email`, `password`, `confirmpassword`, `user_role`)
    VALUES ('$username', '$firstname', '$lastname', '$email', '$password', '$confirmpassword', 'subscriber')";
    $result = $conn->query($sql);

    if($result == true){
        echo '<h2>Successful</h2>';

    }else{
        echo 'Registration Failed';
        die("Query failed" .mysqli_error($conn));
    }
}


        }
     }

function Login(){
    // Use the global $conn variable for database connection
    global $conn;
    // Check if the login button has been pressed
    if(isset($_POST['loginBtn'])){
            // Get the email and password from the POST request, sanitize them to prevent XSS attacks
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // SQL query to select the user with the provided email and password
            $sql = "SELECT * FROM registration_table WHERE `email` = '$email' AND `password` = '$password'";

            // Execute the query
            $result = $conn->query($sql);

            // Check if exactly one row is returned, indicating a successful login
            if(mysqli_num_rows($result) === 1){
                // Loop through the result (even though there should only be one row)
                foreach($result as $row){
                    // Get the username from the result
                    $username = $row['username'];
                }
                // Store the username in the session
                $_SESSION['username'] = $username;

                // Redirect to the dashboard
                header('location: ./dashboard/index.php');
            } else {
                // if the login fails, show an error modal
                echo '<div id="error_box" class="animate__animated animate__backInLeft">Registration was not successful</div>';
            }

    }
}

function AddVlog(){
    global $conn;

    if(isset($_POST['vlogsubmit'])){

        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }
        if(!empty($_FILES['fileselect']['name'])){

            $vlogtitle = mysqli_escape_string($conn, htmlspecialchars($_POST['vlogtitle']));
            $vlogdescription = mysqli_escape_string($conn, htmlspecialchars($_POST['vlogdescription']));
            $vlogcategory = mysqli_escape_string($conn, htmlspecialchars($_POST['vlogcategory']));




            $file_name = $_FILES['fileselect']['name'];
            $file_size = $_FILES['fileselect']['size'];
            $file_tmp = $_FILES['fileselect']['tmp_name'];
            $unique_string = uniqid();


            // Get file Extension

            //John.png = ['John', 'png']
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));

            // echo $file_ext;

            // Validate file extension
            $allowed_extensions = ['png', 'jpg', 'jpeg', 'webp'];

            if(in_array($file_ext, $allowed_extensions)){
                if($file_size <= 1000000){

                    $target_dir = 'img/'.$unique_string.".".$file_ext;
                    $fileselect_url = $unique_string.".".$file_ext;

                    move_uploaded_file($file_tmp, $target_dir);

                    $sql = "INSERT INTO vlogpost (`vlogtitle`, `vlogdescription`, `vlogcategory`, `vlogimage`, `username`)
                    VALUES ('$vlogtitle','$vlogdescription','$vlogcategory','$fileselect_url','$username')";
                    $result = $conn->query($sql);
                    if($result){
                        echo '<div id="success_box" class="animate__animated animate__backInLeft">Vlog Post Upload successful</div>';
                    }else{
                        echo '<div id="error_box" class="animate__animated animate__backInLeft">Vlog Post Upload not successful</div>';
                        die("Query failed" . mysqli_error($conn));
                    }
                }else{
                    echo'<h1>Image size should not be more than 1mb</h1>';
                }
            }else{
                echo '<h1>File Extension not allowed</h1>';
            }
        }
    }
}

function GetAllPosts(){
    global $conn;

    $sql = "SELECT * FROM vlogpost order by id desc limit 5";
    $result = $conn->query($sql);

    if($result == true){
        foreach($result as $row){
            $id = $row['id'];
            $vlogtitle = $row['vlogtitle'];
            $vlogdescription = $row['vlogdescription'];
            $vlogcategory = $row['vlogcategory'];
            $vlogimg = $row['vlogimage'];
            $username = $row['username'];
            $vlogdate = $row['vlogdate'];

            // Split the text into an array of words
            $vlogdescription = explode(' ', $vlogdescription);

            // Convert thr array back to string again
            $vlogdescription = implode(' ', array_slice($vlogdescription, 0, 10));

            echo '<section id="sec1">
                    <article id="sec1_inner">
                        <div id="imgdiv">
                        <img src="dashboard/img/'.$vlogimg.'" id="img1" alt="">
                        </div>
                    <article id="sec21">
                        <ul id="sec1_li">
                            <h5>'.$vlogcategory.'</h5>
                            <li>'.$vlogdate.'</li>
                            <li>3 min read</li>
                        </ul>
                        <h3>'.$vlogtitle.'</h3>
                        <p>
                            '.$vlogdescription.'
                        </p>
                            <a href="singlepage.php?id='.$id.'" id="butcon">Continue Reading</a>
                    </article>
                </section>';
        }
    }
}

function getSinglePost(){
    global $conn;

    if(isset($_GET['id'])){

        $single_page_id = $_GET['id'];

        $sql = "SELECT * FROM vlogpost WHERE `id` = '$single_page_id'";

        $result = $conn->query($sql);
        if($result){
            foreach($result as $value){

                $vlogtitle = $value['vlogtitle'];
                $vlogdescription = $value['vlogdescription'];
                $vlogcategory = $value['vlogcategory'];
                $vlogimage = $value['vlogimage'];
                $vlogdate = $value['vlogdate'];

                echo '<section>
        <article>
                <section id="secb">
                    <article id="secb_inner">
                    <div>
                        <ul id="disb">
                            <p id="techb">'.$vlogcategory.'</p>
                            <p id="dateb">'.$vlogdate.'</p>
                            <p id="timeb">3 min read</p>
                       </ul>  
                     </div>
                     <div id="sellbdiv">
                     <h3 id="sellb">'.$vlogtitle.'</h3>
                     </div>
                     <div id="thug_div">
                            <img src="dashboard/img/'.$vlogimage.'" id="thug" alt="">
                    </div>
                        <div id="writeb"><br>
                            <p>'.$vlogdescription.'</p><br>
                        </div>
                    </article>
                </section>
        </article>
    </section>';
                
            }
        }
    }
}

function post_view() {
    global $conn;

    if(isset($_GET['id'])){
        $postid = $_GET['id'];
        $sql = "UPDATE vlogpost SET `vlogview` = `vlogview` + 1 where `id` = '$postid'";
        $result = $conn->query($sql);
    }
}


function GetTrendingPost() {
        global $conn;

        $sql = "SELECT * FROM vlogpost order by vlogview desc limit 5";
        $result = $conn->query($sql);

        $num = 1;

        if($result == true){
            foreach($result as $value){
                $id = $value['id'];
                $vlogtitle = $value['vlogtitle'];
                $vlogimage = $value['vlogimage'];
                $vlogdate = $value['vlogdate'];

                echo '<article id="tec1_inner">
                        <div id="bolder">
                            <img src="dashboard/img/'.$vlogimage.'" id="attlm"  alt="">
                        </div>
                       <div id="sold">
                            <h5 class="trend_h">
                                <a href="singlepage.php?id='.$id.'">'.$vlogtitle.'</a>
                            </h5>
                            <p>'.$vlogdate.'</p>
                        </div><br>
                    </article>';

            }
        }
}




function GetFootPost() {
    global $conn;

    $sql = "SELECT * FROM vlogpost order by vlogview desc limit 3";
    $result = $conn->query($sql);

    $num = 1;

    if($result == true){
        foreach($result as $value){
            $id = $value['id'];
            $vlogtitle = $value['vlogtitle'];
            $vlogimage = $value['vlogimage'];
            $vlogdate = $value['vlogdate'];

            echo '<article id="last_inner">
                        <div id="chidi">
                            <img src="dashboard/img/'.$vlogimage.'" id="man" alt="">
                        </div>
                       <div id="bolds">
                         <a href="singlepage.php?id='.$id.'" id="bold">'.$vlogtitle.'</a>
                            <p id="bold">'.$vlogdate.'</p>
                        </div><br>
                    </article>';

        }
    }
}



function CheckProfileImage_FrontEnd(){
    global $conn;

    if(isset($_SESSION['username'])){

        $username = $_SESSION['username'];

        $sql = "SELECT * FROM registration_table WHERE `username` = '$username'";

        $result = $conn->query($sql);

        if($result){

            foreach($result as $value){
                $profileImage = $value['profileimage'];

                if(empty($profileImage)){
                    echo '  <a href="./dashboard/index.php" id="webcap"><img src="img/avatargirl.jpg" id="avata" alt=""></a>';
                }else{
                    echo '<a href="./dashboard/index.php" id="webcap"><img src="dashboard/img/'.$profileImage.'" id="avata" alt=""></a>';
                }
            }
        }
    }
}


     function GetCategoryPost(){
          global $conn;

          if(isset($_GET['cat'])){
            $categoryTitle = $_GET['cat'];
          }

          $sql = "SELECT * FROM vlogpost WHERE `vlogcategory` = '$categoryTitle' order by id desc limit 6";
          $result = $conn->query($sql);

          if($result == true){
            foreach($result as $row){
                $id = $row['id'];
                $vlogtitle = $row['vlogtitle'];
                $vlogdescription = $row['vlogdescription'];
                $vlogcategory = $row['vlogcategory'];
                $vlogimg = $row['vlogimage'];
                $username = $row['username'];
                $vlogdate = $row['vlogdate'];

                  // Split the text into an array of words
            $vlogdescription = explode(' ', $vlogdescription);

            // Convert thr array back to string again
            $vlogdescription = implode(' ', array_slice($vlogdescription, 0, 10));

            echo '<section id="sec1">
                    <article id="sec1_inner">
                        <div id="imgdiv">
                        <img src="dashboard/img/'.$vlogimg.'" id="img1" alt="">
                        </div>
                    <article id="sec21">
                        <ul id="sec1_li">
                            <h5>'.$vlogcategory.'</h5>
                            <li>'.$vlogdate.'</li>
                            <li>3 min read</li>
                        </ul>
                        <h3>'.$vlogtitle.'</h3>
                        <p>
                            '.$vlogdescription.'
                        </p>
                            <a href="singlepage.php?id='.$id.'" id="butcon">Continue Reading</a>
                    </article>
                </section>';

            }
          }

}


function GetAllAdminVlogs() {
    global $conn;

    if(isset($_SESSION['username'])){

        $username = $_SESSION['username'];

        $sql2 = "SELECT * FROM registration_table WHERE `username` = '$username'";
        $result2 = $conn->query($sql2);

        foreach($result2 as $value){
            $user_role = $value['user_role'];
        }

        if($user_role == 'admin'){

            $sql = "SELECT * FROM vlogpost order by id desc limit 8";
            $result = $conn->query($sql);

            if($result == true){
                foreach($result as $row){
                    $id = $row['id'];
                    $vlogtitle = $row['vlogtitle'];
                    $vlogdescription = $row['vlogdescription'];
                    $vlogcategory = $row['vlogcategory'];
                    $vlogimg = $row['vlogimage'];
                    $username = $row['username'];
                    $vlogdate = $row['vlogdate'];
                    $vlogViewCount = $row['vlogview'];


                    // Split the text into an array of words
                    $vlogdescription = explode(' ', $vlogdescription);

                    //  Convert the array back to string again
                    $vlogdescription = implode(' ', array_slice($vlogdescription, 0, 10));

                    echo '<section id="Flex_wrapper2">
            <article id="Flexbox_parent2">
                    <div class="Flexboxaa">
                        <div id="vlog_house2">
                            <img src="img/'.$vlogimg.'" id="myvlog_img" alt="">
                        </div>
                        <div id="vlog_word2">
                            <h5 id="vlog_word2h">'.$vlogtitle.'</h5>
                            <p id="vlog_word2p">'.$vlogdescription.'</p>
                        </div>
                    </div>
                    <div class="Flexboxf">
                        <p id="vlog_word2p2">'.$vlogdate.'</p>
                    </div>
                    <div class="Flexboxg">
                        <p id="vlog_word2p3">'.$vlogcategory.'</p>
                    </div>
                    <div class="Flexboxh">
                        <p id="vlog_word2p4">'.$vlogViewCount.'</p>
                    </div>
                    <div class="Flexboxi">
                        <a href="delete.php?id='.$id.'"><img src="img/bin.png" id="myvlog_icon1" alt=""><br></a>
                        <a href="edit.php?id='.$id.'"><img src="img/sticky-note.png" id="myvlog_icon2" alt=""></a>
                    </div>
            </article>
        </section>';
    
                }
            }
        }else{

            $sql = "SELECT * FROM vlogpost WHERE `username` = '$username' order by id desc limit 8";
            $result = $conn->query($sql);

            if($result == true){
                foreach($result as $row){
                    $id = $row['id'];
                    $vlogtitle = $row['vlogtitle'];
                    $vlogdescription = $row['vlogdescription'];
                    $vlogcategory = $row['vlogcategory'];
                    $vlogimg = $row['vlogimage'];
                    $username = $row['username'];
                    $vlogdate = $row['vlogdate'];
                    $vlogViewCount = $row['vlogview'];
                    
                    // Split the text into an array of words
                    $vlogdescription = explode(' ', $vlogdescription);

                    //  Convert the array back to string again
                    $vlogdescription = implode(' ', array_slice($vlogdescription, 0, 10));

                    echo '<section id="Flex_wrapper2">
            <article id="Flexbox_parent2">
                    <div class="Flexboxaa">
                        <div id="vlog_house2">
                            <img src="img/'.$vlogimg.'" id="myvlog_img" alt="">
                        </div>
                        <div id="vlog_word2">
                            <h5 id="vlog_word2h">'.$vlogtitle.'</h5>
                            <p id="vlog_word2p">'.$vlogdescription.'</p>
                        </div>
                    </div>
                    <div class="Flexboxf">
                        <p id="vlog_word2p2">'.$vlogdate.'</p>
                    </div>
                    <div class="Flexboxg">
                        <p id="vlog_word2p3">'.$vlogcategory.'</p>
                    </div>
                    <div class="Flexboxh">
                        <p id="vlog_word2p4">'.$vlogViewCount.'</p>
                    </div>
                    <div class="Flexboxi">
                        <a href="delete.php?id='.$id.'"><img src="img/bin.png" id="myvlog_icon1" alt=""><br></a>
                        <a href="edit.php?id='.$id.'"><img src="img/sticky-note.png" id="myvlog_icon2" alt=""></a>
                    </div>
            </article>
        </section>';
            }
        }

    }
}

}

function getProfile(){
    global $conn;

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        
        $sql = "SELECT * FROM registration_table WHERE `username` = '$username'";
        $result = $conn->query($sql);

        if($result == true){
            foreach($result as $row){

                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email =$row['email'];
                ?>
                 <form action="" id="prof1" method="post" enctype="multipart/form-data">
                        <h3 id="prof1_h3">Profile Information</h3>
                <div id="prof11">
                    <?php CheckProfileImage(); ?>
                         <!-- <img src="img/profile1.png" id="prof1_img" alt=""> -->
                </div><br><br>
                <div>
                         <input type="file" name="updateimg" placeholder="Choose File" id="prof1_select">
                </div><br><br>
                <div>
                        <label for="" id="firstname_prof">First Name</label><br>
                        <input type="text" name="firstname" value="<?php echo $firstname;?>" id="prof1_firstname">
                </div><br>
                <div>
                        <label for="" id="lastname_prof">Last Name</label><br>
                        <input type="text" name="lastname" value="<?php echo $lastname;?>" id="prof1_lastname">
                </div><br>
                <div>
                    <label for="" id="email_prof">Email</label><br>
                    <input type="email" name="email" value="<?php echo $email;?>" id="prof1_email">
                </div><br>
                <button type="submit" id="prof1_update" name="updateProfile">Update Profile</button>
            </form>
            
            <?php }
        }
    }
}



function CheckProfileImage(){
    global $conn;

    if(isset($_SESSION['username'])){
        
        $username = $_SESSION['username'];

        $sql = "SELECT * FROM registration_table WHERE `username` = '$username'";

        $result = $conn->query($sql);

        if($result){

            foreach($result as $value){
                $profileImage = $value['profileimage'];
                
                if(empty($profileImage)){
                    echo '<div id="prof11">
                         <img src="img/profile1.png" id="avata" alt="">
                </div><br><br>';
                }else{
                    echo '<img src="img/'.$profileImage.'" id="avata" alt="">';
                }
            }
        }
    }
}


function UpdateProfile(){
    // Use global connection variable
    global $conn;

    // Check if the updateProfile form is submitted and the user is logged in

    if(isset($_POST['updateProfile']) && isset($_SESSION['username'])){

        // Get the username from the session
        $username = $_SESSION['username'];

        // Check if an image is uploaded
        if(!empty($_FILES['updateimg']['name'])){


            // Get and sanitize the input from the form
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);


            // Get the file details
            $file_name = $_FILES['updateimg']['name'];
            $file_size = $_FILES['updateimg']['size'];
            $file_tmp = $_FILES['updateimg']['tmp_name'];
            $unique_string = uniqid();


            // Get file extension
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));


            // Set target directory and profile image URL
            $target_dir = 'img/'.$unique_string.".".$file_ext;
            $profileImg_url = $unique_string.".".$file_ext;

            //Validate file extension
            $allowed_extensions = ['png', 'jpg', 'jpeg', 'webpg'];

            //,Check if the file extension is allowed

            if(in_array($file_ext, $allowed_extensions)){
                // Check if the file size is within the limit (1MB)
                if($file_size <= 1000000){

                    // Move the uploaded file to the target directory
                    move_uploaded_file($file_tmp, $target_dir);

                    // Update the user's profile in the database with the new image
                    $sql = "UPDATE registration_table SET `firstname` = '$firstname',
                    `lastname` = '$lastname', `profileimage` = '$profileImg_url',
                    `email` = '$email' WHERE `username` = '$username'";
                    $result = $conn->query($sql);

                    // Check if the update was successful
                    if($result){
                        header('Location: profile.php'); // Redirect to the profile page
                    }else{
                        echo 'Cannot Update Profile'; // Output error message
                    }
                }
            }
        }else{
            // Get and sanitize the input from the form (without updating the image)
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);

            // Update the user's profile in the database without the image
            $sql = "UPDATE registration_table SET `firstname` = '$firstname',
                    `lastname` = '$lastname',  `email` = '$email' WHERE `username` = '$username'";
                    $result = $conn->query($sql);

                    // Check if the update was successful
                    if($result){
                        header('Location: profile.php'); // Redirect to the profile page
                    }else{
                        echo 'Cannot Update Profile'; // Output error message
                    }

        }
    }
}



function ChangePassword(){
    // Use global connection variable
    global $conn;

    // Check if the changePass form is submitted and the user is logged in
    if(isset($_POST['changePass']) && isset($_SESSION['username'])){


        // Get the username from the session 
        $username = $_SESSION['username'];

        // Get and sanitize the input from the form
        $oldPass = htmlspecialchars($_POST['oldPass']);
        $newPass = htmlspecialchars($_POST['newPass']);
        $confirmNewPass = htmlspecialchars($_POST['confirmPass']);

        // Check if the new password matches the confirm password
        if($newPass === $confirmNewPass){

            // Query to check if the old password and username matches 
            $sql = "SELECT * FROM registration_table WHERE `password` = '$oldPass' AND `username` = '$username'";
            $result = $conn->query($sql);


            // If there is a matching record
            if(mysqli_num_rows($result) == 1){

                // Loop through the result to get the user id
                foreach($result as $row){


                    // Get the user id from the result 
                    $id = $row['id'];

                    // Update the password in the database
                    $sql2 = "UPDATE registration_table SET `password` = '$newPass', `confirmpassword` = '$newPass' WHERE `id` = '$id'";
                    $result2 = $conn->query($sql2);

                    // Check if the update was successful
                    if($result2){
                        echo 'Password Updated Successfully';
                    }else{
                        echo 'Password Update not Successful';
                    }
                }
            }else{
                    // If the old password is incorrect
                    echo 'Old password is incorrect';

            }
        }else{
            // if the new password does not match the confirm password
            echo 'New Password does not match the confirm password';
        }
    }
}




function postCount() {
    // Use global connection variable
    global $conn;

    // Check if the user is logged in 
    if(isset($_SESSION['username'])){

        // Get the username from the session
        $username = $_SESSION['username'];


        // Query to get all post by the logged in user
        $QueryPostCount = "SELECT * FROM vlogpost WHERE `username` = '$username' ORDER BY id";
        $resultCount = $conn->query($QueryPostCount);


        // Count the number of posts returned by the query
        $AllPostCount = $resultCount->num_rows;

        // Output the total post count
        echo $AllPostCount;
    }
}



function CheckProfileImageDashboard() {
    global $conn;

    if(isset($_SESSION['username'])){
        
        $username = $_SESSION['username'];

        $sql = "SELECT * FROM registration_table WHERE `username` = '$username'";

        $result = $conn->query($sql);

        if($result){

            foreach($result as $value){
                $profileImage = $value['profileimage'];
                
                if(empty($profileImage)){
                    echo '<a href="profile.php" id="profile_imgdashcon"><img src="img/avatargirl.jpg" id="notify2" alt=""></a>';
                }else{
                    echo '<a href="profile.php" id="profile_imgdashcon"><img src="img/'.$profileImage.'" id="notify2" alt=""></a>';
                }
            }
        }
    }
} 


?>

