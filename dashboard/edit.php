<?php include 'head.php' ?>
<?php  AddVlog(); ?>
        <section id="forever">
        <article id="forever_inner">
            <h2 id="add_h2">Edit Vlog</h2>
            <p id="add_p">We are glad to see you again</p>
        </article>
        <?php    
        if(isset($_GET['id'])){
            $editId = $_GET['id'];

            $sql = "SELECT * FROM vlogposts WHERE `id` = '$editId'";

            $result = $conn->query($sql);
            if($result){
                foreach($result as $value){
                    $vlogtitle = $value['vlogtitle'];
                    $vlogdescription = $value['vlogdescription'];
                    $vlogcategory = $value['vlogcategory'];
                    $vlogimage = $value['vlogimage'];
                    $vlogdate = $value['vlogdate'];
                }
            }
        }
        
        ?>
        <form action="" method="post" id="post1" enctype="multipart/form-data">
            <h4 id="adding1">Vlogy Description</h4><br><br>
            <div>
                <label for="" id="vlogtitle">Vlog Title</label><br>
                <input type="text" value="<?php echo $vlogtitle ?>" placeholder="" name="editvlogtitle" id="vlog_title">
            </div><br>
            <div>
                <label for="" id="vlogdesc">Vlog Description</label><br>
                <textarea name="editvlogdescription" id="vlog_desc" cols="30" rows="10"><?php echo $vlogdescription ?></textarea>
            </div><br>
            <h4 id="adding2">Category</h4><br>
            <div>
                <label for="" id="category">Vlog Category</label><br>
                <select name="editvlogcategory" id="select_cat">
                    <option value="<?php echo $vlogcategory ?>"><?php echo $vlogcategory ?></option>
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
                <input type="file" name="editfileselect" id="fileselect"><br>
            </div><br>

            <div id="editimgCon">
                        <img src="img/<?php echo $vlogimage ?>" id="edit_img" alt="">
            </div><br><br>
            <button id="vlogsubmit" name="editvlogsubmit">Update vlog</button>
        </form><br><br>
        </section>


        <?php   
        
        if(isset($_POST['editvlogsubmit']) && isset($_GET['id'])){

            $editId = $_GET['id'];
            // echo $editId;

            if(!empty($_FILES['editfileselect']['name'])){


                $vlogtitle = htmlspecialchars($_POST['editvlogtitle']);
                $vlogdescription = htmlspecialchars($_POST['editvlogdescription']);
                $vlogcategory = htmlspecialchars($_POST['editvlogcategory']);


                $file_name = $_FILES['editfileselect']['name'];
                $file_size = $_FILES['editfileselect']['size'];
                $file_tmp = $_FILES['editfileselect']['tmp_name'];
                $unique_string = uniqid();

                // Get file Extension
                $file_ext = explode('.', $file_name);
                $file_ext = strtolower(end($file_ext));

                $target_dir = 'img/'.$unique_string.".".$file_ext;
                $vlogImg_url = $unique_string.".".$file_ext;

                // Echo $file_ext

                // Validate File Extension

                $allowed_extensions = ['png', 'jpg', 'jpeg', 'webpg'];

                if(in_array($file_ext, $allowed_extensions)){
                    if($file_size <= 1000000){

                        move_uploaded_file($file_tmp, $target_dir);

                        $sql2 = "UPDATE vlogposts SET `vlogtitle` = '$vlogtitle',
                        `vlogdescription` = '$vlogdescription', `vlogimage` = '$vlogImg_url',
                        `vlogcategory` = '$vlogcategory' WHERE `id` = '$editId'";

                        $result2 = $conn->query($sql2);
                        if($result2){
                            header('Location: my_vlog.php');
                        }else{
                            echo 'Cannot Update Vlog Post';
                        }
                    }else{
                        echo 'File size should not be more than 1MB';
                    }
                }else{
                    echo 'File extension is not allowed';
                }

            }else{

                $vlogtitle = htmlspecialchars($_POST['editvlogtitle']);
                $vlogdescription = htmlspecialchars($_POST['editvlogdescription']);
                $vlogcategory = htmlspecialchars($_POST['editvlogcategory']);

                $sql2 = "UPDATE vlogposts SET `vlogtitle` = '$vlogtitle',
                `vlogdescription` = '$vlogdescription', `vlogcategory` = '$vlogcategory'
                WHERE `id` = '$editId'";

                $result2 = $conn->query($sql2);
                if($result2){
                    header('Location: my_vlog.php');
                }else{
                    echo 'Cannot Update Vlog Post';
                }
            }
        }
        
        
        
        ?>
<?php include 'foot.php' ?>