<?php    
include "function.php";


if(isset($_GET['id'])){
    global $conn;

    $deleteId = $_GET['id'];

    $sql = "DELETE FROM vlogposts WHERE `id` = '$deleteId'";

    $result = $conn->query($sql);

    if($result){
        $_SESSION['delete'] = 'Post Deleted Successful';
        header('Location: my_vlog.php');
        exit();
    }
}




?>