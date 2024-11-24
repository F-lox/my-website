
<?php include 'dashhead.php' ?>
<?php  AddVlog(); ?>
        <section id="forever">
        <article id="forever_inner">
            <h2 id="add_h2">Add New Vlog</h2>
            <p id="add_p">We are glad to see you again</p>
        </article>
        <form action="" method="post" id="post1" enctype="multipart/form-data">
            <h4 id="adding1">Vlogy Description</h4><br><br>
            <div>
                <label for="" id="vlogtitle">Vlog Title</label><br>
                <input type="text" placeholder="" name="vlogtitle" id="vlog_title">
            </div><br>
            <div>
                <label for="" id="vlogdesc">Vlog Description</label><br>
                <textarea name="vlogdescription" id="vlog_desc" cols="30" rows="10"></textarea>
                <!-- <input type="text" placeholder="" id="vlog_desc"> -->
            </div><br>
            <h4 id="adding2">Category</h4><br>
            <div>
                <label for="" id="category">Vlog Category</label><br>
                <select name="vlogcategory" id="select_cat">
                    <option value=""> Choose Category</option>
                    <option value="news">News</option>
                    <option value="tech">Tech</option>
                    <option value="fashion">fashion</option>
                    <option value="sports">Sports</option>
                    <option value="lifestyle">Lifestyle</option>
                </select>
            </div><br>
            <h4 id="adding3">Media</h4><br>
            <div>
                <label for="" id="selectfile1"></label>
                <input type="file" name="fileselect" id="fileselect"><br>
                <!-- <input type="file" multiple id="fileselect"><br> -->
            </div><br>
            <button id="vlogsubmit" name="vlogsubmit">Submit vlog</button>
        </form><br><br>
        </section>
<?php include 'foot.php' ?>