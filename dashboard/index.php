<?php include 'dashhead.php' ?>
        <section id="cody">
            <article id="cody_inner">
                    <h2 id="headmaster">Dashboard</h2>
                    <ul id="posta">
                        <li><a href="post_vlog.php">Post A Vlog</a></li>
                    </ul>
            </article>
            <article id="firsthead1">
              <a href="my_vlog.php" id="headmini1">
                  <ul id="smallhead1">
                    <li>My Vlogs</li>
                    <div id="headcona">
                    <img src="img/resume.png" id="headcon1" alt="">
                    </div>
                  </ul>
                </a>
                <a href="post_vlog.php" id="headmini2">
                  <ul id="smallhead1">
                    <li>Post a New Vlog</li>
                    <div id="headconb">
                    <img src="img/more.png" id="headcon2" alt="">
                    </div>
                  </ul>
                  </a>
                <a href="profile.php" id="headmini3">
                  <ul id="smallhead1">
                    <li>My Profile</li>
                    <div id="headconc">
                    <img src="img/profile.png" id="headcon1" alt="">
                    </div>
                  </ul>
                  </a>
                  <a href="my_vlog.php" id="headmini4">
                  <ul id="smallhead1">
                    <li>Total Vlogs <br><?php  postCount();  ?></li>
                    <div id="headcond">
                    <img src="img/attachment.png" id="headcon1" alt=""> 
                    </div>
                  </ul>
                  </a> 
            </article>
            
        </section>
<?php include 'foot.php' ?>