
<?php include 'dashhead.php' ?>
        <section id="sector">
            <article id="base1"><br>
                        <h2 id="prof1_h2">My Profile</h2>
                        <p id="prof1_p">We are glad to see you again</p>
            </article><br>

            <?php ChangePassword();    ?>
            <?php UpdateProfile();  ?>
            <?php getProfile(); ?>
            <!-- <form action="" id="prof1">
                        <h3 id="prof1_h3">Profile Information</h3>
                <div id="prof11">
                         <img src="img/profile1.png" id="avata" alt="">
                </div><br><br>
                <div>
                         <input type="file" placeholder="Choose File" id="prof1_select">
                </div><br><br>
                <div>
                        <label for="" id="firstname_prof">First Name</label><br>
                        <input type="text" id="prof1_firstname">
                </div><br>
                <div>
                        <label for="" id="lastname_prof">Last Name</label><br>
                        <input type="text" id="prof1_lastname">
                </div><br>
                <div>
                    <label for="" id="email_prof">Email</label><br>
                    <input type="email" id="prof1_email">
                </div><br>
                <button id="prof1_update">Update Profile</button>
            </form> -->

            <?php ChangePassword();  ?>
            <form action="" id="prof2" method="post">
                <article id="base2">
                        <h2 id="prof2_h2">Change Password</h2>
                </article><br><br>
                <div>
                    <label for="" id="oldpassword">Old Password</label>
                    <input type="password" id="prof2_password1" name="oldPass">
                </div><br><br>
                <div id="apc">
                    <label for="" id="apc1">New password</label>
                    <input type="password" id="prof2_password2" name="newPass">
                    <label for="" id="apc2">Confirm Password</label>
                    <input type="password" id="prof2_confirm" name="confirmPass">
                </div><br><br>
                <button id="change_password" name="changePass">Change Password</button>
            </form>
        </section>
<?php include 'foot.php' ?>