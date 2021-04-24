<?php

    include "../db.php";

    // upit
    $upit = "SELECT * FROM radnik";
    $rezultat = mysqli_query($dbconn, $upit);

    $res_niz = [];

    while($red = mysqli_fetch_assoc($rezultat)){
        $red_niz[] = $red;
    }

    echo json_encode($red_niz);

?>