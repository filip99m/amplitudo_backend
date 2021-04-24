<?php

    include '../db.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : exit("err0");
    isset($_POST['naziv_grada']) ? $naziv_grada = $_POST['naziv_grada'] : $naziv_grada = "err1";


    $sql_update = "UPDATE grad SET naziv_grada = '$naziv_grada' WHERE id = $id;";

    $res_update = mysqli_query($dbconn, $sql_update);

    if($res_update){
        header("location: index.php?msg=grad_izmijenjen");
    }else{  
        header("location: index.php?msg=greska_pri_izmjeni");
    }
    
?>


