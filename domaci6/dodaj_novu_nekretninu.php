<?php

include 'db.php';

isset($_POST['povrsina']) ? $povrsina = $_POST['povrsina'] : $povrsina = "err1";
isset($_POST['cijena']) ? $cijena = $_POST['cijena'] : $cijena = "err2";
isset($_POST['godina_izgradnje']) ? $godina_izgradnje = $_POST['godina_izgradnje'] : $godina_izgradnje = "err3";
isset($_POST['opis']) ? $opis = $_POST['opis'] : $opis = "err4";
isset($_POST['status']) ? $status = $_POST['status'] : $status = "Dostupno";
isset($_POST['datum_prodaje']) ? $datum_prodaje = $_POST['datum_prodaje'] : $datum_prodaje = "err6";
isset($_POST['grad_id']) && is_numeric($_POST['grad_id']) ? $grad_id = $_POST['grad_id'] : $grad_id = "err7";
isset($_POST['oglas_id']) && is_numeric($_POST['oglas_id']) ? $oglas_id = $_POST['oglas_id'] : $oglas_id = "err8";
isset($_POST['nekretnina_id']) && is_numeric($_POST['nekretnina_id']) ? $nekretnina_id = $_POST['nekretnina_id'] : $nekretnina_id = "err9";

$sql_insert = "INSERT INTO nekretnine
                                        (
                                            povrsina,
                                            cijena,
                                            godina_izgradnje,
                                            opis,
                                            status,
                                            datum_prodaje,
                                            grad_id,
                                            oglas_id,
                                            nekretnina_id
                                        )
                                VALUES
                                        (
                                            '$povrsina',
                                            '$cijena',
                                            '$godina_izgradnje',
                                            '$opis',
                                            '$status',
                                            '$datum_prodaje',
                                            $grad_id,
                                            $oglas_id,
                                            $nekretnina_id
                                        )
                ";

$res_insert = mysqli_query($dbconn, $sql_insert);
$id = mysqli_insert_id($dbconn);


if (isset($_FILES['fotografija'])) {
    $foto = $_FILES['fotografija'];
    $fotoCount = count($foto["name"]);

    for ($i = 0; $i < $fotoCount; $i++) {
        $ext = explode(".", $foto['name'][$i]);
        $ext = $ext[count($ext) - 1];

        $dest = "./uploads/" . uniqid() . "." . $ext;

        copy($foto['tmp_name'][$i], $dest);

        $q = "INSERT INTO slike (slika, nekretnine_id) VALUES ('$dest', '$id')";
        mysqli_query($dbconn, $q);
    }
}

if ($res_insert) {
    header("location: index.php?msg=nekretnina_dodata");
} else {
    header("location: index.php?msg=greska_pri_dodavanju");
}
