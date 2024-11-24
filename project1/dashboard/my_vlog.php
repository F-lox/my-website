
<?php include 'dashhead.php' ?>
    <section id="vlog_fada">

    
        <?php  
        if(isset($_SESSION['delete'])){
            $delete_message = $_SESSION['delete'];
            echo '<div id="deletebox">'.$delete_message.'</div>';
            unset($_SESSION['delete']);
        }
        
        ?>

   
            <article id="vlog_son">
                <a href="" id="vlogson">My Vlog</a><br>
                <p id="vlogdota">We are glad to see you again</p>
            </article>
    <section id="grand_dad">
            <article id="vlog_mom">
              <div id="vlog_sis">
                <h3 id="vlogsis_h">Vlog Title</h3>
                <ul id="vlog_cos">
                    <li id="date_pub">Date Published</li>
                    <li id="myvlog_cate">Category</li>
                    <li id="vlog_view">View</li>
                    <li id="myvlog_action">Action</li>
                </ul>
              </div>
            </article>
  
            <?php GetAllAdminVlogs();   ?>

       <!-- <section id="Flex_wrapper1">
            <article id="Flexbox_parent1">
                    <div class="Flexboxa">
                        <div id="vlog_house">
                            <img src="img/pic1.png" id="myvlog_img" alt="">
                        </div>
                        <div id="vlog_word1">
                            <h5 id="vlog_word1h">Selling memeberships with recurring revenue in Abia State</h5>
                            <p id="vlog_word1p">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Corrupti minus inventore corporis?</p>
                        </div>
                    </div>
                    <div class="Flexboxb">
                        <p id="vlog_word1p2">2024-02-07 00 00 00</p>
                    </div>
                    <div class="Flexboxc">
                        <p id="vlog_word1p3">tech</p>
                    </div>
                    <div class="Flexboxd">
                        <p id="vlog_word1p4">10</p>
                    </div>
                    <div class="Flexboxe">
                        <img src="img/bin.png" id="myvlog_icon1" alt=""><br>
                        <img src="img/sticky-note.png" id="myvlog_icon2" alt="">
                    </div>
            </article>
        </section>

        <section id="Flex_wrapper2">
            <article id="Flexbox_parent2">
                    <div class="Flexboxaa">
                        <div id="vlog_house2">
                            <img src="img/portfolio finaco.jpg" id="myvlog_img" alt="">
                        </div>
                        <div id="vlog_word2">
                            <h5 id="vlog_word2h">Selling memeberships with recurring revenue in Abia State</h5>
                            <p id="vlog_word2p">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Corrupti minus inventore corporis?</p>
                        </div>
                    </div>
                    <div class="Flexboxf">
                        <p id="vlog_word2p2">2024-02-07 00 00 00</p>
                    </div>
                    <div class="Flexboxg">
                        <p id="vlog_word2p3">news</p>
                    </div>
                    <div class="Flexboxh">
                        <p id="vlog_word2p4">6</p>
                    </div>
                    <div class="Flexboxi">
                        <a href=""><img src="img/bin.png" id="myvlog_icon1" alt=""><br></a>
                        <a href=""><img src="img/sticky-note.png" id="myvlog_icon2" alt=""></a>
                    </div>
            </article>
        </section>

        <section id="Flex_wrapper3">
            <article id="Flexbox_parent3">
                    <div class="Flexboxj">
                        <div id="vlog_house3">
                            <img src="img/portfolio lewis 1.jpg" id="myvlog_img" alt="">
                        </div>
                        <div id="vlog_word3">
                            <h5 id="vlog_word3h">Selling memeberships with recurring revenue in Abia State</h5>
                            <p id="vlog_word3p">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Corrupti minus inventore corporis?</p>
                        </div>
                    </div>
                    <div class="Flexboxk">
                        <p id="vlog_word3p2">2024-02-07 00 00 00</p>
                    </div>
                    <div class="Flexboxl">
                        <p id="vlog_word3p3">sports</p>
                    </div>
                    <div class="Flexboxm">
                        <p id="vlog_word3p4">18</p>
                    </div>
                    <div class="Flexboxn">
                        <img src="img/bin.png" id="myvlog_icon1" alt=""><br>
                        <img src="img/sticky-note.png" id="myvlog_icon2" alt="">
                    </div>
            </article>
        </section>

        <section id="Flex_wrapper4">
            <article id="Flexbox_parent4">
                    <div class="Flexboxo">
                        <div id="vlog_house4">
                            <img src="img/smartphone.png" id="myvlog_img" alt="">
                        </div>
                        <div id="vlog_word4">
                            <h5 id="vlog_word4h">Selling memeberships with recurring revenue in Abia State</h5>
                            <p id="vlog_word4p">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Corrupti minus inventore corporis?</p>
                        </div>
                    </div>
                    <div class="Flexboxp">
                        <p id="vlog_word4p2">2024-02-07 00 00 00</p>
                    </div>
                    <div class="Flexboxq">
                        <p id="vlog_word4p3">fashion</p>
                    </div>
                    <div class="Flexboxr">
                        <p id="vlog_word4p4">31</p>
                    </div>
                    <div class="Flexboxs">
                        <img src="img/bin.png" id="myvlog_icon1" alt=""><br>
                        <img src="img/sticky-note.png" id="myvlog_icon2" alt="">
                    </div>
            </article>
        </section>

        <section id="Flex_wrapper5">
            <article id="Flexbox_parent5">
                    <div class="Flexboxt">
                        <div id="vlog_house5">
                            <img src="img/portfolio focus.jpg" id="myvlog_img" alt="">
                        </div>
                        <div id="vlog_word5">
                            <h5 id="vlog_word5h">Selling memeberships with recurring revenue in Abia State</h5>
                            <p id="vlog_word5p">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Corrupti minus inventore corporis?</p>
                        </div>
                    </div>
                    <div class="Flexboxu">
                        <p id="vlog_word1p2">2024-02-07 00 00 00</p>
                    </div>
                    <div class="Flexboxv">
                        <p id="vlog_word5p3">tech</p>
                    </div>
                    <div class="Flexboxw">
                        <p id="vlog_word5p4">12</p>
                    </div>
                    <div class="Flexboxx">
                        <img src="img/bin.png" id="myvlog_icon1" alt=""><br>
                        <img src="img/sticky-note.png" id="myvlog_icon2" alt="">
                    </div>
            </article>
        </section>

        <section id="Flex_wrapper6">
            <article id="Flexbox_parent6">
                    <div class="Flexboxy">
                        <div id="vlog_house6">
                            <img src="img/pic1.png" id="myvlog_img" alt="">
                        </div>
                        <div id="vlog_word6">
                            <h5 id="vlog_word6h">Selling memeberships with recurring revenue in Abia State</h5>
                            <p id="vlog_word6p">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Corrupti minus inventore corporis?</p>
                        </div>
                    </div>
                    <div class="Flexboxz">
                        <p id="vlog_word6p2">2024-02-07 00 00 00</p>
                    </div>
                    <div class="Flexboxzed">
                        <p id="vlog_word6p3">news</p>
                    </div>
                    <div class="Flexboxzed1">
                        <p id="vlog_word1p4">16</p>
                    </div>
                    <div class="Flexboxzed2">
                        <img src="img/bin.png" id="myvlog_icon1" alt=""><br>
                        <img src="img/sticky-note.png" id="myvlog_icon2" alt="">
                    </div>
            </article><br>
        </section>
      </section>
    </section> -->
<?php include 'foot.php' ?>