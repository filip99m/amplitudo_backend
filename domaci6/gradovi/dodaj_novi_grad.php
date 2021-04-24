<?php

    include '../db.php';

    isset($_POST['naziv_grada']) ? $naziv_grada = $_POST['naziv_grada'] : $naziv_grada = "err1";

    $sql_insert = "INSERT INTO grad (naziv_grada) VALUES ('$naziv_grada')";

    $res_insert = mysqli_query($dbconn, $sql_insert);

    if($res_insert){
        header("location: index.php?msg=grad_dodat");
    }else{  
        header("location: index.php?msg=greska_pri_dodavanju");
    }
    
?>






