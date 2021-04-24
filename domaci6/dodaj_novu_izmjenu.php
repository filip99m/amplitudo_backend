<?php

    include 'db.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : exit("err0");
    isset($_POST['povrsina']) ? $povrsina = $_POST['povrsina'] : $povrsina = "err1";
    isset($_POST['cijena']) ? $cijena = $_POST['cijena'] : $cijena = "err2";
    isset($_POST['godina_izgradnje']) ? $godina_izgradnje = $_POST['godina_izgradnje'] : $godina_izgradnje = "err3";
    isset($_POST['opis']) ? $opis = $_POST['opis'] : $opis = "err4";
    isset($_POST['status']) ? $status = $_POST['status'] : $status = "err5";
    isset($_POST['datum_prodaje']) ? $datum_prodaje = $_POST['datum_prodaje'] : $datum_prodaje = "err6";
    isset($_POST['grad_id']) && is_numeric($_POST['grad_id']) ? $grad_id = $_POST['grad_id'] : $grad_id = "err7";
    isset($_POST['oglas_id']) && is_numeric($_POST['oglas_id']) ? $oglas_id = $_POST['oglas_id'] : $oglas_id = "err8";
    isset($_POST['nekretnina_id']) && is_numeric($_POST['nekretnina_id']) ? $nekretnina_id = $_POST['nekretnina_id'] : $nekretnina_id = "err9";

    $sql_update = "UPDATE nekretnine SET
                                        povrsina = '$povrsina',
                                        cijena = '$cijena',
                                        godina_izgradnje = '$godina_izgradnje',
                                        opis = '$opis',
                                        status = '$status',
                                        datum_prodaje = '$datum_prodaje',
                                        grad_id = $grad_id,
                                        oglas_id = $oglas_id,
                                        nekretnina_id = $nekretnina_id
                    WHERE id = $id;
                ";

    $res_update = mysqli_query($dbconn, $sql_update);

    if($res_update){
        header("location: index.php?msg=nekretnina_izmijenjena");
    }else{  
        header("location: index.php?msg=greska_pri_izmjeni");
    }
    
?>


