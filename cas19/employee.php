<?php

    include 'db.php';

    $id = $_GET['id'];

    $sql ="SELECT * FROM radnik where id = $id ";
    $res = mysqli_query($dbconn, $sql);

    if(mysqli_num_rows($res) == 0){
        echo "Radnik ne postoji...";
    }else{
        $radnik = mysqli_fetch_assoc($res);
        echo "Ime: " . $radnik['ime'] . "<br/>";
        echo "Prezime: " . $radnik['prezime'] . "<br/>";
    }

?>