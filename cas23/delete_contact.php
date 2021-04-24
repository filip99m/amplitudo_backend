<?php 
    include 'db.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID error...");

    $sql = "DELETE FROM contacts WHERE id = $id ";
    $res = mysqli_query($dbconn, $sql);

    if($res){
        header("location: index.php?msg=contact_deleted");
    }else{
        header("location: index.php?msg=contact_not_deleted");
    }
?>