<?php

    include '../db.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : exit("err0");
    isset($_POST['naziv_nekretnine']) ? $naziv_nekretnine = $_POST['naziv_nekretnine'] : $naziv_nekretnine = "err1";


    $sql_update = "UPDATE tip_nekretnine SET naziv_nekretnine = '$naziv_nekretnine' WHERE id = $id;";

    $res_update = mysqli_query($dbconn, $sql_update);

    if($res_update){
        header("location: index.php?msg=nekretnina_izmijenjena");
    }else{  
        header("location: index.php?msg=greska_pri_izmjeni");
    }
    
?>


