<?php 
    include '../db.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID Greska...");

    $sql = "DELETE FROM tip_nekretnine WHERE id = $id";
    $res = mysqli_query($dbconn, $sql);

    if($res){
        header("location: index.php?msg=izbrisan_tip_nekretnine");
    }else{
        header("location: index.php?msg=greska_pri_brisanju_grada");
    }

?>