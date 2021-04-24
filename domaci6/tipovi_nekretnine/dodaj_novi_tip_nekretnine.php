<?php

    include '../db.php';

    isset($_POST['naziv_nekretnine']) ? $naziv_nekretnine = $_POST['naziv_nekretnine'] : $naziv_nekretnine = "err1";

    $sql_insert = "INSERT INTO tip_nekretnine (naziv_nekretnine) VALUES ('$naziv_nekretnine')";

    $res_insert = mysqli_query($dbconn, $sql_insert);

    if($res_insert){
        header("location: index.php?msg=nekretnina_dodata");
    }else{  
        header("location: index.php?msg=greska_pri_dodavanju");
    }
    
?>






