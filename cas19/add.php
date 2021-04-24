<?php

    include 'db.php';

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $jmbg = $_POST['jmbg'];
    $datum_rodjenja = $_POST['datum_rodjenja'];

    $sql = "INSERT INTO radnik (ime, prezime, jmbg, datum_rodjenja) VALUES ('$ime', '$prezime', '$jmbg', '$datum_rodjenja')";
    $res = mysqli_query($dbconn, $sql);

    header("location: index.php");

?>